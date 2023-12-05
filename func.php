<?php
$host = 'bookspentagon.com';
$user = 'strixplasma';
$pass = 'strixplasma';
$db = 'bookspentagon';
$link = mysqli_connect ($host, $user, $pass, $db) or die (mysqli_error()); //die digunakan untuk memberhentikan syntax sampai disini
 ?>

<?php
session_start();
function result ($query) {
  global $link;
  if ($result = mysqli_query($link, $query) or die ('gagal menampilkan data')){
  return $result;
  }
}

function run($query) {
  global $link;
  if (mysqli_query ($link, $query)) return true;
  else return false;
  }

function user($username) {
  $query = "SELECT * FROM userinfo WHERE username='$username'";
  return result ($query);
}

function update_token($code,$username) {
$query = "UPDATE userinfo SET token='$code' WHERE username='$username'";
return run ($query);
}

function update_pass($konfir_pass,$username) {
$query = "UPDATE userinfo SET password='$konfir_pass' WHERE username='$username'";
return run ($query);
}
 ?>
