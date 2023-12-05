<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BooksPentagon  -  Waiting Papers Admin</title>
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
// $directory = '/papers/'.$_COOKIE["userid"].'/waiting/';
// $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
// while($it->valid()) {
//     if (!$it->isDot()) {
//         echo 'SubPathName: ' . $it->getSubPathName() . "\n";
//         echo 'SubPath:     ' . $it->getSubPath() . "\n";
//         echo 'Key:         ' . $it->key() . "\n\n";
//     }
//     $it->next();
// }
$j=0;
$hypers=array();
$btn=array();
if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])&&isset($_POST["publish"]))
{
    setcookie('paperName',$_POST["paperName"]);
    setcookie('paperDescription',$_POST["paperDescription"]);
    setcookie('directory',$_POST["directory"]);
    header("Location:PublishPaper.php");
    ob_end_flush();
}
if(isset($_COOKIE['username'])&&isset($_COOKIE['password']))
{
    $k=0;
    if ($handle = opendir('./papers/'.$_COOKIE["userid"].'/waiting/')) {
        echo "<table border=1>";
        echo "<th>paperName</th>";
        echo "<th>paperDescription</th>";
        echo "<th>adminApproval</th>";
        echo "<th>confirmPaper</th>";
        echo "<th>deletePaper</th>";
        while (false !== ($entry = readdir($handle))) {

            if ($entry != "." && $entry != "..") 
            {
                $hypers[$j]= '<a target="_blank" href=./papers/'.$_COOKIE["userid"].'/waiting/'.$entry.'>'.$entry.'</a><br>';
                //$btn[$j]= '';
                $j++;
            }    
        }
        include('dbdata.php');
        $con=mysqli_connect($serverid,$username,$pass,$DBname);
        if(mysqli_connect_error($con)){
            die("try refreshing");
        }
        $query='Select * from waitingpapers where userID='.$_COOKIE["userid"];
        if($rs=mysqli_query($con,$query))
        {
            while($row=mysqli_fetch_array($rs))
            {
                echo '
                    <tr>
                    <td>'.$row["paperName"].'</td>
                    <td>'.$row["paperDescription"].'</td>
                    <td>'.$row["paperName"].'</td>
                    <td>'.$hypers[$k].'</td>
                    <td><form method="POST" id="pub"><input type="submit" value="publish this paper" name="publish">
                    <input type="hidden" value="./papers/'.$_COOKIE["userid"].'/waiting/'.$entry.'" name="directory">
                    <input type="hidden" value="'.$row["paperName"].'" name="paperName">
                    <input type="hidden" value="'.$row["paperDescription"].'" name="paperDescription">
                    </form></td>
                    </tr>
                ';
                $k++;
            }
        }
        else{
            echo mysqli_error($con);
        }
        echo "</table>";
        
        closedir($handle);
    }
    
}
?>
<script>
    
</script>

<?php
// if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])&&isset($_POST['publish']))
// {
//     setcookie('directory',$_POST["directory"]);
//     header("Location:PublishPaper.php");
// }
include('footer.php');
?>
</body>
</html>