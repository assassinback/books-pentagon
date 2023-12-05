<?php
    ob_start();
?> 
<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>BooksPentagon  -  UserPanel</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
<style>

        .sidebar
        {
            display:inline;i
            width: 100%;
            float: left;
            height: 100%;
            align-items: center;


        }

        .rightbar
        {
            display:inline;
            width: 100%;
            float:left;
            height: 100%;
            

             box-sizing:border-box;
  padding-top:15px;
    padding-bottom:80%;
  margin:5% auto;
  text-align:center;
            margin-bottom: 380px;
            
        }

        form{
            display:inline;
        }
        body {
  background: #f1c40f;
 
}

.sidebar {
    width: 100%;
    display:block;
    position:relative;
    margin-top: 100px;
    text-align: center;
    height: auto;
    

}
.sidebar input[value]{
    color:#eee;
    font-family: Trebuchet MS;
    height: auto;

}
.sidebar input[type="submit"] {
    font-family: Trebuchet MS;

    text-indent: 10px;
    background: #3498db;
    border-radius: 3px;
    padding: 4px 0;
    border:none;
    cursor: pointer;
    max-width: 195%;
    max-height: 100%;
    width:300px;
    height: 70px;
    font-size: 3.5vh;
    text-align: center;
  }

 .rightbar input[type="text"],
