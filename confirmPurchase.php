<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://js.paystack.co/v1/paystack.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BooksPentagon  -  ConfirmPurchase</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
    ob_start();
?>
   
    
    <link rel="stylesheet" href="assets/css/Footer-with-button-logo.css">
    <style type="text/css">
        .rb button[type="submit"] {
 max-width:400px;
 background: #3498db;
 color: #eee;
 
 border:none;
    width: 80%;
  line-height:3em;
  font-family: Trebuchet MS;
  margin:1em 2em;
  border-radius:5px;
  
  outline:none;
  padding-left:10px;
  align-items: center;
}
.rb{
    box-sizing:border-box;
 
    padding-bottom:10%;
  margin:5% auto;
  text-align:center;
}

.login-form h3 {
  text-align:left;
  margin-left:40px;
  color:#fff;
}
.login-form {
  box-sizing:border-box;
  
   
  margin:5% auto;
  text-align:center;
}
.login-form input[type="text"] {
  max-width:400px;
    width: 80%;
  line-height:3em;
  font-family: 'Ubuntu', sans-serif;
  margin:1em 1em;
  border-radius:5px;
  border:2px solid #f2f2f2;
  outline:none;
  padding-left:10px;
}




    </style>

</head>
<body>
<?php
    include("header.php");
?>
<form method="post">
<?php
    $id=0;
    if(isset($_COOKIE["username"])&&isset($_COOKIE["password"])&&isset($_COOKIE["sellerID"])&&isset($_POST["buy"]))
    {
        
        include('dbdata.php');
        $con=mysqli_connect($serverid,$username,$pass,$DBname);
        if(mysqli_connect_error($con)){
            die("try refreshing");
        }
        $query='Select id from userinfo where username="'.$_COOKIE["username"].'"';
        if($rs=mysqli_query($con,$query))
        {
            while($row=mysqli_fetch_array($rs))
            {
                $id=$row["id"];
            }
        }
        $query1='INSERT into papersbought(buyerID,sellerID,paperName,paperDescription,paperPrice)
        values('.$id.','.$_COOKIE["sellerID"].',"'.$_COOKIE["paperName"].'","'.$_COOKIE["paperDescription"].'","'.$_COOKIE["paperPrice"].'")';
        if(!mysqli_query($con,$query))
        {
            echo mysqli_error($con);
        }
        else
        {
            $query2="select id from userinfo where username='".$_COOKIE["username"]."'";
            if($rs=mysqli_query($con,$query))
            {
                while($row=mysqli_fetch_array($rs))
                {
                    $id=$row["id"];
                    $query2='INSERT into paystackinfo(userID,paystackNumber,paystackCvv,paystackExpiryMonth,paystackExpiryYear
                    ) values('.$id.',"'.$_POST["paystackNumber"].'","'.$_POST["paystackCvv"].'","'.$_POST["paystackExpiryMonth"].'","'.$_POST["paystackExpiryYear"].'")';
                }

            }

        }
    }
    if(isset($_COOKIE["username"])&&isset($_COOKIE["password"])&&isset($_COOKIE["sellerID"]))
    {
        include('dbdata.php');
        $con=mysqli_connect($serverid,$username,$pass,$DBname);
        if(mysqli_connect_error($con)){
            die("try refreshing");
        }
        
        echo '<div class="login-form"><h4>PaperName</h4><input type="text" readonly name="paperName" value="'.$_COOKIE["paperName"].'"></div>';   
        echo '<div class="login-form"><h4>PaperDescription</h4><input type="text" readonly name="paperDescription" value="'.$_COOKIE["paperDescription"].'"></div>';
        echo '<div class="login-form"><h4>PaperPrice</h4><input type="text" readonly name="paperPrice" value="'.$_COOKIE["paperPrice"].'"></div>';
        echo '<input type="hidden" readonly name="sellerID" value="'.$_COOKIE["sellerID"].'"><br><br>';
        

    }
?>
<div class="rb">
    <button type="submit" data-paystack="submit" name="buy" >Submit</button></div>
</form>
    <script>
        // Initialize paystack object
        
    </script>
    <?php
        include("footer.php");
    ?>
</body>
</html>