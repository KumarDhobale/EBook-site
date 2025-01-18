<?php 
error_reporting('E_ALL');
include('connection.php'); 
if(isset($_POST['submit'])){
	$id=$_GET['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	if(trim($password) == trim($repassword)){
		if($id!=''){//update
			echo $sq="update signup set name='".$name."', email='".$email."',  contact='".$contact."',  address='".$address."', password='".$password."',  repassword='".$repassword."' where id='".$id."'";
		}else{//insert
           
		 $sq = "insert into signup(name,email,contact,address,password,repassword) values
	('$name','$email','$contact','$address','$password','$repassword')";
}
	mysql_query($sq);
	 "lastid --".$lastid = mysql_insert_id();
	 echo "<script>window.location.assign('login.php');</script>";
}else{
    echo "password not match";
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
	    	width: 100p%;
	    	margin-top: 10px;
	    	margin-bottom: 8px;

	    }
	    /*style the icon*/

	    .icon{
	    	width: 50px;
	    	padding: 15px;
	    	margin-top: -2px;
	    	background-color: #ffcc00;
	    	color: black;
	    	text-align: center;
	    	border-radius: 3px;
	    }
	    /* style the input field*/

	    .input_field{
	    	width: 80%;
	    	padding: 10px;
	    }
	    .input_field:focus{
            border: 2px solid #ffcc00;
	    }
	    /*style the login buttton*/
	    .btn1{
	    	width: 91%;
	    	padding: 15px 20px;
	    	border: none;
	    	background-color: #ffcc00;
	    	color: black;
	    	cursor: pointer;
	    	border-radius: 3px;
	    }
	    .btn1:hover{
	    	background-color: #ff9900;
	    }
	    .h2{
	    	font-weight: 1000;
	    	color: tomato;
	    }
	    .div1{
	    	max-width: 600px;
	    	padding: 20px 50px 50px 90px;
	      margin: auto;
	    }
	    .btn-back {
	    	max-width: 100px;
	    	position: relative;
	    	top: 30px;
	    	left: 80px;
	    	border-radius: 15px;
	    	position: fixed;

	    }
	    .h4{
	    	text-align: center;
	    }
	    .link{
	    	color: red;
	    }
	    .link:hover{
	    	color: tomato;
	    }

	    .header {
         background: radial-gradient(#fff, #ffd6d6);
      }
      .header .row {
        margin-top: 0px;
      }

	    
</style>
<script>
	function chkpwd() {
		var pwd= document.getElementById('password').value;
		var confpwd= document.getElementById('repassword').value;
		if (pwd!='' && confpwd!='') {
		if (pwd==confpwd) {
			//alert("password match");
		 var text=document.getElementById('confmsg').innerHTML='password match';
		 var res=text.fontcolor("green");
		 document.getElementById('confmsg').innerHTML=res;
		} else {
		var text=document.getElementById('confmsg').innerHTML='password not match';
			var res=text.fontcolor("red");
		 document.getElementById('confmsg').innerHTML=res;
		}
	}
	}

function CommonValidation(){
var name = $('#name').val(); 
var email = $('#email').val();
var contact = $('#contact').val();
var address = $('#address').val();
var password = $('#password').val();
var repassword = $('#repassword').val();
	if(name=='' || email=='' || contact=='' || address=='' || password=='' || repassword==''){
		if (name==''){
			$('#name').focus();
			$('#nameerror').html('Please Enter Name');
			return false;
		}
		if(email==''){
			$('#email').focus();
			$('#emailerror').html('Please Enter email');
			return false;
		}
		if(contact==''){
			$('#contact').focus();
			$('#contacterror').html('Please Enter phone');
			return false;
		}
		if(address==''){
			$('#address').focus();
			$('#addresserror').html('Please Enter address');
			return false;
		}
		if(password==''){
			$('#password').focus();
			$('#passworderror').html('Please Enter password');
			return false;
		}
		if(repassword==''){
			$('#repassword').focus();
			$('#repassworderror').html('Please Enter conform password');
			return false;
		}
		
	}else{
		return true;
	}
}


function chkvalidation(){
	var name = $("#name").val();
	var email = $("#email").val();
	var contact = $("#contact").val();
	var address = $("#address").val();
	var password = $("#password").val();
	var repassword = $("#repassword").val();
	 
	 if(name !=''){
		 $('#nameerror').html('');
	 }else{
		 $('#nameerror').html('');
	 }
	 if(email !=''){
		 $('#emailerror').html('');
	 }else{
		 $('#emailerror').html('');
	 }
	 if(contact !=''){
		 $('#contacterror').html('');
	 }else{
		 $('#contacterror').html('');
	 }
	 if(address !=''){
		 $('#addresserror').html('');
	 }else{
		 $('#addresserror').html('');
	 }
	 if(password !=''){
		 $('#passworderror').html('');
	 }else{
		 $('#passworderror').html('');
	 }
	 if(repassword !=''){
		 $('#repassworderror').html('');
	 }else{
		 $('#repassworderror').html('');
	 }
 }

// var IndNum = /^[0]?[789]\d{9}$/;
//       if (phn_no != '') { 
//         if (IndNum.test(phn_no)) {
//           //if true
//         } else { //false
//           alert("Mobile Number Should be 10 Digit Starting 7,8,9");
//           $('#phn_no').val('');
//           $("#phn_no").focus();
//           return false;
//         }
//     }
    


function ValidateNumberOnly(event){
	if ((event.keyCode < 48 || event.keyCode > 57)) {
	   event.returnValue = false;
	}
}


// $(document).ready(function() {
// 			$(function(){
// 				$('#name').autoComplete({
// 					minChars: 1,
// 					source: function(term, response){
// 						$.getJSON('comy_s_c.php', { q : term }, function(data){ response(data); });
// 					}
// 				});
// 			});
// 			});
 
 // function showdata(){ 
// 	  var name = $('#name').val();
// 		$.ajax({
// 			type: 'post',
// 			url: 'comy_s_d.php',
// 			data: {
// 				name: name
// 			},
// 			success: function (return_data) { 
// 				console.log(return_data);
// 				var str = return_data.split('|'); //console.log("len---"+str);
// 				for (var i = 0; i < str.length - 1; i++) {
// 					//$('#name').val(str[0]);
// 					$('#email').val(str[1]);
// 					$('#contact').val(str[2]);
// 					$('#address').val(str[3]);
// 					$('#password').val(str[4]);
// 					$('#repassword').val(str[5]);
// 					$('#id').val(str[6]);
// 				}
				
// 			}
// 		});
// 	}
</script>


</head>
<body>
<div class="header">

	<?php 
       $id=$_GET['id'];
       $sqd="select * from signup where id='".$id."'";
       $rsd=mysql_query($sqd);
       $rw=mysql_fetch_array($rsd);
  ?>

<a href="index.html" class="btn btn-default btn-back"><span class="glyphicon glyphicon-arrow-left"></span></a>


<div class="div1 container ">
  <center>
  	<img src="images\img_avatar1.png" style="height: 90px; width: 90px; border-radius: 50%;" >
    <h2 class="h2">Sign Up</h2><br>
    <h4 style="color:red;">Please sign up to continue </h4><br>
  </center>

  <form id="" name=""action="#" method="POST">
	  <div class="form-group">
		  <span class="glyphicon glyphicon-user icon"></span>
	    <input class="input_field" type="text" id="name" name="name" value="<?php echo $rw['name']; ?>"  placeholder="Enter User Name" onchange="chkvalidation();" required>
    </div>

    <label id="nameerror" style="color: red;"></label>
    
    <div class="form-group">
	    <span class="glyphicon glyphicon-envelope icon"></span>
	    <input class="input_field" type="email" id="email-field" name="email"  value="<?php echo $rw['email']; ?>"  placeholder="Enter E-Mail" onchange="chkvalidation();"  required>
	    <span id="email-error"></span>
	  </div>
	  <label id="emailerror" style="color: red;"></label>
    
    <div class="form-group">
	    <span class="glyphicon glyphicon-earphone icon"></span>
	    <input class="input_field" type="text" id="contact" name="contact" pattern="[7-9]\d{9}" title="Mobile Number Should be 10 Digit Starts with 7,8,9" maxlength="10"  value="<?php echo $rw['contact']; ?>" placeholder="Enter Contact Number" onchange="chkvalidation();" onkeypress="ValidateNumberOnly(event);" required>
    </div>

    <label id="contacterror" style="color: red;"></label>
    
    <div class="form-group"> 
	    <span class="glyphicon glyphicon-map-marker icon"></span>
	    <input class="input_field" type="" id="address" name="address" value="<?php echo $rw['address']; ?>" placeholder="Enter Address" onchange="chkvalidation();" required>
    </div>

    <label id="addresserror" style="color: red;"></label>
    
    <div class="form-group">
	    <span class="glyphicon glyphicon-lock icon"></span>
	    <input class="input_field" type="password" id="password"name="password" onchange="chkpwd();" value="<?php echo $rw['password']; ?>" placeholder="Enter Password" onchange="chkvalidation();" required>
    </div>

    <label id="passworderror" style="color: red;"></label>
    
    <div class="form-group">
	    <span class="glyphicon glyphicon-lock icon"></span>
	    <input class="input_field"  type="password" id="repassword" name="repassword" onchange="chkpwd();" value="<?php echo $rw['repassword']; ?>"  placeholder="Enter Re-Password" onchange="chkvalidation();" required>
	  </div>

	  <label id="repassworderror" style="color: red;"></label>
    
    <div><label id="confmsg"></label></div>
	    <input class="btn1" type="submit" id="" name="submit" value="submit" onclick="CommonValidation();">

    <h4 class="h4">Have An Account <a class="link" href="login.php">Login</a></h4>

  </form>
</div>
</body>
</html>