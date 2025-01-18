<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title></title>

<style type="text/css">
	.search_div{
			margin: 20px;
			justify-content: center;
			margin-left: 300px;
		
	}

	.searchbar{
		padding: 7px;
	}

	.content{
		background-color:#F73911;
		font-size: 20px;
	
		}

</style>
<script>

function deletedata(id){
	if(confirm('do you want to delete'))
	{
		return track;//ok
	}
	else{
		return false;//cancel
	}
}

 function openprint(){
 	$('#hidediv,.hidecol').addClass('hidden');
 	$('#showlabl').removeClass('hidden');
 	window.print();
 }	
</script>

</head>
<?php
	error_reporting('E_ALL');
	include('connection.php');
?>
<body>
	<form method="POST">
		<div class="container" id="hidediv">
			<div class=" container-fluid search_div">
		
		<input type="text" id="name" name="name" style="width: 400px; border-radius: 10px;" class="searchbar">
		
		<input type="submit" id="search" name="search" value="search" class="searchbar btn-primary" style="width: 80px;">

	

		<button id="print" name="print" style="padding: 7px; margin: 20px; width: 60px;" ><span class="glyphicon glyphicon-print" onclick="openprint();" ></span></button>
	</div>
	</div>
		

		<?php
			$sq='select * from signup';
			if(isset($_POST['search'])){
				$name= trim($_POST['name']);
				if($name !=''){
					$whr = " where name='".$name."'";
				}
		    }
            $sq = $sq.$whr;
           $rs = mysql_query($sq);
        ?>


<div id="showlabl" class="hidden" style="text-align: center; color: red; size: 25px;" > sign up data</div>

	<table class=" table table-bordered table-striped table-hover">
		
	<tr>
		<th class="content">Id</th>
		<th class="content">Name</th>
		<th class="content">Email</th>
		<th class="content">Contact</th>
		<th class="content">Address</th>
		<th class="content">Password</th>
		<th class="content">Repassword</th>
		<th class="hidecol content">Edit</th>
		<th class="hidecol content">Delete</th>
	</tr>
	<?php
		//$sq='select * from signup';
		//$rs=mysql_query($sq);
		$k=1;
		while ($rw=mysql_fetch_array($rs)) {
		?>
		<tr>
		<td><?php echo $k++; ?></td>
		<td><?php echo $rw['name']; ?></td>
		<td><?php echo $rw['email']; ?></td>
		<td><?php echo $rw['contact']; ?></td>
		<td><?php echo $rw['address']; ?></td>
		<td><?php echo $rw['password']; ?></td>
		<td><?php echo $rw['repassword']; ?></td>

		<td class="hidecol">
			<a href="signupform.php?id=<?php echo $rw['id'];?>" ><font color="blank" size="5"><span class="glyphicon glyphicon-pencil"></span></font></a>
		</td>

		<td class="hidecol"><input type="submit"  id="delete_<?php echo $rw['id'];?>" name="delete_<?php echo $rw['id'];?>"value="delete" onclick="return deletedata('<?php echo $rw['id']?>')">
		</td>
		</tr>

	<?php
    if (isset($_POST['delete_'.$rw['id']])){
    	 $sq="delete from signup where id='".$rw['id']."'";
    	mysql_query($sq);
	 }

	 ?>

<?php	}  ?>
    
	
</table>
</form>
</body>
</html>