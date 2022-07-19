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
  <style>
    /* use reverse flexbox to take advantage of flex-direction: reverse */
.star-rating {
  display: flex;
  align-items: center;
  width: 160px;
  flex-direction: row-reverse;
  justify-content: space-between;
  margin: 40px auto;
  position: relative;
}
/* hide the inputs */
.star-rating input {
  display: none;
}
/* set properties of all labels */
.star-rating > label {
  width: 30px;
  height: 30px;
  font-family: Arial;
  font-size: 30px;
  transition: 0.2s ease;
  color: orange;
}
/* give label a hover state */
.star-rating label:hover {
  color: #ff69b4;
  transition: 0.2s ease;
}
.star-rating label:active::before {
  transform:scale(1.1);
}

/* set shape of unselected label */
.star-rating label::before {
  content: '\2606';
  position: absolute;
  top: 0px;
  line-height: 26px;
}
/* set full star shape for checked label and those that come after it */
.star-rating input:checked ~ label:before {
  content:'\2605';
}

@-moz-document url-prefix() {
  .star-rating input:checked ~ label:before {
  font-size: 36px;
  line-height: 21px;
  }
}  
  </style>


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

<!-- Modal -->
<div class="modal fade" id="review_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <h4 class="text-center mt-2 mb-4">
          <i class="fa fa-star submit_star" style="color:grey" id="submit_star_1" data-rating="1"></i>
          <i class="fa fa-star submit_star" style="color:grey" id="submit_star_2" data-rating="2"></i>
          <i class="fa fa-star submit_star" style="color:grey" id="submit_star_3" data-rating="3"></i>
          <i class="fa fa-star submit_star" style="color:grey" id="submit_star_4" data-rating="4"></i>
          <i class="fa fa-star submit_star" style="color:grey" id="submit_star_5" data-rating="5"></i>
        </h4>

        <div class="form-group">
        <textarea name="user_name" id="user_name" class="form-control" placeholder="Enter your name"></textarea>
        </div>
        <div class="form-group">
          <textarea name="user_review" id="user_review" class="form-control" placeholder="Write your review here"></textarea>
        </div>
        <div class="form-group text-center mt-4">
          <button class="btn btn-primary" id="save_review">Submit</button>
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
               session()->set('lawyerid', $lawyers['ID']);
               ?>
              <?php
            }else{
              
            }
          }
        ?>
      <td><p><b-button type="button" name="add_review" id="add_review"  class="btn btn-primary">Rate Lawyer</b-button> <button onclick="location.href='<?= base_url('/deleteCase2'.'/'.$row['id']) ?>'" class="btn btn-danger">Delete Case</button></td></p>
    
      
    
    
     
    </tr>
    </tbody>

  <?php }}}} ?>
</table>           
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
          <li><a href="#" class="fa fa-star"></a></li>
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
    $(document).ready(function(){

      var rating_data = 0;

      $('#add_review').click(function(){

          $('#review_modal').modal('show');

      });

      $(document).on('mouseenter', '.submit_star', function(){

      var rating = $(this).data('rating');

      reset_background();

      for(var count = 1; count <= rating; count++)
      {
    
          $('#submit_star_'+count).css("color","orange");

      }

      });

      function reset_background()
      {
          for(var count = 1; count <= 5; count++)
          {

            $('#submit_star_'+count).css("color","grey");

          }
      }

      $(document).on('mouseenter', '.submit_star', function(){

      rating_data = $(this).data('rating');
        console.log(rating_data);
      });

      $('#save_review').click(function(){
        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }else{
          
          dataa = {user_review:user_review, user_name:user_name,rating_data:rating_data},
          console.log(dataa)
          $.ajax({
            url: '<?= base_url('/rating') ?>',
            method:"POST",
            dataType: 'json',
            data: dataa,
            success:function(dataa)
                {
                  alert('sent')
                    $('#review_modal').modal('hide');
                }

          })
        }
      })

      
      
    });
</script>

</body>
</html>