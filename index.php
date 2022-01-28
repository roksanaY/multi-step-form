<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Multi Step Form</title>

	<!-- Bootstrap CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style>
		#second, #third, #result{
			display:none;
		}
	</style>
</head>
<body class="">

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 p-4 rounded mt-5 card">
				<h5 id="result" class="text-center text-light bg-success p-2 mb-2 rounded lead">Hello <?php echo $_POST['name']; ?>, Your form submitted successfully !</h5>
				<div class="progress mb-2" style="height:30px">
					<div class="progress-bar bg-danger" role="progressbar" style="width: 30%" id="progressBar">
						<b class="lead" id="progressText">Step - 1</b>
					</div>
				</div>
				<form action="" method="post" id="formData">
					<!-- First Step -->
					<div id="first">
						<h4 class="text-center bg-primary rounded p-1 text-light">Personal Information</h4>
						  <div class="form-group">
						    <label for="name">Name</label>
						    <input type="text" class="form-control" id="name" name="name" placeholder="Name...">
						    <b class="form-text text-danger" id="nameError"></b>
						  </div>
						  <div class="form-group">
						    <label for="username">User Name</label>
						    <input type="text" class="form-control" id="username" name="username" placeholder="Username...">
						    <b class="form-text text-danger" id="usernameError"></b>
						  </div>

						  <div class="form-group mt-2 mb-2">
						    <a href="#" id="next-1" class="btn btn-primary">Next</a>
						  </div>
				  	</div>

				  	<!-- Second Step -->
				  	<div id="second">
						<h4 class="text-center bg-primary rounded p-1 text-light">Contact Details</h4>
						  <div class="form-group">
						    <label for="email">Email</label>
						    <input type="email" class="form-control" id="email" name="email" placeholder="Email...">
						    <b class="form-text text-danger" id="emailError"></b>
						  </div>
						  <div class="form-group">
						    <label for="phone">Phone</label>
						    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone...">
						    <b class="form-text text-danger" id="phoneError"></b>
						  </div>

						  <div class="form-group mt-2 mb-2">
						  	<a href="#" id="prev-2" class="btn btn-danger">Back</a>
						    <a href="#" id="next-2" class="btn btn-primary">Next</a>
						  </div>
				  	</div>

				  	<!-- Third Step -->
				  	<div id="third">
						<h4 class="text-center bg-primary rounded p-1 text-light">Choose Password</h4>
						  <div class="form-group">
						    <label for="password">Password</label>
						    <input type="password" class="form-control" id="password" name="password" placeholder="Password...">
						    <b class="form-text text-danger" id="passwordError"></b>
						  </div>
						  <div class="form-group">
						    <label for="cpass">Confirm Password</label>
						    <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Confirm Password...">
						    <b class="form-text text-danger" id="cpassError"></b>
						  </div>

						  <div class="form-group mt-2">
						  	<a href="#" id="prev-3" class="btn btn-danger">Back</a>
						    <input type="submit" id="submit" class="btn btn-primary" value="Submit" />
						  </div>
				  	</div>				  	
				</form>
			</div>
		</div>
	</div>		

	

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<!-- Custom JS-->
<script type="text/javascript">
		$(document).ready(function(){

		//Step One validation
		$("#next-1").click(function(e){

			e.preventDefault();
			$("#nameError").html("");
			$("#usernameError").html("");

			if($("#name").val() == ''){

				$("#nameError").html("Name is required.");
				return false;
			}
			else if($("#name").val().length < 3){

				$("#nameError").html("Name should not less than 3 characters.");
				return false;
			}
			else if($("#name").val().length > 50){

				$("#nameError").html("Name should not more than 50 characters.");
				return false;
			}
			else if(!isNaN($("#name").val())){

				$("#nameError").html("Numbers are not allowed.");
				return false;
			}
			else if($("#username").val() == ''){

				$("#usernameError").html("Username is required.");
				return false;
			}
			else if($("#username").val().length < 4){

				$("#usernameError").html("Username should not less than 4 characters.");
				return false;
			}
			else if($("#username").val().length > 8){

				$("#usernameError").html("Username should not more than 8 characters.");
				return false;
			}
			else{

				$("#second").show();
				$("#first").hide();
				$("#progressBar").css("width", "60%");
				$("#progressText").html("Step - 2");
			}
		});




		//Step Two validation
		$("#next-2").click(function(e){

			function validateEmail($email){
				var emailReg = /^([\w-\.]+@([\w-].+\.)+[\w-]{2,4})?$/;
				return emailReg.test($email);
			}
			e.preventDefault();
			$("#emailError").html("");
			$("#phoneError").html("");

			if($("#email").val() == ''){

				$("#emailError").html("Email is required.");
				return false;
			}
			else if(!validateEmail($("#email").val())){

				$("#emailError").html("Email is not valid.");
				return false;
			}
			else if($("#phone").val() == ''){

				$("#phoneError").html("Phone number is required.");
				return false;
			}
			else if(isNaN($("#phone").val())){

				$("#phoneError").html("Only numbers are allowed.");
				return false;
			}
			else if($("#phone").val().length != 10){
				
				$("#phoneError").html("Phone number should contain 10 digit.");
				return false;
			}
			else{
				$("#third").show();
				$("#second").hide();
				$("#progressBar").css("width", "100%");
				$("#progressText").html("Step - 3");
			}


		});	



		//Step Three validation & form submission
		$("#submit").click(function(e){

			e.preventDefault();
			$("#passwordError").html("");
			$("#cpassError").html("");

			if($("#password").val() == ''){

				$("#passwordError").html("Password is required.");
				return false;
			}
			else if($("#password").val().length < 6){

				$("#passwordError").html("Password must be more than 6 characters.");
				return false;
			}
			else if($("#password").val() != $("#cpass").val()){

				$("#cpassError").html("Password not matched.");
				return false;
			}
			else{
			    
			     

				$.ajax({
					url:'work.php',
					method:'post',
					data:$("#formData").serialize(),
					success:function(response){
						$("#result").show();
						$("#result").html(response);
						$("#formData")[0].reset();
					}
				});

			}

		});

        
        //First prev button
		$("#prev-2").click(function(){
			$("#first").show();
			$("#second").hide();
			$("#progressBar").css("width", "30%");
			$("#progressText").html("Step - 1");
		});

        //Second prev button
		$("#prev-3").click(function(){
		    $("#result").hide();
			$("#second").show();
			$("#third").hide();
			$("#progressBar").css("width", "60%");
			$("#progressText").html("Step - 2");
		});

	});
</script>

</body>
</html>
