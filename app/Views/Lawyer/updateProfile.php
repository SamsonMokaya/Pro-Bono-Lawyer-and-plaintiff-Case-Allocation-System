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
<link href="/assets/css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  <link href="/assets/css/font-awesome.min.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
	<link href="/assets/css/nivo-lightbox.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  <link href="/assets/css/default.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  <link href="/assets/css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  <link href="/assets/css/profile.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
	
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
			<a href="#home" class="navbar-brand smoothScroll">Label</a>
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
				<h2>Edit Details</h2>
				<?php if(session()->get('success')): ?>
                <div class="alert alert-success">
                    <?=session()->get('success') ?>
                </div>

            <?php endif; ?>
			</div>
			<?php
            $lawyer = session()->get('lawyerD');
			?>
			<form enctype="multipart/form-data" action="<?= base_url("/editupdateLProfile".'/'.session()->get('ID')) ?>" method="post" role="form">
				<div class="col-md-1 col-sm-1"></div>
				<div class="col-md-10 col-sm-10">
					<div class="col-md-6 col-sm-6">
						<input name="First_Name" value="<?php echo $lawyer['First_Name']?>" required type="text" class="form-control" id="First_Name" placeholder="First Name">
				  	</div>
					  <div class="col-md-6 col-sm-6">
						<input name="Last_Name" value="<?php echo $lawyer['Last_Name']?>"required type="text" class="form-control" id="Last_Name" placeholder="Last Name">
				  	</div>
					  <div class="col-md-6 col-sm-6">
					   <input name="Email" value="<?php echo $lawyer['Email']?>" required type="email" class="form-control" id="email" >
				  	</div>
                   <div class="col-md-6 col-sm-6">
						<input name="password_1" value="<?php echo $lawyer['password']?>" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" class="form-control" id="password_1"  placeholder="password">						
					</div>
					<div class="col-md-6 col-sm-6">
						<input name="password_2" value="<?php echo $lawyer['password']?>" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required class="form-control" id="password_2" placeholder="confirm password">
						<span id='message'></span>
				  	</div>
					  <div class="col-md-6 col-sm-6">
						<textarea name="Description" id="" cols="30" rows="2"><?php echo $lawyer['Description']?></textarea>
				  	</div>
					  <div class="col-md-6 col-sm-6">
						<div class="form-group mb-2">
							<input type="file" name="img" class="form-control" id="customFile">
						</div>
				  	</div><br>
					<div class="col-md-4 col-sm-4">
						<input name="reg_user" type="submit" class="form-control" id="submit" value="update">
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