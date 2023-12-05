<?php
    ob_start();
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
  <title>BooksPentagon  -  DeleteBook</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
    <link rel="stylesheet" href="assets/css/Footer-with-button-logo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
<style>
  body,html{
    margin:0;
    padding: 0;
  }

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
    $userID=0;
        include('dbdata.php');
        $con=mysqli_connect($serverid,$username,$pass,$DBname);
        if(mysqli_connect_error($con)){
            die("try refreshing");
        }
        $query="SELECT id from userinfo where username='".$_COOKIE['username']."'";
        if($rs=mysqli_query($con,$query))
        {
            while($row=mysqli_fetch_array($rs))
            {
                $userID=$row["id"];
            }
        }
        echo $userID;
        $query1="SELECT * from publishedpapers where userID=".$userID;
        if($rs=mysqli_query($con,$query1))
        {
            echo $userID;
            echo '<table border="1">
            <th>Author</th>
            <th>Title</th>
            <th>Breif Description</th>
            <th>Delete</th></table>';
            while($row=mysqli_fetch_array($rs))
            {
                echo '<tr>';
                echo '<td>'.$row["authorName"].'</td>';
                echo '<td><a href="http://bookspentagon.com/papers/'.$row["userID"].'/published/'.$row["paperName"].'.pdf">'.$row["paperName"].'</a></td>';
                echo '<td>'.$row["paperDescription"].'</td>';
                echo '<td><form method="post">
                <input type="submit" value="Delete" name="delete">
                <input type="hidden" name="userID" value="'.$userID.'">
                </form></td>';
                echo '</tr>';
                
            }
           
        }
        if(isset($_POST["delete"]))
        {
            $paperspublished=0;
            $query3="DELETE from publishedpapers where userID=".$userID;
            mysqli_query($con,$query3);
            $query4="SELECT paperspublished from userinfo where id=".$userID;
            if($rs=mysqli_query($con,$query4))
            {
                while($row=mysqli_fetch_array($rs))
                {
                    $paperspublished=$row["paperspublished"];

                }
            }   
            $paperspublished=$paperspublished-1;
            $query5="UPDATE userinfo set paperspublished=".$paperspublished." where id=".$userID;
            mysqli_query($con,$query5);


        }
       include("footer.php");
    ?>


</body>
</html>


