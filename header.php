<?php
  ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="logo_transparent.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
    
    <link rel="stylesheet" href="assets/css/Footer-with-button-logo.css">
<style type="text/css">
.lead{
   box-sizing:border-box;
  padding-top:15px;
  padding-bottom:10%;
  margin:auto;
  text-align:center;
}
@media only screen and (min-width : 150px) and (max-width : 530px){
  .lead{
    font-size: 2vh;
    margin-left: 4vw;
  }
}
@media only screen and (min-width : 120px) and (max-width : 530px){
  .lead{
    font-size: 2vh;
    margin-left: 2vw;
  }
}
#myFooter {

  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  margin-bottom: 0;
  background-color: #efefef;
  text-align: center;
    background-color: #3c3d41;
    color: white;
    padding-top: 80px;
    
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
@media screen and (min-width: 150px){
.hide{
  opacity: 0;
}
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
background: #83a4d4;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #b6fbff, #83a4d4);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #b6fbff, #83a4d4); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


    display: flex;
    display: -webkit-flex;
    flex-direction: column;
    -webkit-flex-direction: column;
    height: 100%;
    margin:0px
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
   margin-top: -75px;

  }
#k{
  margin-top: -74px;
}
div#top{ background:url(topSliver.png) repeat-x; height:73px; font-size:36px; padding:20px 0px 0px 20px;  }
div#middle{ min-width:800px; }
div#middle > div{ float:left; width:25%; }
div#middle > div > div{ border:#000 1px solid; padding: 20px; }
div#middle > div > div > img{ width:100%; }
div#bottom{ clear:left; background:#666; height:200px; }
</style>
</head>

	<header><nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
  <a class="navbar-brand" href="homepage.php">BP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><img src="tag.jpg" style="position: absolute;margin-top: -1.5vw;" class="hide"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      
     
    </ul>
    <form class="form-inline my-2 my-lg-0" action="searchPapers.php" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
    </form>
  </div>
</nav>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><img src="logo_transparent.png" style="width: 350px;margin-top: -42px;"></h1>
    <p class="lead" style="margin-top: -120px;">The Home Of Books</p>
  </div>
</div>
<ul class="nav justify-content-center bg-light" id="k">
  <li class="nav-item">
    <a class="nav-link active" href="homepage.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="searchPapers.php">Search For Books</a>
  </li>
  <?php
  if(isset($_COOKIE["username"])&&isset($_COOKIE["username"]))
  {
  echo '
  <li class="nav-item">
    <a class="nav-link" href="publishPaperUser.php">Upload Books</a>
  </li>';
  }
  ?>
  <li class="nav-item">
    <a class="nav-link" href="contactus.php">Contact Us</a>
  </li>
  <?php
   if(isset($_COOKIE["username"])&&isset($_COOKIE["password"])&&isset($_COOKIE["admin"]))
   {
       echo '
   <li class="nav-item">
     <a class="nav-link" href="adminDashboard.php">Dashboard</a>
   </li>
     
   </li>';
   echo '
   <li class="nav-item">
     <a class="nav-link" href="homepage.php" id="logout" onclick="logout()">Logout</a>
   </li>
     
   </li>';
   }
   else if(isset($_COOKIE["username"])&&isset($_COOKIE["password"]))
  {
    echo '
  <li class="nav-item">
    <a class="nav-link" href="userPanel.php">Dashboard</a>
  </li>
    
  </li>';
  echo '
  <li class="nav-item">
    <a class="nav-link" href="homepage.php" id="logout" onclick="logout()">Logout</a>
  </li>
    
  </li>';
  }
  
  else{
  echo '
  <li class="nav-item">
    <a class="nav-link" href="userLogin.php">Login/Register</a>
  </li>
    
  </li>';
  }
    ?>
  

  
</ul>
<br><br>
<script>
    function logout()
    {
        document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "password=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "admin=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        
    }
    
</script>
</header>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
