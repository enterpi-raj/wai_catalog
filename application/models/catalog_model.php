<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Catalog_model extends CI_Model {
    function __Constructor()
    {

    }

    function getMasterData()
    {
        $rs = $this->db->query('select id,name from cover_pages where status = "1"');
        $data['cover_pages'] = $rs->result();
        $rs = $this->db->query('select id,part_number as name from parts where status = "1"');
        $data['parts'] = $rs->result();
        return $data;
    }

    function getCatalogData($post)
    {
        $data['coverpage'] = $this->getCoverPageImage($post['coverpage']);
        $data['partimage'] = $this->getPartImage($post['part']);
        $data['bom_details'] = $this->getBomDetails($post['part']);
        return $data;
    }

    function getCoverPageImage($cp_id = 0)
    {
        $rs = $this->db->query('select image,rename_image from cover_pages where id = '.$cp_id);
        return $rs->first_row();
    }

    function getPartImage($part_id = 0)
    {
        $rs = $this->db->query('select part_number,image,rename_image from parts where id = '.$part_id);
        return $rs->first_row();
    }

    function getBomDetails($part_id = 0)
    {
        $rs = $this->db->query('select * from parts_bom where parts_id = '.$part_id);
        return $rs->result();
    }
}
?>
