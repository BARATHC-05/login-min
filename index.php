<?php 
session_start();

	include("connection.php");
	include("functions.php");

	/*$user_data = check_login($con);*/

?>
<?php 
 $end = "uploaded successfully";

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_POST['name'];
	$rollno = $_POST['rollno'];
	$college =$_POST['college'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$file = $_POST['files'];
if(!empty($rollno) && !empty($email)){
	$query ="insert into formdetail (name,rollno,college,email,phone,address,city,state,file) Values ('$name','$rollno','$college','$email','$phone','$address','$city','$state','$file')";
	mysqli_query($con, $query);

			header("Location: index.php");
			echo( 'successfully connected');
			die;
		}
else{
	echo ("form failed");
}
}
 

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>

	<br>
	Hello, <?php echo $user_data['user_name']; ?>
    <form align="center" method = "POST" action="index.php" enctype="multipart/form-data">
    	<h1>Register Form</h1>
    	<div class = "form">
    		<label>Name:</label>
    		<input type="text" name="name">
    		<br>
    		<label>Roll No:</label>
    		<input type="text" name="rollno">
    		<br>
    		<label>College:</label>
    		<input type="text" name="college">
            <br>
            <label>Email:</label>
    		<input type="email" name="email">
            <br>
            <label>Phone No:</label>
            <input type="Phone" name="phone" value="">
            <br>
            <label>Address:</label>
    		<input type="text" name="address">
            <br>
            <label>City:</label>
    		<input type="text" name="city">
            <br>
            <label>State:</label>
    		<input type="text" name="state">
            <br>
            <label>File:</label>
            <input type="file" name="files" value="">
            <br>
            <input type="submit" name="Register" value="Upload"<?php echo $end; ?>>
    	</div>
    </form>
</body>
</html>
