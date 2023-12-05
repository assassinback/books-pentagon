<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://js.paystack.co/v1/paystack.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BooksPentagon  -  ConfirmPurchase</title>
</head>
<body>
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
        echo '<input type="text" readonly name="paperName" value="'.$_COOKIE["paperName"].'">';   
        echo '<input type="text" readonly name="paperDescription" value="'.$_COOKIE["paperDescription"].'">';
        echo '<input type="text" readonly name="paperPrice" value="'.$_COOKIE["paperPrice"].'">';
        echo '<input type="hidden" readonly name="sellerID" value="'.$_COOKIE["sellerID"].'">';
        

    }
?>
    <form action="/save-order-and-pay" method="POST">
        <input type="hidden" name="email_prepared_for_paystack" value="<?php echo $email; ?>"> 
        <input type="hidden" name="amount" value="<?php echo $amount_in_kobo; ?>"> 
        <input type="hidden" name="cartid" value="<?php echo $cartid; ?>"> 
        <button type="submit" name="pay_now" id="pay-now" title="Pay now">Pay now</button>
    </form>
</form>
    <script>
        // Initialize paystack object
        
    </script>
    <?php

// validate and save the order posted

// craft a reference for the payment, here we are using the ID from saving it earlier
$reference = $savedOrder->id;

// Get this from https://github.com/yabacon/paystack-class
include("paystack-class-master/Paystack.php"); 
// if using https://github.com/yabacon/paystack-php
// require 'paystack/autoload.php';

$paystack = new Paystack('sk_test_xxx');
// the code below throws an exception if there was a problem completing the request, 
// else returns an object created from the json response
$trx = $paystack->transaction->initialize(
  [
    'amount'=>$_POST['amount'], /* 20 naira */
    'email'=>$_POST['email_prepared_for_paystack'],
    // 'callback_url'=>'http://your-site.tld/folder/anotherfolder/verify.php',
    'metadata'=>json_encode([
      'cart_id'=>$_POST['cartid'],
      'reference'=>$reference,
      'custom_fields'=> [
        [
          'display_name'=> "Paid on",
          'variable_name'=> "paid_on",
          'value'=> 'Website'
        ],
        [
          'display_name'=> "Paid via",
          'variable_name'=> "paid_via",
          'value'=> 'Standard'
        ]
      ]
    ])
  ]
);
// status should be true if there was a successful call
if(!$trx->status){
  exit($trx->message);
}
// full sample initialize response is here: https://developers.paystack.co/docs/initialize-a-transaction
// Get the user to click link to start payment or simply redirect to the url generated
header('Location: ' . $trx->data->authorization_url);
?>
</body>
</html>