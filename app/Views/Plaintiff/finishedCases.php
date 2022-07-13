<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">

  <title>Minimax HTML5 Free Template</title>
<!--

Template 2080 Minimax

http://www.tooplate.com/view/2080-minimax

-->
  <!-- stylesheet css -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/nivo-lightbox.css">
	<link rel="stylesheet" href="assets/css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="assets/css/style.css">
	
	<!-- google web font css -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,600,700' rel='stylesheet' type='text/css'>


</head>
<body data-spy="scroll" data-target=".navbar-collapse">
      <?php 
      //if (isset($_SESSION['message'])):
       ?>
  <div class="msg">
    <?php 
    //   echo $_SESSION['message']; 
    //   unset($_SESSION['message']);
    ?>
  </div>
<?php 
 //endif
 ?>


  
<!-- navigation -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
      </button>
      <a href="index.html" class="navbar-brand smoothScroll">Label</a>
    </div>
    <div class="collapse navbar-collapse">
        
			<ul class="nav navbar-nav navbar-right">
            <h3>Welcome <?=session()->get('First_Name')?></h3>
            <li><a href="<?= base_url("/plaintiff") ?>">Back</a></li>
            <li><a href="<?= base_url("/logout") ?>">logout</a></li>
            </ul>
		    </div>
  </div>
</div>    





<!-- divider section -->
<div class="container">
  <div class="row">
    <div class="col-md-1 col-sm-1"></div>
    <div class="col-md-10 col-sm-10">
      <hr>
    </div>
    <div class="col-md-1 col-sm-1"></div>
  </div>
</div>

<!-- contact section -->
<div id="contact">
  <div class="container">
    <div class="row">
    <div class="col-md-12 col-sm-12">
        <h2>LAWYER LOGS </h2>
      </div>
        <table align="centre" border="4px" style="width: 1000px"; line-height:40px>
  <thead>
    <tr>
      <th>Case id</th>
      <th>Case Category</th>
      <th>Lawyer Rep</th>
      <th>Action</th>
    </tr>
  </thead>
  <?php

  $pendingCases = session()->get('pendingCases');
  
  foreach ($pendingCases as $row) { 
    if($row['civilianid'] == session()->get('ID')){
        if($row['is_deleted'] == 0){
          if($row['Approval'] == 'Finished'){
        
    ?>
    <tbody>
    <tr>
       <td><p><?php echo $row['id']; ?></td></p>
      <td><p><?php echo $row['casecategory']; ?></td></p>
      <?php
        $lawyers = session()->get('lawyers');
          foreach($lawyers as $lawyers){
            if($lawyers['ID'] == $row['lawyerid']){
              ?>
              <td><p><?php echo $lawyers['First_Name']." ".$lawyers['Last_Name']; ?></td></p>
              <?php
            }else{
              
            }
          }
        ?>
      <td><p><button class="btn btn-primary">Rate Lawyer</button> <button onclick="location.href='<?= base_url('/deleteCase'.'/'.$row['id']) ?>'" class="btn btn-danger">Delete Case</button></td></p>
      
    
    
     
    </tr>
    </tbody>

  <?php }}}} ?>
</table>


    </form>
    
           
        </div>
        <div class="col-md-1 col-sm-1"></div>
      </form>
    </div>
  </div>
</div>

<!-- divider section -->
<div class="container">
  <div class="row">
    <div class="col-md-1 col-sm-1"></div>
    <div class="col-md-10 col-sm-10">
      <hr>
    </div>
    <div class="col-md-1 col-sm-1"></div>
  </div>
</div>

<!-- footer section -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h2>Our Office</h2>
        <p>101 Clean Street, CBD NAIROBI, CA 10110</p>
        <p>Email: <span>label@company.com</span></p>
        <p>Phone: <span>0700-020-034</span></p>
      </div>
      <div class="col-md-6 col-sm-6">
        <h2>Social Us</h2>
        <ul class="social-icons">
          <li><a href="#" class="fa fa-facebook"></a></li>
          <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-google-plus"></a></li>
          <li><a href="#" class="fa fa-dribbble"></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<!-- divider section -->
<div class="container">
  <div class="row">
    <div class="col-md-1 col-sm-1"></div>
    <div class="col-md-10 col-sm-10">
      <hr>
    </div>
    <div class="col-md-1 col-sm-1"></div>
  </div>
</div>

<!-- copyright section -->
<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <p>Copyright &copy; 2016 Minimax Digital Firm 
                
                - Design: tooplate</p>
      </div>
    </div>
  </div>
</div>

<!-- scrolltop section -->
<a href="#top" class="go-top"><i class="fa fa-angle-up"></i></a>


<!-- javascript js -->  
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>	
<script src="assets/js/nivo-lightbox.min.js"></script>
<script src="assets/js/smoothscroll.js"></script>
<script src="assets/js/jquery.nav.js"></script>
<script src="assets/js/isotope.js"></script>
<script src="assets/js/imagesloaded.min.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>