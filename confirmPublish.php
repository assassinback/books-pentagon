<?php
    ob_start();
?>
<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>BooksPentagon  -  ConfirmPublish User</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
    
    <link rel="stylesheet" href="assets/css/Footer-with-button-logo.css">

            </head>
            <body>
<?php
    include("header.php");
    if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])&&isset($_COOKIE['publish']))
    {
        echo '<form method="POST">
            <input type="text" value="'.$_COOKIE["userid"].'" name="userid" readonly><br><br>
            <input type="text" value="'.$_COOKIE["paperName"].'" name="paperName" readonly><br><br>
            <input type="text" value="'.$_COOKIE["paperDescription"].'" name="paperDescription" readonly><br><br>
            <input type="text" name="bankName" placeholder="Bank Name"><br><br>
            <input type="text" name="accountName" placeholder="Account Name"><br><br>
            <input type="text" name="accountNumber" placeholder="Account Number"><br><br>
            <select name="price" id="prices"><br><br>

            </select>
            <input type="submit" name="publish" value="Confirm publication">
        </form>';       
        $pricesnew=explode(',',$_COOKIE["prices"]);
        $x=sizeof($pricesnew);
        for($i=0;$i<$x;$i++)
        {
            echo '<script>document.getElementById("prices").innerHTML+="<option name='.$i.'>'.$pricesnew[$i].'</option>";
            </script>';
        }

    }
    if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])&&isset($_POST['publish'])&&isset($_POST["bankName"])&&isset($_POST["accountName"])&&isset($_POST["accountNumber"]))
    {
        include('dbdata.php');
        $con=mysqli_connect($serverid,$username,$pass,$DBname);
        if(mysqli_connect_error($con)){
            die("try refreshing");
        }
        $query='INSERT into publishedpapers(`userID`,`paperName`,`paperDescription`,`paperPrice`,`bankname`,`accountname`,`accountnumber`) VALUES("'.$_COOKIE["userid"].'","'.$_COOKIE["paperName"].'","'.$_COOKIE["paperDescription"].'",'.$_POST["price"].',"'.$_POST["bankName"].'","'.$_POST["accountName"].'","'.$_POST["accountNumber"].'")';
        if(!mysqli_query($con,$query))
        {
            echo $query;
            echo mysqli_error($con);
        }
        else{
            $query2='DELETE from waitingpapers where userid='.$_COOKIE["userid"].' and paperName="'.$_COOKIE["paperName"].'" and paperDescription="'.$_COOKIE["paperDescription"].'"';
            if(!mysqli_query($con,$query2))
            {
                echo $query;
                echo mysqli_error($con);
            }
            else
            {
                $query3="SELECT paperspublished,papersinwaiting from userinfo where username='".$_COOKIE["username"]."'";
                if($rs=mysqli_query($con,$query3))
                {
                    while($row=mysqli_fetch_array($rs))
                    {
                        $x=$row["paperspublished"]+1;
                        $y=$row["papersinwaiting"]-1;
                        $query4='UPDATE userinfo set paperspublished='.$x.', papersinwaiting='.$y.' where username="'.$_COOKIE["username"].'"';
                        if(!mysqli_query($con,$query4))
                        {
                            echo $query;
                            echo mysqli_error($con);
                        }
                        else{
                            header("Location:userPanel.php");
                            ob_end_flush();
                        }
                    }
                }
            }
        }
    }
    include("footer.php");

?>

</body>
</html>