<?php
ob_start();
setcookie('username', "", time()-360000, '/');
setcookie('password', "",  time()-360000, '/');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>BooksPentagon  -  Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
    <link rel="stylesheet" href="assets/css/Footer-with-button-logo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
    
    

<style type="text/css">
    table { 
  width: 100%; 
  border-collapse: collapse; 
  font-family: sans-serif;
  text-align: center;
  margin-bottom: 5%;
  border-radius: 3px;
}
/* Zebra striping */
tr:nth-of-type(odd) { 

 
    background: #77a1d3; /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #77a1d3); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #77a1d3, #79cbca);
}
th { 
  background: #3498db;
  height: 6vh;
  color: white; 
  font-weight: bold; 

}

th{
    font-family: Trebuchet MS;
}
td, th { 
  padding: 6px; 
  border: 1px solid #abc; 
  text-align: left; 
  text-align: center;
}
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

    /* Force table to not be like tables anymore */
    table, thead, tbody, th, td, tr { 
        display: block; 
    }
    
    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr { 
        position: absolute;
        top: -9999px;
        left: -9999px;
    }
    
    tr { border: 1px solid #ccc; }
    
    td { 
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #d3d3d3; 
        position: relative;
        padding-left: 50%; 
    }
    
    td:before { 
        /* Now like a table header */
        position: absolute;
        /* Top/left values mimic padding */
        top: 6px;
        left: 6px;
        width: 45%; 
        padding-right: 10px; 
        white-space: nowrap;
    }
    
    /*
    Label the data
    */
    td:nth-of-type(1):before { content: "Author"; }
    td:nth-of-type(2):before { content: "Paper Name"; }
    td:nth-of-type(3):before { content: "Paper Description"; }
    td:nth-of-type(4):before { content: "Paper Price"; }
    td:nth-of-type(5):before { content: "Buy Paper"; }
   
}
input[type="submit"] {
 max-width:400px;
 background: #3498db;
 color: #eee;
 
 border:none;
    width: 65%;
  line-height:2em;
  font-family: 'Ubuntu', sans-serif;
  margin:1em 2em;
  border-radius:5px;
  
  outline:none;
  padding-left:10px;
  align-items: center;
}
</style>
</head>
<body>
<?php

  include("header.php");
    include('dbdata.php');
//     setcookie('username', "", time()-360000, '/');
// setcookie('password', "",  time()-360000, '/');
    $con=mysqli_connect($serverid,$username,$pass,$DBname);
    if(mysqli_connect_error($con)){
        die("try refreshing");
    }
    $query="SELECT * from publishedpapers ORDER BY id DESC LIMIT 20";
    echo '<table border="1">
    <th>Author</th>
    <th>Title</th>
    <th>Breif Description</th>';
    if($rs=mysqli_query($con,$query))
    {
      while($row=mysqli_fetch_array($rs))
      {
        $i=0;
            echo '<tr>';
            $query2='Select username from userinfo where id='.$row["userID"];
            if($rs2=mysqli_query($con,$query2))
            {
                while($row2=mysqli_fetch_array($rs2))
                {
                  if(isset($_COOKIE['username']))
                  {
                    if($_COOKIE["username"]==$row2["username"])
                    {
                        $i=1;
                        break;
                    }
                  }
                    echo '<td>'.$row["authorName"].'</td>';
                  
                }
            }
            if($i==1)
            {
                continue;
            }
            if(isset($_COOKIE["username"])&&isset($_COOKIE["password"]))
            {
              
              echo '<td><a href="http://bookspentagon.com/papers/'.$row["userID"].'/published/'.$row["paperName"].'.pdf">'.$row["paperName"].'</a></td>';
            }
            else
            {
              echo "<td>".$row["paperName"]." (login to view)</td>";              
            }
            echo '<td>'.$row["paperDescription"].'</td>';
            
            echo '</tr>';
      }

    }
    echo '</table>';
    if(isset($_POST["buythis"]))
    {
        setcookie("sellerID",$_POST["sellerID"]);
        setcookie("paperName",$_POST["paperName"]);
        setcookie("paperDescription",$_POST["paperDescription"]);
        setcookie("paperPrice",$_POST["paperPrice"]);
        header("Location:PaystackPayment.php");
        ob_end_flush();
    }
    include("footer.php");
?>
</body>
</html>