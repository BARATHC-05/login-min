<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,email,password) values ('$user_id','$user_name','$email','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>signup</title>
    <style>
        body{
            background-image: url('b.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        h1{
            color:hsl(198, 60%, 50%);
        }
        pre{
            font-size: 10px;
        }
        label{
            width:0;
            margin:60;
            padding:60;
        }
        .signup{
             background:white;
            top:400px;
            height:560px;
            width:470px;
            margin:auto;
            cursor: pointer;
             
        }
        input{
            width:400px;
            margin:5px;
            padding:10px;
            border:none;
            border-bottom: 2px solid skyblue;
        }
         input[type=checkbox]{
            padding:0;
            margin:5px;
            width:20px;
         }

    </style>
</head>
<body>
    <div class="main">
    <div class="signup" align="center">
        <h1 style="margin-top: 50px;padding: 20px;">Create an Account</h1>
        <form method="POST" action="signup.php">
             
             
            <input type="varchar" name="user_name" placeholder="Name"required="">
            <br>
            
            <input type="email" name="email"placeholder="Email">
            <br>
             
            <input type="password" name="password" placeholder="Password" pattern="(?=.*[0-9]).{8,}"required="">
            <pre>Must contain al least one number and at least 5 or more characters.</pre>
              
            
            <label><input type="checkbox" name="" required="" style="margin:0;padding:0;">I agree</label>
            <br>
            <br>
            <input type="submit" name="submit" value="Signup" style="background:linear-gradient(to right, hsl(176, 68%, 64%) , hsl(198, 60%, 50%) 100%);border-radius:5px;width:250px;border-bottom: none">
            <br>
            <br>
            <a href="login.php">Click to Login</a><br><br>
        </form>
    </div>
</div>
</body>
</html>

 
			 