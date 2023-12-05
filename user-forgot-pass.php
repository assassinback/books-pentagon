<?php
  ob_start();
  require_once 'dbdata.php';
  require_once 'func.php';

//check submit
if  (isset($_POST['submit'])) {
$username = $_POST['username'];
$email = $_POST['email'];
$db = user($username);
$jumlah = mysqli_num_rows($db);

//check is there username in database
if ($jumlah !=0) {
  while ($row=mysqli_fetch_assoc($db)){
    $db_email = $row['email'];
  }

//check input email similiar with email in database
if ($email==$db_email){
// make random code
  $code = '123456789qazwsxedcrfvtgbyhnujmikolp';
  $code = str_shuffle($code);
  $code = substr($code,0, 10);

// for send token
  $alamat = "http://http://bookspentagon.com/user-update-pass.php?code=$code&username=$username";
  $to = $db_email;
  $judul = "passwrod reset";
  $isi = "this is automatic email, dont repply. For reset your password please click this link ".$alamat;
  $headers = "From: info@bookspentagon.com" . "\r\n";
  mail($to,$judul,$isi,$headers);

//echo $alamat;
if (update_token($code, $username)){
  echo "your password have reset";
}else {
  echo "please try again";
}

}else {echo"your email didn't register";}

}else {echo"your username didn't register";}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>BooksPentagon  -  Forgot Password</title>
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
<h3>Reset Password </h3>
<form action=""  method="post">
<label>username</label>
<input type="text" name="username" placeholder="username">
<label>email</label>
<input type="text" name="email" placeholder="email">
<input type="submit" name="submit">

</form>
<?php
  include('footer.php');
?>
</body>
</html>