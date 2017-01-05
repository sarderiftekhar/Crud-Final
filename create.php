<?php 
	
	include "inc/header.php"; 
	include "config.php";
	include "database.php";

	$db = new database();

	if(isset($_POST['submit'])){

		$name = mysqli_real_escape_string($db->link,$_POST['name']);
		$email = mysqli_real_escape_string($db->link,$_POST['email']);
		$skill = mysqli_real_escape_string($db->link,$_POST['skill']);

		if($name=='' || $email = '' || $skill =''){

			$error = "Field must not be empty!!";
		}
		
	else
		{

			$query = "INSERT INTO tbl_user(name,email,skill) Values('$name','$email','$skill')";
			
			$create = $db->insert($query);
		}

	}

	
	if(isset($error)){

		echo "<span style='color:red'>".$error."</span>";

	}


?>


<form action="" method="POST">

<table>

<tr>
	<td>Name</td>
	<td><input type="text" name="name" placeholder="Please enter Name"></td>
</tr>	

<tr>
	<td>Email</td>
	<td><input type="text" name="email" placeholder="Please enter Email"></td>
</tr>

<tr>
	<td>Skill</td>
	
	<td><input type="text" name="skill" placeholder="Please enter Skill"></td>
<
/tr>		

<tr>
	
	<td align="right"> 
	
		<input type="submit" name="submit"	value="submit">
	
		<input type="reset" value="cancel">
	</td>

</tr>
		
</table>

</form>

<a href="index.php">Go Back</a>

<?php include 'inc/footer.php'; ?>

