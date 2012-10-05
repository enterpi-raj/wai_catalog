<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalog extends CI_Controller {

	/*public function index()
	{
		$this->load->view('welcome_message');
	}*/

    public function index()
    {
        //echo BASEPATH;
        $masterdata = $this->catalog_model->getMasterData();
        $this->load->view('catalog_form',$masterdata);
    }

    public function previewPDF()
    {
        echo '<pre>';
        print_r($_POST);die;
        $this->load->view('previewPDF',$_POST);
    }

    public function genPDF()
    {
        $data = $this->catalog_model->getCatalogData($_POST);
        $domp = 'dompdf'; // using new dompdf (dompdf_new folder) files to generate pdf file
        $format = 'portrait';
        $pdf_path = 'catalogs/';
        $filename = 'catalog.pdf';//$nmonth
        //$this->load->view('catalog_view', $data);
        $html = $this->load->view('catalog_view', $data, true);
        if(pdf_create($html, $filename,$pdf_path,$format,$domp)) {
            echo 'success';
        }
        else {
            echo 'error';
        }
    }

    function fileDownload() {
        $dir = 'catalogs/';
        $file = 'catalog.pdf';
        $this->load->helper('download');
        $data = file_get_contents($dir.$file); // Read the file's contents
        force_download($file, $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */