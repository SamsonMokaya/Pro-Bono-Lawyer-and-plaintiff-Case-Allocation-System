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
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/nivo-lightbox.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/default.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/profile.css" rel="stylesheet" type="text/css">
  
	
	<!-- google web font css -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,600,700' rel='stylesheet' type='text/css'>


</head>
<body data-spy="scroll" data-target=".navbar-collapse">

  
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
            <li><a href="<?= base_url("/lawyer") ?>">Back</a></li>
            <li><a href="<?= base_url("/logout") ?>">logout</a></li>
            </ul>
		    </div>
  </div>
</div>    



<?php
$lawyer = session()->get('lawyerDetails');
?>
<div class="container mt-5">
    
    <div class="row d-flex justify-content-center">
        
        <div class="col-md-7">
            
            <div class="card p-3 py-4">
                
                <div class="text-center">
                    <img src="<?= base_url('/assets/images/uploads/'.$lawyer['profile_pic']) ?>" width="100" class="rounded-circle">
                </div>
                
                <div class="text-center mt-3">
                    <span class="bg-secondary p-1 px-4 rounded text-white">Lawyer</span>
                    <h4 class="mt-2 mb-0">Name : <?php echo $lawyer['First_Name'].' '.$lawyer['Last_Name'] ?></h4>
                    <span>Email : <?php echo $lawyer['Email']?></span>
                    <br>
                    <span>Password : <?php echo $lawyer['password']?></span><br>
                    <span>Criminal Record : <?php echo $lawyer['Criminal_Record']?></span>
                    <br>
                    <span>Succesful Cases : <?php echo $lawyer['Succesful_Cases']?></span>
                    <br>
                    <span>Failed Cases : <?php echo $lawyer['Failed_Cases']?></span>
                    <br>
                    <span><p name="Description" value="" id="" cols="30" rows="10"><?php echo $lawyer['Description']?></p></span>
                    <br>
                    <span><button onclick="location.href='<?= base_url('/myLawyerProfile'.'/'.session()->get('ID')) ?>'">Edit Profile</button></span>
                    <br>
                   
                    
                     <ul class="social-list">
                        <li><i class="fa fa-facebook"></i></li>
                        <li><i class="fa fa-dribbble"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>
                        <li><i class="fa fa-google"></i></li>
                    </ul>
                    
                    <div class="buttons">
                        
                        <button class="btn btn-outline-primary px-4">Message</button>
                        <button class="btn btn-primary px-4 ms-3">Contact</button>
                    </div>
                    
                    
                </div>
                
               
                
                
            </div>
            
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

<div id="contact">
  <div class="container">
    <div class="row">
    <div class="col-md-12 col-sm-12">
        <h2>RATINGS</h2>
      </div>

    </div>
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