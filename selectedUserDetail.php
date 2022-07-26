<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from=$_GET['id'];
    $to=$_POST['to'];
    $amount=$_POST['amount'];

    $sql="select *from customers where id=$from";
    $query=mysqli_query($conn,$sql);
    $sql1=mysqli_fetch_array($query);

    $sql="select *from customers where id=$to";
    $query=mysqli_query($conn,$sql);
    $sql2=mysqli_fetch_array($query);
    if($amount > $sql1["balance"]) {
        echo '<script type="text/javascript">';
            echo 'alert("Not enough balance.")';
            echo '</script>';
        
    }
    else if($amount<0)
    {
        echo '<script type="text/javascript">';
        echo 'alert("Oops!! Negative values cannot be transfered")';
        echo '</script>';
    }

    else if($amount==0)
    {
        echo '<script type="text/javascript">';
        echo 'alert("Oops!! Zero value cannot be transfered")';
        echo '</script>';
    }

    else if($amount>0){
        $newbalance=$sql1['balance']-$amount;
        $sql="update customers set balance=$newbalance where id=$from";
        mysqli_query($conn,$sql);

        $newbalance=$sql2['balance']+$amount;
        $sql="update customers set balance=$newbalance where id=$to";
        mysqli_query($conn,$sql);

        $sender=$sql1['name'];
        $receiver=$sql2['name'];
        $datetime=date('Y-m-d H:i:s');
        $sql="insert into transaction values ('$sender','$receiver',$amount,'$datetime',$newbalance)";
        
        $query=mysqli_query($conn,$sql);
        echo mysqli_error($conn);

        if($query)
        {
            echo '<script type="text/javascript">';
            echo 'alert("Transaction Successful");
             window.location.assign("transactionHistory.php");';
            echo '</script>';
        }
        $newbalance=0;
        $amount=0;
    }
}
?>

<!doctype html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">

    <title> transfer Money </title>

    <link rel="stylesheet" type="text/css" href="css/table.css">

    <style type="text/css">
        button{
            border:none;
        background-color:#d9d9d9;
    }
        button:hover{
            background-color:#7777E88;
            transform:scale(1.1);
            color:white;
        }
    </style>
</head>
<body style="background-color:lightgray;">


<div class="text-center pt-4" style="color:white; font-style:bold; background-color:grey; font-size:50px; text-align:center;">Transection</div>
<?php
include 'config.php';
$sid=$_GET['id'];
$sql="select *from customers where id=$sid";
$result=mysqli_query($conn,$sql);
if(!$result)
{
    echo "Error: ".$sql. "<br>". mysqli_error($conn);
}
$rows=mysqli_fetch_assoc($result);
?>
<form method="post" name="tcredit" class="tabletext">
    <br>
    <div>
        <table class="tabel-table-striped-table-condensed-table-bordered" style="text-align:center; margin-left:35%; margin-top:2%;">
        <tr style="color:black;">
        <th class="text-center">Id</th>
        <th class="text-center">Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Balance</th>
        </tr>

        <tr style="color:black;">
        <td class="py-2"><?php echo $rows['id']?></td>
        <td class="py-2"><?php echo $rows['name']?></td>
        <td class="py-2"><?php echo $rows['email']?></td>
        <td class="py-2"><?php echo $rows['balance']?></td>
</tr>
</table>
</div>
<br><br><br>
<table style="margin-left:40%; text-align:centre; height:50px;">
    <tr>
<td><label style="color:black;"><b>Transfer To:</b></label></td>
<td></td>
<td><select name="to" class="form-control" required>
    <option value="" disabled selected>Choose</option>
    <?php
    include 'config.php';
    $sid.$_GET['id'];
    $sql="select *from customers";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo "Error ".$sql. "<br>".mysqli_error($conn);
    }
    while($rows=mysqli_fetch_assoc($result))
    {
        ?>
        <option class="table" value="<?php echo $rows['id'];?>">
        <?php echo $rows['name'];?>(Balance:
        <?php echo $rows['balance'];?>)
        </option>
        <?php
    }
    ?>
    <div>
</select></td>
</tr>
<tr></tr>
<tr>
<td><label style="color:black;"><b>Amount:</b></label></td>
<td></td>
<td><input type="number" class="form-control" name="amount" required></td>
</tr>
<tr></tr>
</table>

<div class="text-center">
    <button class="py-2" name="submit" type="submit" id="mybtn" style="margin-left:50%; background-color:grey; margin-top:2%;">Transfer</burron>
</div>
</from>
</div>
<footer class="text-center-mt-5" style="background-color:grey; text-align:center; color:white; height:60px; margin-top:310px;">
    &copy 2021.Made By <b>Vrushti Shah </b>
</footer>
</body>
</html>