<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BooksPentagon  -  Confirm Waiting Paper</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
    
    <link rel="stylesheet" href="assets/css/Footer-with-button-logo.css">
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
    td:nth-of-type(1):before { content: "User Id"; }
    td:nth-of-type(2):before { content: "Paper Name"; }
    td:nth-of-type(3):before { content: "Paper Description"; }
    td:nth-of-type(4):before { content: "Paper Price"; }
    td:nth-of-type(5):before { content: "Buy Paper"; }
   
}
th{
     font-family: Trebuchet MS;
}



    </style>
</head>
<body>
<?php
include("header.php");
    if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])&&isset($_POST['publish']))
    {
        setcookie("publish",$_POST['publish']);
        setcookie("userid",$_POST["userid"]);
        setcookie("paperName",$_POST["paperName"]);
        setcookie("paperDescription",$_POST["paperDescription"]);
        setcookie("prices",$_POST["prices"]);
        header("Location:confirmPublish.php");
        ob_end_flush();
    }
    if(isset($_COOKIE['username'])&&isset($_COOKIE['password']))
    {
        include('dbdata.php');
        $con=mysqli_connect($serverid,$username,$pass,$DBname);
        if(mysqli_connect_error($con)){
            die("try refreshing");
        }
        $query='SELECT id FROM userinfo where username="'.$_COOKIE["username"].'"';
        $con=mysqli_connect($serverid,$username,$pass,$DBname);
        if(mysqli_connect_error($con)){
            die("try refreshing");
        }
        if($rs=mysqli_query($con,$query))
        {   
            while($row=mysqli_fetch_array($rs))
            {
                $userid=$row["id"];
            }
        }
        $prices="";
        $query1="Select * from waitingpapers where userID=".$userid."";
        if($rs=mysqli_query($con,$query1))
        {   
            echo "<table border=1>";
            echo "<th>userID</th>";
            echo "<th>paperName</th>";
            echo "<th>paperDescription</th>";
            echo "<th>AdminApproval</th>";
            echo "<th>Prices</th>";
            echo "<th>Confirm This paper</th>";
            while($row=mysqli_fetch_array($rs))
            {
                echo '<tr>
                    <td>'.$row["userID"].'</td>
                    <td>'.$row["paperName"].'</td>
                    <td>'.$row["paperDescription"].'</td>
                ';
                if($row["AdminApproval"]==0)
                {
                    echo '<td>Waiting</td>
                    <td>Waiting</td>
                    <td>Waiting</td></tr>';
                }
                else{
                    echo '<td>Waiting</td>';
                    $query2="Select * from waitingprice where waitingId=".$row["id"];
                    if($rs1=mysqli_query($con,$query2))
                    {
                        while($row1=mysqli_fetch_array($rs1))
                        {
                            $prices.=$row1["price"].",";
                            
                        }
                        $prices=substr($prices,0,strlen($prices)-1);
                        echo "<td>".$prices."</td><td>
                        <form method='POST'>
                            <input type='submit' value='Confirm this' name='publish'>
                            <input type='hidden' name='userid' value='".$row["userID"]."'>
                            <input type='hidden' name='paperName' value='".$row["paperName"]."'>
                            <input type='hidden' name='paperDescription' value='".$row["paperDescription"]."'>
                            <input type='hidden' name='prices' value='".$prices."'>
                        </form>
                        </td>
                        </tr>
                        ";

                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            }
            echo "</table>";
        }
        else{
            echo mysqli_error($con);
        }

            
        
    }
    else{
        die("invalid credientials");
    }
    include('footer.php');
?>    
</body>
</html>
