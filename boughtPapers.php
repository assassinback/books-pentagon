
<?php
    include("header.php");
    if(isset($_COOKIE['username'])&&isset($_COOKIE['password']))
    {    
        $id=0;
        include('dbdata.php');
        $con=mysqli_connect($serverid,$username,$pass,$DBname);
        if(mysqli_connect_error($con)){
            die("try refreshing");
        }   
        echo "<table border=1>";
        echo "<th>Title</th>";
        echo "<th>Breif Description</th>";
        echo "<th>Price</th>";
        echo "<th>Book Link</th>";
        echo "<th>Payment Released</th>";
        $query="Select id from userinfo where username='".$_COOKIE["username"]."'";
        if($rs=mysqli_query($con,$query))
        {
            while($row=mysqli_fetch_array($rs))
            {
                $id=$row["id"];
            }
        }
        $query1="Select * from papersbought where buyerID=".$id;
        if($rs=mysqli_query($con,$query1))
        {
            while($row=mysqli_fetch_array($rs))
            {
                echo "<tr>";
                echo '<td>'.$row["paperName"].'</td>';
                echo '<td>'.$row["paperDescription"].'</td>';
                echo '<td>'.$row["paperPrice"].'</td>';
                if($row["paymentReleased"]==0)
                {
                    echo '<td>Payment not Released</td>';
                }
                else{
                    echo '<td>Payment Released</td>';
                }
                echo '<td> <a href="./papers/'.$row["sellerID"].'/published/'.$row["paperName"].'.pdf">View Paper</a> </td> ';
                echo "</tr> ";
            }
        }
        echo "</table> ";

    }
    include("footer.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>BooksPentagon  -  UserPanel</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title></title>
    <style type="text/css">
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

th{
    font-family: Trebuchet MS;
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
    td:nth-of-type(1):before { content: "Paper Name"; }
    td:nth-of-type(2):before { content: "Paper Description"; }
    td:nth-of-type(3):before { content: "Paper Price"; }
    td:nth-of-type(4):before { content: "Paper Link"; }
    td:nth-of-type(5):before { content: "Payment Released"; }
   
}
    </style>
</head>
<body>

</body>
</html>