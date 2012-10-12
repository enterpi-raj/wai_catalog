<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Catalog Preview</title>
<link rel="shortcut icon" href="<?php echo base_url();?>public/images/favicon.ico" />
<link href="<?php echo base_url();?>public/css/reset.css" rel="stylesheet">
<link href="<?php echo base_url();?>public/css/catalog.css" rel="stylesheet">
<script language="javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
<script>
$(document).ready(function(){
    var pdfht = ($('.content').height()-58);
    $('#pdf_preview').css({'height':pdfht});
    var cp = '<?php echo $coverpage;?>';
    var part = '<?php echo $part;?>';
    if((cp != '') && (part != ''))
    {
        var qrystr = 'coverpage='+cp+'&part='+part;
        $.ajax({
            type: 'POST',
            url: 'genPDF',
            data: qrystr,
            beforeSend : function(){
                $('.jspin').show();
            },
            success: function(data)
            {
                data = $.trim(data);
                $('.jdl').attr('href','<?php echo base_url();?>catalog/fileDownload/'+data)
                $('#pdf_preview').attr('src','<?php echo base_url();?>catalogs/'+data);
            },
            complete: function()
            {
                $('.jspin').hide();
                $('.jdl').show();
            }
        });
    }

    $(window).bind("resize", resizeWindow);
    
});
function resizeWindow( e ) {
    var pdfht = ($('.content').height()-58);
    $('#pdf_preview').css({'height':pdfht});
}
</script>
</head>
<body class="app">
  
    <div class="header">
        <div class="wrapper">
            <div class="logo"></div>
        </div>
    </div>
  
    <div class="content">

        <div class="p_hdr">

            <a class="blue_but jsubmit f_l" href="<?php echo base_url();?>catalog">
                <span class="inner-btn">
                    <span class="label">Back</span>
                </span>
            </a>

            <a class="blue_but jsubmit jdl f_r" href="#">
                <span class="inner-btn">
                    <span class="label">Download</span>
                </span>
            </a>

            <div class="c_b">&nbsp;</div>

        </div>

        <div class="jspin loading" style="display:none"></div>
        <iframe id="pdf_preview" style="display: block; width: 980px; height:93% "></iframe>

    </div>
</body>
</html>



    