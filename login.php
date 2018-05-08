

<?php
   session_start();
    include("config.php");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword =  md5($_POST['password']);; 
      
      $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
 //        session_register("myusername");

         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome2.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel = "stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Raleway">
	<link rel = "stylesheet" href = "styles/custom.css">

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            color: white;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	<div class = "container-fluid bg">
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><br /><input type = "password" name = "password" class = "box" /><br /><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>
      
		
		<div class = "row justify-content-center align-middle landing-page">
			<img class = "mx-auto" src = "images/logo.png" alt = "TeAmo Tea" style = "height:200px;"></div>
		<div class = "row">
			<h1 class = "mx-auto" id = "cafe_name">Te Amo Tea</h1>
		</div>
		<div class = "row justify-content-center">
			<nav class = "nav">
				<a class = "nav-link" href = "index.php"><strong>Home</strong></a>
				<a class = "nav-link" href = "menu.php"><strong>Menu</strong></a>
				<a class = "nav-link" href = "shop.php"><strong>Shop</strong></a>
				<a class = "nav-link" href = "about.php"><strong>About</strong></a>
				<a class = "nav-link" href = "contact.php"><strong>Contact</strong></a>
				<a class = "nav-link" href = "form.php"><strong>Sign Up</strong></a>
				<a class = "nav-link" href = "login.php"><strong>Login</strong></a>
				<a class = "nav-link" href = "search.php"><strong>Search</strong></a>
			</nav>
		</div>
      </div>
<!--Bootstrap Scripts-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
</html>