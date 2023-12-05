<?php
ob_start();
setcookie('username','',time()-86400);
setcookie('password','',time()-86400);
setcookie('admin','',time()-86400);
include('dbdata.php');
    if(isset($_POST['submit']))
    {
        $con=mysqli_connect($serverid,$username,$pass,$DBname);
        if(mysqli_connect_error($con)){
            die("unsucessful");
        }
        $query="Select * from admininfo where username='".$_POST['username']."' and password='".$_POST['password']."'";
        if($rs=mysqli_query($con,$query))
        {
            if(mysqli_num_rows($rs)>0)
            {
                setcookie('username',$_POST['username'],time()+86400);
                setcookie('password',$_POST['password'],time()+86400);
                setcookie('admin',$_POST['username'],time()+86400);
                header('Location:adminDashboard.php');
                ob_end_flush();
            }
            // while($row=mysqli_fetch_array($rs))
            // {
            //     if($row['username']==)
            //     {

            //     }
            // }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BooksPentagon  -  AdminLogin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
    
    <link rel="stylesheet" href="assets/css/Footer-with-button-logo.css">
<style type="text/css">
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
  width:150px;
  background:#fff;
  border:1px solid #f2f2f2;
  border-radius:20px;
  color: slategrey;
  text-transform:uppercase;
  font-family: 'Ubuntu', sans-serif;
  cursor:pointer;
}
</style>
</head>
<body>
    <?php
    include("header.php");
    ?>
    <div class="login-form">
    <form method="POST">
        <h4>Enter username</h4><input type="text" name="username" placeholder="Username"><br><br>
        <h4>Enter password</h4><input type="password" name="password" placeholder="password">
        
        <input type="submit" name="submit" value="Login">
    </form>
</div>
    <?php
        include("footer.php");
    ?>
</body>
</html>