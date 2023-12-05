<?php 
  
/*echo "xyz";
$r=date('d - m - Y',strtotime('2013-01-19 01:23:42'));
echo($r);*/


?> 

<!DOCTYPE html>
<html>
<head>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BooksPentagon  -  UserLogin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title></title>
	<style type="text/css">
	html{
		background: #83a4d4;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #b6fbff, #83a4d4);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #b6fbff, #83a4d4);
	}
  body{
    background: #83a4d4;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #b6fbff, #83a4d4);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #b6fbff, #83a4d4);
  }
		   .login-form {
  box-sizing:border-box;
  padding-top:15px;
    padding-bottom:10%;
  margin:5% auto;
  text-align:center;

}

.login-form input[type="text"] {
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

	<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
		<div class="login-form">
		 <input type="text" name="name" placeholder="Date-Month-Year" style="font-family: sans-serif;opacity: 0.8;">
		 <input type="submit" name="submit" value="submit">
	</div>

	</form>
  
</body>
</html>

<?php
function writeMsg() {
		//code here
		
}
$example = $_POST['name'];
  #echo $example;
date_default_timezone_set('Australia/Melbourne');
$date = date('m/d/Y ', time());
#echo($date);
if ($example == NULL){
echo "PLEASE ENTER DATE";
}
$Confirm=date_create($example);
$check=date_format($Confirm,"m/d/Y ");
#echo($check);
if($date==$check && $example != NULL){
	writeMsg();
}
?>