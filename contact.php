<?php 
error_reporting('E_ALL');
include('connection.php'); 
if(isset($_POST['submit'])){
	$id=$_GET['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$subject= $_POST['subject'];
	$message= $_POST['message'];
           
	$sq = "insert into contact(name,email,contact,subject,message) values('$name','$email','$contact','$subject','$message')";
	$sq="update contact set name='".$name."', email='".$email."',  contact='".$contact."',  subject='".$subject."', message='".$message."' where id='".$id."'";

	mysql_query($sq);
	//echo "lastid --".$lastid = mysql_insert_id();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="contactstyle.css">
	<link href="https://fonts.googleapis.com/css2?
	family=poppins:wght@400;600;800&display=swap" rel="stylesheet">
	<title>Contact Us</title>
</head>
<body>
<?php 
       $id=$_GET['id'];
       $sqd="select * from contact where id='".$id."'";
       $rsd=mysql_query($sqd);
       $rw=mysql_fetch_array($rsd);
  ?>
    <a href="index.html" class="btn btn-default btn-back"><span class="glyphicon glyphicon-arrow-left"></span></a>

	<div class="container">
		
       <h1>Connect with us</h1>
       <p>we would love to respond to your queries and help you succeed.<br> Feel free to get in touch us.</p>
    <div class="contact-box">
    	<div class="contact-left">
    		<h3>Send your request</h3>
    		<form method="POST">
    			<div class="input-row">
    				<div class="input-group">
    					<label>Name</label>
    					<input type="text" name="name" placeholder="Enter name" value="<?php echo $rw['name']; ?>">
    				</div>
    				<div class="input-group">
    					<label>Email</label>
    			 		<input type="email" name="email"   placeholder="Enter E-Mail" value="<?php echo $rw['email']; ?>">
    				</div>
    			</div>
    			<div class="input-row">
    				<div class="input-group">
    					<label>Contact</label>
    					<input type=digit name="contact" pattern="[7-9]\d{9}" title="Mobile Number Should be 10 Digit Starts with 7,8,9"   maxlength="10" placeholder="Enter contact number" value="<?php echo $rw['contact']; ?>">
    				</div>
    				<div class="input-group">
    					<label>Subject</label>
    					<input type="text" name="subject"  placeholder="Product Demo" value="<?php echo $rw['subject']; ?>">
    				</div>
    			</div>
    			<label>Message</label>
    			<textarea rows="5" name="message"  placeholder="Your Message" value="<?php echo $rw['message']; ?>"></textarea>
    			<button type="submit" name="submit" onclick="sendmsg()">SEND</button>
    	</div>     
    </form>

    	<div class="contact-right">
    		<h3>Reach us</h3>
    		<table>
    			<tr>
    				<td>Email :-</td>
    				<td>tohitshaikh391@gmail.com</td>
    			</tr>
    			<tr>
    				<td>Phone :-</td>
    				<td>+91 8600-580-388</td>
    			</tr>
    			<tr>
    				<td>State :-</td>
    				<td>Maharastra</td>
    			</tr>
    			<tr>
    				<td>City :-</td>
    				<td>Pune</td>
    			</tr>
    			<tr>
    				<td>Address :-</td>
    				<td>#212 Pune-Nashik Road<br> Narayangoan Kureshi Apartment 410504</td>
    			</tr>
    		</table>
    	</div>
    </div>
</div>
</body>
<script type="text/javascript">
	function sendmsg(){
		alert("your Message send successfully");
	}
</script>
</html>