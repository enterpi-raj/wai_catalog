<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function pdf_create($html, $filename,$pdf_path, $format ,$domp, $stream=false)
{
    require_once("$domp/dompdf_config.inc.php");
    spl_autoload_register('DOMPDF_autoload');
    
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
	$dompdf->set_paper("a4", $format);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename);
    } else {
        $CI =& get_instance();
        $CI->load->helper('file');
		$source_path = $pdf_path;
        //echo $source_path.$filename;die;
        if(write_file($source_path.$filename, $dompdf->output()))
		{
			return true;
		}
		else
		{
			return false;
		}
    }
}
?>  