.rightbar input[type="password"] {
  max-width:400px;
    width: 80%;
  line-height:3em;
  font-family: 'Ubuntu', sans-serif;
  margin:1em 2em;
  border-radius:5px;
  border:2px solid #f2f2f2;
  outline:none;
  padding-left:10px;
  align-items: center;
}
.rightbar input[type="button"] {
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
.rightbar input[type="email"] {
 max-width:400px;
    width: 80%;
  line-height:3em;
  font-family: 'Ubuntu', sans-serif;
  margin:1em 2em;
  border-radius:5px;
  border:2px solid #f2f2f2;
  outline:none;
  padding-left:10px;
  align-items: center;
}
.rightbar input[type="submit"] {
 max-width:400px;
 background: #3498db;
 color: #eee;
 
 border:none;
    width: 80%;
  line-height:3em;
  font-family: 'Ubuntu', sans-serif;
  margin:1em 2em;
  border-radius:5px;
font-family: Trebuchet MS;
  outline:none;
  padding-left:10px;
  align-items: center;
}
#me{
    position: absolute;
    background-image: url('sd.png');
    background-size: cover;
    width: 90%;
    height: 100%;
    align-items: center;
    background-repeat: none;
    opacity: 0.15;
    margin-left: 5vw;
    margin-top: 95vh;
}
@media only screen and (min-width : 150px) and (max-width : 530px){
    #me{
        opacity: 0;
    }
}
    </style>
        </head>
        <body>
        <?php
          include("header.php");
        ?>
        <div id="me"></div>
    <div class="sidebar">
        <h1>UserPanel</h1>
        <br>
        <hr>
        <form action="publishPaperUser.php" method="post">
            <input type="submit" value="Submit Book">
        </form><br><br><br>
        <!-- <form action="confirmWaiting.php" method="post">
            <input type="submit" value="Confirm A paper in waiting">
        </form><br><br><br> -->
        <form action="browsePapers.php" method="post">
            <input type="submit" value="Browse Books">
        </form><br><br><br>
        <!--<form action="boughtPapers.php" method="post">-->
        <!--    <input type="submit" value="Bought Papers" name="View Bought Papers">-->
        <!--</form><br><br><br>-->
        <!-- <form action="salesReport.php" method="post">
            <input type="submit" value="Sales Report and royalty" name="viewPublished">
        </form><br><br><br> -->
        <form method="post">
            <input type="submit" value="logout" name="logout">
        </form><br><br><br>
    </div>
    <div class="rightbar">
    <?php
    if(isset($_COOKIE['username'])&&isset($_COOKIE['password']))
    {
        ?>
            <?php
            include('dbdata.php');
                $con=mysqli_connect($serverid,$username,$pass,$DBname);
                if(mysqli_connect_error($con)){
                    die("try refreshing");
                }
                $query='SELECT * FROM userinfo WHERE username="'.$_COOKIE["username"].'"';
                if($rs=mysqli_query($con,$query))
                {   
                    while($row=mysqli_fetch_array($rs))
                    {
                        //document.getElementById('myInput').removeAttribute('readonly');
                        echo '
                        <form method="POST" >
                        <h1>Want To Change</h1>
                        <br><br><hr>
                        <h4>Username</h4>&nbsp;&nbsp;&nbsp;
                        <input type="text" readonly name="user" value="'.$row["username"].'" id="edituser"><br>
                        <input type="button" value="Edit" id="usernameEdit"><br><br>
                        <h4>Password</h4>&nbsp;&nbsp;&nbsp;
                        <input type="password" readonly name="pw" value="'.$row["password"].'" id="editpass"><br>
                        <input type="button" value="Edit" id="passwordEdit"><br><br>
                        <h4>Date Of Birth</h4>&nbsp;&nbsp;&nbsp;
                        <input type="text" readonly name="dob" value="'.$row["dateofbirth"].'" id="editdate"><br>
                        <input type="button" value="Edit" id="dateEdit"><br><br>
                        <h4>Email</h4>&nbsp;&nbsp;&nbsp;
                        <input type="email" readonly name="email" value="'.$row["email"].'" id="editmail"><br>
                        <input type="button" value="Edit" id="emailEdit"><br><br>
                        <h4>Papers Published:'.$row["paperspublished"].'</h4>&nbsp;&nbsp;&nbsp;<br><br>
                        <input type="submit" name="update" value="Save">
                        </form>
                        ';       
                    }
                }
                else{
                    die("invalid credientials");
                }
                
            ?>
            <br><br>
            <form action="deleteBook.php" method="post">
                <input type="submit" value="Delete a Book">
            </form>
            <script>
                document.getElementById('usernameEdit').onclick=function()
                {
                    document.getElementById('edituser').removeAttribute('readonly');
                }
                document.getElementById('passwordEdit').onclick=function()
                {
                    document.getElementById('editpass').removeAttribute('readonly');
                }
                document.getElementById('dateEdit').onclick=function()
                {
                    document.getElementById('editdate').removeAttribute('readonly');
                }
                document.getElementById('emailEdit').onclick=function()
                {
                    document.getElementById('editmail').removeAttribute('readonly');
                }
            </script>
        <?php
    }
    if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])&&isset($_POST["update"]))
    {
        $i=0;
        include('dbdata.php');
        $con=mysqli_connect($serverid,$username,$pass,$DBname);
        if(mysqli_connect_error($con)){
            die("try refreshing");
        }
        $query="Select * from userinfo";
    if($rs=mysqli_query($con,$query))
    {
      while($row=mysqli_fetch_array($rs))
      {
        if($row["username"]==$_POST['user']&&$row["username"]!=$_COOKIE["username"])
        {
          $i=1;
        }
      }
    }
    if($i==0)
    {
        $query='UPDATE userinfo set username="'.$_POST["user"].'", password="'.$_POST["pw"].'", dateofbirth="'.$_POST["dob"].'", email="'.$_POST["email"].'" where username="'.$_COOKIE["username"].'"';
        if(!mysqli_query($con,$query))
        {
            echo mysqli_error($con);
        }
        setcookie("username",'',time()-86400);
        setcookie("password",'',time()-86400);
        setcookie("username",$_POST["user"],time()+86400,'/');
        setcookie("password",$_POST["pw"],time()+86400,'/');
        $query="Select * from userinfo where username='".$_POST["user"]."'";
        
    if($rs=mysqli_query($con,$query))
    {
        while($row=mysqli_fetch_array($rs))
        {
            echo "<script>document.getElementById('edituser').value='".$row["username"]."';</script>";
            echo "<script>document.getElementById('editpass').value='".$row["password"]."';</script>";
            echo "<script>document.getElementById('editdate').value='".$row["dateofbirth"]."';</script>";
            echo "<script>document.getElementById('editmail').value='".$row["email"]."';</script>";
            
        }
    }
    else{
        echo mysqli_error($con);
    }

    }
    else{
        echo "<script>alert('Username already exists');</script>";
    }
}
if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])&&isset($_POST['logout']))
{
    setcookie("username",'',time()-86400);
    setcookie("password",'',time()-86400);
    header("Location:userLogin.php");
    ob_end_flush();
}
?>
    </div>
    <?php
        include("footer.php");
    ?>
</body>
</html>