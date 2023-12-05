<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <title>BooksPentagon  -  PaystackPayment</title>
    <style type="text/css">
    .f{
        box-sizing:border-box;
        text-align:center; 
        margin-bottom: 2%;     
    }
   .f button{
         max-width:400px;
 background: #3498db;
 color: #eee;
 
 border:none;
    width: 70%;
  line-height:3em;
  font-family: 'Ubuntu', sans-serif;
  margin:1em 2em;
  border-radius:5px;
  
  outline:none;
  padding-left:10px;
  align-items: center;
    }
    .cl{
    box-sizing:border-box;
    text-align:center;
    }
input[type="text"] {
 max-width:400px;
    width: 70%;
  line-height:3em;
  font-family: 'Ubuntu', sans-serif;
  margin:1em 2em;
  border-radius:5px;
  border:2px solid #f2f2f2;
  outline:none;
  padding-left:10px;
  
  text-align:center;
}
    </style>
</head>
<body>
    <?php
        include("header.php");
        $email="";
        $phone="";
        $id=0;
        include('dbdata.php');
        $con=mysqli_connect($serverid,$username,$pass,$DBname);
        if(mysqli_connect_error($con)){
            die("try refreshing");
        }
        
        $query='SELECT id,email,phone from userinfo where username="'.$_COOKIE["username"].'"';
        if($rs=mysqli_query($con,$query))
        {
            while($row=mysqli_fetch_array($rs))
            {
                $email=$row["email"];
                $phone=$row["phone"];
                $id=$row["id"];
                setcookie("id",$id);
            }
        }
        //echo "<script>alert($id+ '$email');</script>";

        echo '<div class="cl"><input type="text" readonly name="paperName" value="'.$_COOKIE["paperName"].'"></div>';   
        echo '<div class="cl"><input type="text" readonly name="paperDescription" value="'.$_COOKIE["paperDescription"].'"></div>';
        echo '<div class="cl"><input type="text" readonly name="paperPrice" value="'.$_COOKIE["paperPrice"].'"></div>';
        echo '<div class="cl"><input type="hidden" readonly name="sellerID" value="'.$_COOKIE["sellerID"].'"></div>';
        
    ?>  
    <div class="f"> 
    <button onclick="payWithPaystack()" name="pay" type="submit">Pay</button></div>
    <script>
        function payWithPaystack() {

var handler = PaystackPop.setup({ 
    key: 'pk_live_5c9fcd7563b89e87b257071169fa5b2ab73f88ab', //put your public key here
    email: '<?php echo $email;?>', //put your customer's email here
    amount: <?php  echo $_COOKIE["paperPrice"]."00"?>, //amount the customer is supposed to pay
    metadata: {
        custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "<?php echo $phone;?>" //customer's mobile number +2348012345678
            }
        ]
    },
    callback: function (response) {
        //after the transaction have been completed
        //make post call  to the server with to verify payment 
        //using transaction reference as post data
        $.post("Verify.php", {reference:response.reference}, function(status){
            if(status == "success")
                //successful transaction
                alert('Transaction was successful');
            else
                //transaction failed
                alert(response);
        });
    },
    onClose: function () {
        //when the user close the payment modal
        alert('Transaction cancelled');
    }
});
handler.openIframe(); //open the paystack's payment modal
}
    </script>
    <?php
        include("footer.php");
    ?>
</body>
</html>