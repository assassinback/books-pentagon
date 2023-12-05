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
            display:inline;
            width: 30%;
            float: left;
            height: 100%;
            border: 1px solid black;
        }
        .rightbar
        {
            display:inline;
            width: 69%;
            float:right;
            height: 100%;
            border: 1px solid black;
            position: absolute;
            margin-left: 405.2px;
            margin-top: 447px;
        }
        form{
            display:inline;
        }
    </style>
    <link rel="stylesheet" href="assets/css/Footer-with-button-logo.css">
<style type="text/css">
#myFooter {
    background-color: #3c3d41;
    color: white;
    padding-top: 30px;
    margin-top: 500px;
}

#myFooter .footer-copyright {
    background-color: #333333;
    padding-top: 3px;
    padding-bottom: 3px;
    text-align: center;
}

#myFooter .row {
    margin-bottom: 60px;
}

#myFooter .navbar-brand {
    margin-top: 45px;
    height: 65px;
}

#myFooter .footer-copyright p {
    margin: 10px;
    color: #ccc;
}

#myFooter ul {
    list-style-type: none;
    padding-left: 0;
    line-height: 1.7;
}

#myFooter h5 {
    font-size: 18px;
    color: white;
    font-weight: bold;
    margin-top: 30px;
}

#myFooter h2 a{
    font-size: 45px;
    text-align: center;
    margin-top: 4vw;
    margin-left: -15vw;
    width: 20vw;
    position: absolute;
    color: #fff;
}

#myFooter a {
    color: #d2d1d1;
    text-decoration: none;
}

#myFooter a:hover,
#myFooter a:focus {
    text-decoration: none;
    color: white;
}

#myFooter .social-networks {
    text-align: center;
    padding-top: 30px;
    padding-bottom: 16px;
}

#myFooter .social-networks a {
    font-size: 32px;
    color: #f9f9f9;
    padding: 10px;
    transition: 0.2s;
}

#myFooter .social-networks a:hover {
    text-decoration: none;
}

#myFooter .facebook:hover {
    color: #0077e2;
}

#myFooter .google:hover {
    color: #ef1a1a;
}

#myFooter .twitter:hover {
    color: #00aced;
}

#myFooter .btn {
    color: white;
    background-color: #d84b6b;
    border-radius: 20px;
    border: none;
    width: 150px;
    display: block;
    margin: 0 auto;
    margin-top: 10px;
    line-height: 25px;
}

@media screen and (max-width: 767px) {
    #myFooter {
        text-align: center;
    }
}


/* CSS used for positioning the footers at the bottom of the page. */
/* You can remove this. */

html{
    height: 100%;
}

body{
    display: flex;
    display: -webkit-flex;
    flex-direction: column;
    -webkit-flex-direction: column;
    height: 100%;
}

.content{
   flex: 1 0 auto;
   -webkit-flex: 1 0 auto;
   min-height: 200px;
}

#myFooter{
   flex: 0 0 auto;
   -webkit-flex: 0 0 auto;
}
  .container{
    text-align: center;
   margin-top: -25px;

  }
#k{
  margin-top: -74px;
}
</style>
        </head>
        <body>
        <header><nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
  <a class="navbar-brand" href="#">BP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><img src="tag.jpg" style="position: absolute;margin-top: -1.5vw;"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><img src="logo_transparent.png" style="width: 350px;margin-top: -42px;"></h1>
    <p class="lead" style="margin-top: -120px;">Articles And Publications</p>
   <br><br>

  </div>
</div>
<ul class="nav justify-content-center bg-light" id="k">
  <li class="nav-item">
    <a class="nav-link active" href="#">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Search For Books</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Upload Books</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Contact Us</a>
  </li>
  
    <a class="nav-link" href="#"><i class="material-icons">
<img src="kui.png" style="width: 1.6vw; margin-top: -0.4vw;">
</i></a>
  </li>

  
</ul>
</header>    
    <div class="sidebar">
        <form action="publishPaperUser.php" method="post">
            <input type="submit" value="Publish Paper">
        </form><br><br><br>
        <form action="confirmWaiting.php" method="post">
            <input type="submit" value="Confirm A paper in waiting(By Admin)">
        </form><br><br><br>
        <form action="browsePapers.php" method="post">
            <input type="submit" value="Browse Papers">
        </form><br><br><br>
        <form action="salesReport.php" method="post">
            <input type="submit" value="Sales Report and royalty" name="viewPublished">
        </form><br><br><br>
        <form action="logout" method="post">
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
                        <label>Username:</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" readonly name="user" value="'.$row["username"].'" id="edituser">&nbsp;&nbsp;&nbsp;
                        <input type="button" value="Edit" id="usernameEdit"><br><br>
                        <label>Password:</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" readonly name="pw" value="'.$row["password"].'" id="editpass">&nbsp;&nbsp;&nbsp;
                        <input type="button" value="Edit" id="passwordEdit"><br><br>
                        <label>date of birth:</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" readonly name="dob" value="'.$row["dateofbirth"].'" id="editdate">&nbsp;&nbsp;&nbsp;
                        <input type="button" value="Edit" id="dateEdit"><br><br>
                        <label>Email:</label>&nbsp;&nbsp;&nbsp;
                        <input type="email" readonly name="email" value="'.$row["email"].'" id="editmail">&nbsp;&nbsp;&nbsp;
                        <input type="button" value="Edit" id="emailEdit"><br><br>
                        <label>Papers Published:'.$row["paperspublished"].'</label>&nbsp;&nbsp;&nbsp;<br><br>
                        <label>Papers Waiting:&nbsp;&nbsp;&nbsp;'.$row["papersinwaiting"].'</label>&nbsp;&nbsp;&nbsp;<br><br>
                        <input type="submit" name="update" value="Save">
                        </form>
                        ';       
                    }
                }
                else{
                    die("invalid credientials");
                }
                if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])&&isset($_POST['logout']))
                {
                    setcookie("username",'',time()-86400);
                    setcookie("password",'',time()-86400);
                    header("Location:userLogin.php");
                }
            ?>
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
?>
    </div>
    <footer>
  <footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2 class="logo"><a href="#"> Books Pentagon </a></h2>
                </div>
                <div class="col-sm-2">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <div class="social-networks">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <button type="button" class="btn btn-default">Contact us</button>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2016 Copyright Text </p>
        </div>
    </footer>


</footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>