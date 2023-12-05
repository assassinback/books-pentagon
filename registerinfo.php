<?php
  ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>BooksPentagon  -  Register Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BooksPentagon  -  UserLogin</title>
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
.login-form input[type="password"],.login-form input[type="date"],.login-form input[type="email"] {
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
</style>
</head>
<body>
<?php
  include("header.php");
?>
<div class="login-form">
<form method="POST">  
  <h1>
  Registration Form</h1>
  <br><br>
  <h4>Username</h4> <input type="text" name="username" placeholder="username">
  <br><br>
  <h4>Password</h4> <input type="password" name="password" placeholder="password">
  <br><br>
  <h4>DateOfBirth</h4> <input type="date" name="dateofbirth" placeholder="date of birth">
  <br><br>
  <h4>Email</h4> <input type="email" name="email" placeholder="email">
  <br><br>
  <h4>Mobile Number</h4><input type="text" name="phone" placeholder="phone">
  <br><br>
  <input type="checkbox" name="check" value="checked">&nbsp;Terms and conditions&nbsp;&nbsp;&nbsp;<a href="terms.php" target="_blank">View Here</a>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</div>
<?php
$i=0;
$checkterms=0;
  if(isset($_POST['username']))
  {
    if(isset($_POST["check"]))
    {
    include('dbdata.php');
        $con=mysqli_connect($serverid,$username,$pass,$DBname);
        if(mysqli_connect_error($con)){
            die("try refreshing");
        }
    $query="Select * from userinfo";
    if($rs=mysqli_query($con,$query))
    {
      while($row=mysqli_fetch_array($rs))
      {
        if($row["username"]==$_POST['username'])
        {
          $i=1;
        }
      }
    }
    if($i==0)
    {
      $query='INSERT INTO userinfo(username,`password`,`dateofbirth`,`email`,`phone`) VALUES("'.$_POST["username"].'","'.$_POST["password"].'","'.$_POST["dateofbirth"].'","'.$_POST["email"].'","'.$_POST["phone"].'")';
      
 if(mysqli_query($con,$query)){
     $to=$_POST["email"];
      $subjectc="Welcome to Books Pentagon";
      $txt = "Thank you for registering at Books Pentagon We hope you have a good time with us";
      $headers = "From: support@bookspentagon.com";
      mail($to,$subject,$txt,$headers);
 	$last_id=mysqli_insert_id($con);
 	mkdir("./papers/{$last_id}");
    mkdir("./papers/{$last_id}/published");
    mkdir("./papers/{$last_id}/waiting");
    setcookie("username",$_POST['username'],time()+2419200);
    setcookie("password",$_POST['password'],time()+2419200);
    header("Location:userPanel.php");
    ob_end_flush();
 }
      //header("Location:register.php");
    }
    else{
      echo "<script>alert('username already exists');</script>";
    }
  }
  else{
    // if(!isset($_POST["check"]))
    // {
      //if($_POST["check"]!="checked")
      //{
      echo "<script>alert('Please agree to terms and conditions');</script>";
      //}
    //}
    
  }
  }
  
  include('footer.php');
?>
</body>
</html>