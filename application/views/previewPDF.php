<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	margin:auto;
	background:#f0f0f0;
	color:#565656;
	font: Arial, Helvetica, sans-serifArial, Helvetica, sans-serif;
	font-size:14px;
}

.maindiv{
	background:#fff;
	width:900px;
	height:400px;
	margin:40px  auto;
	padding:auto;
	border:1px solid #DBDBDB;
    border-radius:8px;
	-moz-border-radius:8px;
    -webkit-border-radius:8px;
}

.box1{
	width:100%;
	margin:10px;
	float:left;
	}
.box2{
	width:100%;
	margin:10px;
	float:left;
	}
.padtop{
    margin:10px;
    padding-top:15px;
}
-->
</style>
<script language="javascript" src="http://localhost/wai_catalog/public/js/jquery.js"></script>
<script>
$(document).ready(function(){
    var qrystr = 'coverpage=<?php echo $coverpage;?>&part=<?php echo $part;?>';
    $.ajax({
        type: 'POST',
        url: 'genPDF',
        data: qrystr,
        beforeSend : function(){
            $('.jspin').show();
        },
        success: function(data)
        {
            $('#pdf_preview').attr('src','<?php echo base_url();?>catalogs/catalog.pdf');
        },
        complete: function()
        {
            $('.jspin').hide();
            $('.jdl').show();
        }
    });

});
</script>
</head>
<body>
<div class="maindiv">
    <div><a href="<?php echo base_url();?>catalog/catalog_form">Back</a></div>
    <div class="jspin" style="display:none">loading</div>
    <div class="jdl" style="display:none"><a href="<?php echo base_url();?>catalog/fileDownload">Download</a></div>
    <iframe id="pdf_preview" style="display: block; width: 990px; min-height: 450px; height: 300px; "></iframe>
</div>
</body>
</html>
