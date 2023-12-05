<?php
    ob_start();
?>
<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>BooksPentagon  -  Publish Paper</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
    
    <link rel="stylesheet" href="assets/css/Footer-with-button-logo.css">
<style type="text/css">
    .rb1{
               box-sizing:border-box;
  padding-top:15px;
    padding-bottom:10%;
  margin:5% auto;
  text-align:center;
            
    }
    .rb1 input[type="text"]{
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
.rb1 textarea{
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
.rb1 input[type="file"]{
    max-width:400px;
    width: 80%;
  line-height:3em;
  font-family: 'Ubuntu', sans-serif;
  margin:1em 2em;
  border-radius:5px;
  border:1px solid #3498db;
  outline:none;
  padding-left:10px; 
}
.rb1 input[type="number"]{
    max-width:400px;
    width: 80%;
  line-height:3em;
  font-family: 'Ubuntu', sans-serif;
  margin:1em 2em;
  border-radius:5px;
  border:1px solid #3498db;
  outline:none;
  padding-left:10px; 
}
.rb1 input[type="submit"]{
    max-width:400px;
 background: #3498db;
 color: #eee;
 font-family: Trebuchet MS;
 border:none;
    width: 80%;
  line-height:3em;
  
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

    if(isset($_COOKIE['username'])&&isset($_COOKIE['password']))
    {
        ?>
            <div class="rb1">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="paperName" placeholder="Title"><br>
                    <input type="text" name="authorName" placeholder="Author Name"><br>
                    <textarea name="paperDescription" placeholder="Breif Description" cols="30" rows="4"></textarea>
                    <!--<input type="number" name="paperPrice" placeholder="Price"><br>-->
                    <!-- <input type="text" name="paperDescription" placeholder="Breif Description"><br> -->
                    <input type="file" name="files" id="" accept="application/pdf" enctype="multipart/form-data"><br>
                    <input type="submit" value="Publish" name="Publish">


                </form>
            </div>
        <?php   
    }
    else{
        header("Location:userLogin.php");
     
    }
    if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])&&isset($_POST["Publish"]))
    {
        $userid=0;
        
        if ($_FILES['files']['size'] != 0)
        {
            if($_POST["paperName"]!=""&&$_POST["paperDescription"]!="")
            {
                include('dbdata.php');
            // cover_image is empty (and not an error)
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
                        $targetfolder = 'papers/'.$row["id"].'/published/';
                    }
                }
            
            $direc=$targetfolder;
            $targetfolder = $targetfolder.basename( $_FILES['files']['name']) ;
            echo $targetfolder;
            if(move_uploaded_file($_FILES['files']['tmp_name'], $targetfolder))
            {
            echo "The file ".basename( $_FILES['files']['name'])." is uploaded";
            rename($targetfolder,$direc.$_POST["paperName"].".pdf");
            $query1='INSERT INTO publishedpapers(userID,paperName,authorName,paperDescription) VALUES('.$userid.',"'.$_POST["paperName"].'","'.$_POST["authorName"].'","'.$_POST["paperDescription"].'")';
            if(!mysqli_query($con,$query1))
            {
                echo "Error: " . $query1 . "<br>" . mysqli_error($con);   
            }
            else{
                $query3='SELECT papersinwaiting FROM userinfo WHERE username="'.$_COOKIE["username"].'"';
                if($rs=mysqli_query($con,$query3))
                {
                    while($row=mysqli_fetch_array($rs))
                    {
                        $newpprs=$row["papersinwaiting"]+1;
                        $query4="update userinfo set papersinwaiting=".$newpprs." where username='".$_COOKIE["username"]."'";
                        if(!mysqli_query($con,$query4))
                        {
                            echo "Error: " . $query4 . "<br>" . mysqli_error($con);   
                        }
                    }
                }
                else{
                    echo "Error: " . $query3 . "<br>" . mysqli_error($con);   
                }
            }
            }
            else {
                echo "Problem uploading file";       
            }
            }
            else{
                echo "<script>alert('Please enter both paper name and paperdescription')</script>";    
            }

        }
        else{
            echo "<script>alert('Please insert papers')</script>";
        }
       
    }
    include("footer.php");
?>
</body>
</html>