<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Catalog Form</title>
<link rel="shortcut icon" href="<?php echo base_url();?>public/images/favicon.ico" />
<link href="<?php echo base_url();?>public/css/reset.css" rel="stylesheet">
<link href="<?php echo base_url();?>public/css/catalog.css" rel="stylesheet">
<script language="javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
<script>
    $(document).ready(function(){
        $('.jcp').click(function(){
            $('.active').removeClass('active')
            $(this).closest('div').addClass('active');
        });

        $('.jsubmit').click(function(){
            if(typeof($('.jcp:checked').val()) == 'undefined')
            {
                alert('Please select Cover Image');
                $('.jcp:first').focus();
                return false;
            }
            if($('#part').val() == '0')
            {
                alert('Please select Part');
                $('#part').focus();
                return false;
            }
            else
            {
                $('#genpdf').submit();
            }
        });
        
        var d = new Date();
        var timezone=d.getTimezoneOffset();
        var queryString="timezone="+timezone;
        $.ajax({
            type: 'POST',
            url: '<?php base_url();?>catalog/setDetails',
            data: queryString,
            beforeSend : function(){
            },
            success: function(data)
            {
            },
            complete: function()
            {
            }
        });
        $(window).bind("resize", resizeWindow);
    });
function resizeWindow( e ) {
    var newWindowHeight = $(window).height();
    $("#container").css("max-height", newWindowHeight );
}
</script>
</head>

<body class="app">
  
  <div class="header">
    <div class="wrapper">
        <div class="logo"></div>
    </div>
  </div>
  
  <div class="wrapper content">
    
    <form id="genpdf" name="genpdf" method="post" action="<?php site_url();?>catalog/previewPDF">

      <h3 class="c_hd">Select Cover Image:</h3>

      <div class="cp_w">
        
        <div class="cp_1 f_l cp_em">
            <label for="img1"><img src="<?php echo base_url(); ?>images/cover_pages/thumbs/img1.jpg" alt="" /></label>
            <input id="img1" type="radio" value="1" name="coverpage" class="jcp" />
        </div>

        <div class="cp_1 f_l cp_em ">
          <label for="img2"><img src="<?php echo base_url(); ?>images/cover_pages/thumbs/img2.jpg" alt="" /></label>
          <input id="img2" type="radio" value="2" name="coverpage" class="jcp" />
        </div>

        <div class="cp_1 f_l cp_em">
          <label for="img3"><img src="<?php echo base_url(); ?>images/cover_pages/thumbs/img3.jpg" alt="" /></label>
          <input id="img3" type="radio" value="3" name="coverpage" class="jcp"/>
        </div>

        <div class="cp_1 f_l cp_em last">
          <label for="img4"><img src="<?php echo base_url(); ?>images/cover_pages/thumbs/img4.jpg" alt="" /></label>
          <input id="img4" type="radio" value="4" name="coverpage" class="jcp"/>
        </div>

        

      </div>


      <?php /*<div class="box1">
         <label>Box 1
          <select name="coverpage" id="coverpage">
              <option value="0">Select Cover Page</option>
              <?php
              foreach($cover_pages as $key=>$cp)
              {
                echo '<option value="'.$cp->id.'">'.$cp->name.'</option>';
              }
              ?>
          </select>
        </label>
      </div>

      */ ?>
      <div class="c_wp">
        <h3 class="c_hd">Part Name:</h3>
        <select name="part" id="part">
            <option value="0">Select Part</option>
            <?php
            foreach($parts as $key=>$part)
            {
              echo '<option value="'.$part->id.'">'.$part->name.'</option>';
            }
            ?>
         </select>
      </div>
      
      <div class="c_ftr">
        <a class="blue_but jsubmit">
          <span class="inner-btn">
            <span class="label">Generate Catalog</span>
          </span>
        </a>
      </div>
    </form>
  </div>
</body>
</html>
