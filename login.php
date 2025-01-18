<?php 
error_reporting('E_ALL');
include('connection.php'); 
if(isset($_POST['Login'])){
  //echo "ggg---".$hobby = $_POST['hobby'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  //print_r($hobby);hobby,
  
 $sq = "SELECT * FROM signup where email='".$email."' and password='".$password."'";
 $rs = mysql_query($sq);
 $cnt = mysql_num_rows($rs);
 if($cnt >0){
    echo "<script>alert('Login successfully');</script>";
    echo "<script>window.location.assign('index.html');</script>";
 }else{
  echo "<script>alert('email and password not match');</script>";
}
}


?>
	<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style type="text/css">
	body{
		font-family: verdana;
		margin: auto;
	    }
	   *{ 
		box-sizing:border-box; 
	    }
	    /*style the input container*/

	    .form-group{
	    	display: flex;
	    	width: 100%;
	    	margin-top: 10px;

	    }
	    /*style the icon*/

	    .icon{
	    	width: 50px;
	    	padding: 15px;
	    	margin-top: -1.5px;
	    	background-color: #ffcc00;
	    	color: black;
	    	text-align: center;
	    	margin-left:200px;
	    	border-radius: 3px;
	    }
	    /* style the input field*/

	    .input_field{
	    	width: 50%;
	    	padding: 12px;

	    }
	    .input_field:focus{
            border: 2px solid #ffcc00;
	    }
	    /*style the login buttton*/
	    .btn1{
	    	width: 56%;
	    	padding: 15px 20px;
	    	border: none;
	    	background-color: #ffcc00;
	    	color: black;
	    	cursor: pointer;
	    	margin-left:200px;
	    	border-radius: 3px;
	    }
	    .btn1:hover{
	    	background-color: #ff9900;
	    }
	    .h2{
	    	font-weight: 1000;
	    	color: tomato;
      }
      
      .link{
      	color: red;
      }
      .link:hover{
      	color: tomato;
      }
	    .div1{
	    	max-width: 900px;
	    	padding: 80px 50px 50px 50px;
	    }
	    .btn-back {
	    	max-width: 100px;
	    	position: fixed;
	    	top: 30px;
	    	left: 80px;
	    	border-radius: 5px;

	    }
      .header{
      	background: radial-gradient(#fff, #ffd6d6);
        height: 750px;
      }
	    
      .header .row {
        margin-top: 0px;
      }

      


	    
</style>

</head>
<body>
<div class="header" >	

<a href="signupform.php" class="btn btn-default btn-back"><span class="glyphicon glyphicon-arrow-left"></span></a>


<div class="div1 container">


  <center>
  	<img src="images\img_avatar1.png" style="height: 90px; width: 90px; border-radius: 50%;" >
  	<br>

    <h2 class="h2">Login</h2><br>
    <h4 style="color: red;">Please sign in to continue</h4><br>
  </center>
  <form id="" name=""action="#" method="POST">
	  
    <div class="form-group">
	    <span class="glyphicon glyphicon-envelope icon"></span>
	    <input class="input_field" type="text" id="email" name="email"  value=""  placeholder="Enter E-Mail" required>
    </div>
    
    <div class="form-group">
	    <span class="glyphicon glyphicon-lock icon"></span>
	    <input class="input_field" type="password" id="password"name="password" value="" placeholder="Enter Password" required>
    </div>
    
    
	  <input class="btn1" type="submit" id="" name="Login" value="submit">
	  <center> <h4>Do not have an account?<a class="link" href="signupform.php">Sign Up</a></h4>
    </center>
  </form>
</div>
</div>
</body>
</html>