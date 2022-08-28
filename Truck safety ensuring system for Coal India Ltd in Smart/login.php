<?php 

session_start();

	include("connection.php");
	include("functions.php");

	$loginerror =false;
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
    
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from demo where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}

			$loginerror = true;
			
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <div class="form-box">

        <form method="post">
            <h1>Login Here</h1>
            <div class="inputbox">
                <i class="fa fa-envelope-o"></i>
                <input id="text" type="text" placeholder="Username" name="user_name">
            </div>
            <div class="inputbox">
                <i class="fa fa-key"></i>
                <input type="password" placeholder="Password" id="myinput" name="password">
                <span class="eye" onclick="myfunction()">
                    <i id="hide1" class="fa fa-eye"></i>
                    <i id="hide2" class="fa fa-eye-slash"></i>
                </span>
            </div>

			
            <input id="button" class="loginbtn" type="submit" value="Login"><br><br>

            
        </form>

		
		<?php
		if($loginerror)
		{
			echo '<h3>invalid credentials !!</h3>';
		}
		?>
    </div>
	<script>
		function myfunction(){
			var y =document.getElementById("hide1");
			var z =document.getElementById("hide2");
			var x =document.getElementById("myinput");

			if(x.type==='password')
			{
				x.type="text";
				y.style.display="block";
				z.style.display="none";
			}
			else{
				x.type="password";
				y.style.display="none";
				z.style.display="block";
			}


		}
	</script>
</body>

</html>