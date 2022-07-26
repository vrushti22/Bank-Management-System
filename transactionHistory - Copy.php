<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit-no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Transaction History</title>
</head>
<body style="background-color:lightgray;">


<div style="color:black; background-color:grey; color:white; font-size:50px; width:100%; text-align:center; font-family:algerian; ">Transaction History</div>
<br>
<div class="table-responsive-sm">
    <table class="table table-hover table-striped table-condensed table-bordered" style="width:70%; margin-left:15%;">
        <thread style="color:black;">
        <tr>
            <th class="text-center">Sender</th>
            <th class="text-center">receiver</th>
            <th class="text-center">Amount</th>
            <th class="text-center">Date & Time</th>
            <th class="text-center">New Balance</th>
        </tr>
        </thread>
        <tbody>
            <?php
            include 'config.php';
            $sql="select *from transaction";
            $query=mysqli_query($conn,$sql);

            while($rows=mysqli_fetch_assoc($query))
            {
            ?>
            <tr style="color:black;">
            <td class="py-2"> <?php echo $rows['sender']; ?> </td>
            <td class="py-2"> <?php echo $rows['receiver']; ?> </td>
            <td class="py-2"> <?php echo $rows['amount']; ?> </td>
            <td class="py-2"> <?php echo $rows['datetime']; ?> </td>
            <td class="py-2"> <?php echo $rows['new_balance']; ?> </td>
            </tr>
            <?php
            }
            ?>
            </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                    </div>
                    
</body>
</html>