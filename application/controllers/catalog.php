<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalog extends CI_Controller {

	/*public function index()
	{
		$this->load->view('welcome_message');
	}*/
    public function info()
    {
        phpinfo();
    }
    public function index()
    {
        $masterdata = $this->catalog_model->getMasterData();
        $this->load->view('catalog_form',$masterdata);
    }

    public function previewPDF()
    {
        /*echo '<pre>';
        print_r($_POST);die;*/
        $this->load->view('previewPDF',$_POST);
    }

    public function genPDF()
    {
        $data = $this->catalog_model->getCatalogData($_POST);
        $domp = 'dompdf'; // using new dompdf (dompdf_new folder) files to generate pdf file
        $format = 'portrait';
        $pdf_path = 'catalogs/';
        $filename = strtotime(date('m-d-Y h:i:s')).'.pdf';//$nmonth
        //$this->load->view('catalog_view', $data);
        $html = $this->load->view('catalog_view', $data, true);
        if(pdf_create($html, $filename,$pdf_path,$format,$domp)) {
            echo $filename;
        }
        else {
            echo 'error';
        }
    }

    function fileDownload($filename) {
        $dir = 'catalogs/';
        $file = 'catalog.pdf';
        $this->load->helper('download');
        $data = file_get_contents($dir.$filename); // Read the file's contents
        force_download($filename, $data, $file);
    }

    function setDetails()
    {
        $sql = 'select * from login_trace where session_id = "'.$this->session->userdata('session_id').'"';
        $rs = $this->db->query($sql);
        if($rs->num_rows < 1)
        {
            $this->tracelogin_model->trace_in($_POST['timezone']);
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */