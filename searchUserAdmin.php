<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BooksPentagon  -  SearchUserAdmin</title>
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
table { 
  width: 100%; 
  border-collapse: collapse; 
  font-family: sans-serif;
  text-align: center;
  margin-bottom: 5%;
}
/* Zebra striping */
tr:nth-of-type(odd) { 
background: #77a1d3; /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #77a1d3); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #77a1d3, #79cbca);
}
th { 
 background: #3498db;

  color: white; 
  font-weight: bold; 

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
    td:nth-of-type(1):before { content: "Id"; }
    td:nth-of-type(2):before { content: "UserName"; }
    td:nth-of-type(3):before { content: "Password"; }
    td:nth-of-type(4):before { content: "DateOfBirth"; }
    td:nth-of-type(5):before { content: "Email"; }
    td:nth-of-type(6):before { content: "PapersPublished"; }
    td:nth-of-type(7):before { content: "PapersInWaiting"; }
    td:nth-of-type(8):before { content: "Delete"; }
    td:nth-of-type(9):before { content: "View Published"; }
    td:nth-of-type(10):before { content: "View Waiting"; }

   
}
th{
    font-family: Trebuchet MS;
}
input[type="submit"]{
    max-width:200px;
 background: #3498db;
 color: #eee;
 font-family: Trebuchet MS;
 border:none;
    width: 70%;
  line-height:2em;
  
  margin:1em 1em;
  border-radius:5px;
  
  outline:none;
  padding-left:10px;
  align-items: center;
}



    </style>
</head>
<body>
<?php
include('header.php');
    if(isset($_COOKIE['username'])&&isset($_COOKIE['password']))
    {
        echo '
                <div class="login-form">
                <form method="post">
                    <input type="text" name="Username" id="username">
                    <input type="submit" value="Search User" name="searchuser">
                </form>
                </div>
            
        ';
    }
    if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])&&isset($_POST['searchuser']))
    {
        
        include('dbdata.php');
        $con=mysqli_connect($serverid,$username,$pass,$DBname);
        if(mysqli_connect_error($con)){
            die("try refreshing");
        }
        $query='Select * from userinfo where username="'.$_POST["Username"].'"';
        if($rs=mysqli_query($con,$query))
        {
            // if(mysqli_num_rows($rs)>0)
            // {
            //     setcookie('username',$_POST['username'],time()+86400);
            //     setcookie('password',$_POST['password'],time()+86400);
            //     header('Location:adminDashboard.php');
                
            // }
            echo "<div>";
            echo '<table border=1>';
            echo '<th>Id</th>';
            echo '<th>UserName</th>';
            echo '<th>Password</th>';
            echo '<th>DateOfBirth</th>';
            echo '<th>Email</th>';
            echo '<th>PapersPublished</th>';
            echo '<th>PapersInWaiting</th>';
            echo '<th>Delete</th>';
            echo '<th>View published Papers</th>';
            echo '<th>View waiting Papers</th>';
            while($row=mysqli_fetch_array($rs))
            {
                echo '<tr>
                <td>'.$row["id"].'</td>
                <td>'.$row["username"].'</td>
                <td>'.$row["password"].'</td>
                <td>'.$row["dateofbirth"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["paperspublished"].'</td>
                <td>'.$row["papersinwaiting"].'</td>
                <td border="1"><form method="POST"><input type="submit" value="Delete" name="delete">
                <input type="hidden" name="userid" value="'.$row["id"].'"></form></td>
                <td border="1"><form method="POST"><input type="submit" value="Published" name="published">
                <input type="hidden" name="userid" value="'.$row["id"].'"></form></td>
                <td border="1"><form method="POST"><input type="submit" value="Waiting" name="waiting">
                <input type="hidden" name="userid" value="'.$row["id"].'"></form></td>
                </tr>';    
            }
            echo '</table>';
            echo '</div>';
            
            }
            else{
                echo mysqli_error($con);
            }
    }
    if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])&&isset($_POST['delete']))
        {
            include('dbdata.php');
        $con=mysqli_connect($serverid,$username,$pass,$DBname);
        if(mysqli_connect_error($con)){
            die("try refreshing");
        }
            $query1="DELETE FROM userinfo WHERE id=".$_POST["userid"];
            if(!mysqli_query($con,$query1))
            {
                echo mysqli_error($con);
            }
            
        }
        include("footer.php");
?>    
</body>
</html>
