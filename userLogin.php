<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BooksPentagon  -  UserLogin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
<style type="text/css">
html{
	
}
	body {
		
  
  margin:0px;
  font-family: 'Ubuntu', sans-serif;
 
	
}
h1, h2, h3, h4, h5, h6, a {
  margin:0; padding:0;
}
.login {
  margin:0 auto;
  max-width:500px;
}
.login-header {
  color:#fff;
  text-align:center;
  font-size:300%;
}
/* .login-header h1 {
   text-shadow: 0px 5px 15px #000; */
}
.login-form {
  border:.5px solid #fff;
  background:#4facff;
  border-radius:10px;
  box-shadow:0px 0px 10px #000;
}
.login-form h3 {
  text-align:left;
  margin-left:40px;
  color:#fff;
}
.login-form {
  box-sizing:border-box;
  padding-top:15px;
	padding-bottom:10%;
  margin:5% auto;
  text-align:center;
}
.login-form input[type="text"],
.login-form input[type="password"] {
  max-width:400px;
	width: 80%;
  line-height:3em;
  font-family: 'Ubuntu', sans-serif;
  margin:1em 2em;
  border-radius:5px;
  border:2px solid #f2f2f2;
  outline:none;
  padding-left:10px;
}
.login-form input[type="submit"] {
  height:30px;
  width:100px;
  background:#fff;
  border:1px solid #f2f2f2;
  border-radius:20px;
  color: slategrey;
  text-transform:uppercase;
  font-family: 'Ubuntu', sans-serif;
  cursor:pointer;
}
.sign-up{
  color:#f2f2f2;
  margin-left:-70%;
  cursor:pointer;
  text-decoration:underline;
}
.no-access {
  color:#E86850;
  margin:20px 0px 20px -57%;
  text-decoration:underline;
  cursor:pointer;
}
.try-again {
  color:#f2f2f2;
  text-decoration:underline;
  cursor:pointer;
}

/*Media Querie*/
@media only screen and (min-width : 150px) and (max-width : 530px){
  .login-form h3 {
    text-align:center;
    margin:0;
  }
  .sign-up, .no-access {
    margin:10px 0;
  }
  .login-button {
    margin-bottom:10px;
  }
}
</style>

</head>
<body>

    <?php
    include("header.php");
        $i=0;
        if(isset($_POST['Login']))
        {
            include('dbdata.php');
            $con=mysqli_connect($serverid,$username,$pass,$DBname);
            if(mysqli_connect_error($con)){
                die("unsucessful");
            }
            $query="Select * from userinfo";
            if($rs=mysqli_query($con,$query))
            {
                while($row=mysqli_fetch_array($rs))
                {
                    if($row["username"]==$_POST["username"] && $row["password"]==$_POST["password"])
                    {
                        setcookie("username",$_POST["username"],time()+86400);
                        setcookie("password",$_POST["password"],time()+86400);
                        setcookie('uuser',$_POST['password'],time()+86400);
                        header("Location:userPanel.php");
                        ob_end_flush();
                        //ob_enf_fluch();
                    }
                    else{
                        $i=1;
                        
                        //break;
                    }
                }
            }
            if($i==1)
            {
                echo '<script>alert("Invalid username or password")</script>';
            }
        }
    ?>
    <form method="post">
    	<div class="login-form">
    		<div class="login-header">
    <h1>Login</h1>
  </div>
     <h4>Username:</h4><input type="text" name="username" id="username" placeholder="Enter username"><br><br>
    <h4> Password:</h4><input type="password" name="password" id="password" placeholder="Enter password"><br><br>
     &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Login" name="Login" class="login-button">
     </form>
	 
     <div>
        New? <a href="registerinfo.php" >Click Here to register</a>
     </div>
	 <div>
        <a href="user-forgot-pass.php" >Forgot Password?</a>
     </div>
 </div>
     <?php
        include("footer.php")
     ?>
</body>

</html>