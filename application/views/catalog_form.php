<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Catalog Form</title>
<link href="<?php echo base_url();?>public/css/reset.css" rel="stylesheet">
<link href="<?php echo base_url();?>public/css/catalog.css" rel="stylesheet">

</head>

<body class="app">
  <div class="header">
    <div class="wrapper">
        Header
    </div>
  </div>
  <div class="wrapper content">
    
    <form id="genpdf" name="genpdf" method="post" action="<?php site_url();?>catalog/previewPDF">

      <h3 class="c_hd">Select Cover Image:</h3>

      <div class="cp_w">
        
        <div class="cp_1 f_l cp_em active">
          <img src="<?php echo base_url(); ?>public/images/img1.jpg" alt="" />
          <input type="radio" name="c_p_img" />
        </div>

        <div class="cp_1 f_l cp_em ">
          <img src="<?php echo base_url(); ?>public/images/img2.jpg" alt="" />
          <input type="radio" name="c_p_img" />
        </div>

        <div class="cp_1 f_l cp_em">
          <img src="<?php echo base_url(); ?>public/images/img3.jpg" alt="" />
          <input type="radio" name="c_p_img" />
        </div>

        <div class="cp_1 f_l cp_em last">
          <img src="<?php echo base_url(); ?>public/images/img4.jpg" alt="" />
          <input type="radio" name="c_p_img" />
        </div>

        <div class="c_b">&nbsp;</div>

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
        <a class="blue_but">
          <span class="inner-btn">
            <span class="label">Generate PDF</span>
          </span>
        </a>
      </div>
      
      <input name="sub" type="submit" value="Generate PDF" />
    
    </form>
  
  </div>
</body>
</html>
