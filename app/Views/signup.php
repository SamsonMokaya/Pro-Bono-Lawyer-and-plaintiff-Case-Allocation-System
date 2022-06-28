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
				<li><a href="index.html">HOME</a></li>
				
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

<!-- pricing section -->


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
				<h2>Sign Up</h2>
			</div>
			<form action="<?= base_url("/signup") ?>" method="post" role="form">
				<div class="col-md-1 col-sm-1"></div>
				<div class="col-md-10 col-sm-10">
					<div class="col-md-6 col-sm-6">
						<input name="First_Name" value="" required type="text" class="form-control" id="First_Name" placeholder="First Name">
				  	</div>
					  <div class="col-md-6 col-sm-6">
						<input name="Last_Name" value=""required type="text" class="form-control" id="Last_Name" placeholder="Last Name">
				  	</div>
					<div class="col-md-6 col-sm-6">
						<input name="Email"  required type="email" class="form-control" id="email" placeholder="email">
				  	</div>
				  	 <div class="col-md-6 col-sm-6">
				  	 	    <input name="role" required type="radio"name="ee" value="3">
							<label for="role">Plaintiff</label>
				  	 	     <input name="role" required type="radio"name="ee" value="2">
							 <label for="role">Lawyer</label>     
               			    
					 </div>
                   <div class="col-md-6 col-sm-6">
						<input name="password_1" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" class="form-control" id="password_1"  placeholder="password">						
					</div>
					<div class="col-md-6 col-sm-6">
						<input name="password_2" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required class="form-control" id="password_2" placeholder="confirm password">
						<span id='message'></span>
				  	</div>
					<div class="col-md-8 col-sm-8">
                    	<?php if(isset($validation)): ?>
                       <div class="col-12">
                           <div class="alert alert-danger" roles="alert">
                               <?= $validation->listerrors()?>

                           </div>
                       </div>
                    	<?php endif; ?>
					</div>
			
					<div class="col-md-8 col-sm-8">
					<a href="<?= base_url("/signin") ?>">Have an account? Sign in here</a>
					</div>
					<div class="col-md-4 col-sm-4">
						<input name="reg_user" type="submit" class="form-control" id="submit" value="Register">
					</div>
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

<script>
            document.getElementById("password_1").addEventListener("keyup", testpassword2);
            document.getElementById("password_2").addEventListener("keyup", testpassword2);
            var submitBtn = document.getElementById("submit");
            function testpassword2() {
            var text1 = document.getElementById("password_1");
            var text2 = document.getElementById("password_2");
            if(text1.value != "" && text2.value != ""){
                if (text1.value.trim() === text2.value.trim()) {
                    text2.style.borderColor = "#2EFE2E";
                    submitBtn.disabled = false;
                } 
                else if(text1.value.trim() != text2.value.trim()) {
                    text2.style.borderColor = "red"
                    
                    submitBtn.disabled = true;
                
                }
            }   
        }
        </script>

</body>
</html>