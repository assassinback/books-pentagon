<?php
  ob_start();
  require_once 'dbdata.php';
  require_once 'func.php';

$kode=$_GET['code'];
$username = $_GET['username'];

//check link
 if (isset($kode) && isset($username)){
 $db_user = user($username);
 $row = mysqli_fetch_assoc($db_user);
 $token = $row ['token'];
 $db_username = $row ['username'];

//check between tokens & usernames that are in links and databases
if ($token==$kode && $db_username==$username){
  //check submit
  if  (isset($_POST['submit'])) {
  $password = $_POST['password'];
  $konfir_pass = $_POST['konfir_password'];
  //check password
  if ($password==$konfir_pass) {
  echo "password telah diupdate";
    update_pass($konfir_pass, $username);
    header('location:login.php');
  }else {echo "password is different";}
  }
}else{echo "token & username is different";}
}else{echo "link is wrong";}

?>

<!DOCTYPE html>
<html>
<head>
	<title>BooksPentagon  -  Update Password</title>
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
<h3>Change your password</h3>
<form action=""  method="post">
<label>password</label><br>
<input type="text" name="password" placeholder="password"><br>
<label>new password</label><br>
<input type="text" name="konfir_password" placeholder="new password"><br>
<input type="submit" name="submit">
</form>
<?php
  include("footer.php");
?>
</body>
</html>