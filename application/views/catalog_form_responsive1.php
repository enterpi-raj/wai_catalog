<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url();?>public/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="<?php echo base_url();?>public/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

  <div class="container">
    
    <form class="form-horizontal" id="genpdf" name="genpdf" method="post" action="<?php site_url();?>previewPDF">
      <div class="control-group">
        <label class="control-label" for="lableone">Box 1</label>
        <div class="controls">
          <select name="coverpage" id="coverpage">
              <option value="0">Select Cover Page</option>
              <?php
              foreach($cover_pages as $key=>$cp)
              {
                echo '<option value="'.$cp->id.'">'.$cp->name.'</option>';
              }
              ?>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="lableone">Box 1</label>
        <div class="controls">
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
      </div>

      <div class="control-group">
        <div class="controls">
          <input name="sub" type="submit" value="Generate PDF" />
          <button type="button" class="btn">Generate PDF</button>
        </div>
      </div>
    
    </form>

  </div>
</body>
</html>



<?php /* <form id="genpdf" name="genpdf" method="post" action="<?php site_url();?>previewPDF">
      <div class="box1">
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
      <div class="box2">
          <label>Box 2
          <select name="part" id="part">
              <option value="0">Select Part</option>
              <?php
              foreach($parts as $key=>$part)
              {
                echo '<option value="'.$part->id.'">'.$part->name.'</option>';
              }
              ?>
           </select>
        </label>
      </div>
      <div class="padtop">
          <input name="sub" type="submit" value="Generate PDF" />
      </div>
    </form>
  */ ?>