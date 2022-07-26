<!doctype html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">

    <title> transfer Money </title>

    <link rel="stylesheet" type="text/css" href="css/table.css">

    <style type="text/css">
        button{
            transition:1.5%;}
        button:hover{
            background-color:#616C6F;
            color:white;
        }
    </style>
</head>
<body>
<?php
    include 'config.php';
    $sql="select*from customers";
    $result=mysqli_query($conn,$sql);
?>


    <div class="text-center-pt-4">Transfer Money</div> 
    <div class="row">
        <div class="col">
            <div class="table-responsive-sm">
                <table class="table-table-hover-table-sm-table-striped-table-condensed-table-bordered">
                    <thread style="color:black;">
                    <tr>
                    <th scope="col" class="text-center-py-2">Id</th>
                        <th scope="col" class="text-center-py-2">Name</th>
                        <th scope="col" class="text-center-py-2">Email</th>
                        <th scope="col" class="text-center-py-2">Balance</th>
                        <th scope="col" class="text-center-py-2">Operation</th>
                    </tr>
                    </thread>

                    <tbody>
                        <?php
                        while($rows=mysqli_fetch_assoc($result))
                        {
                        ?>
                        
                        <tr style="color:black;">
                        <td class="py-2"> <?php echo $rows['id'] ?> </td>
                        <td class="py-2"> <?php echo $rows['name'] ?> </td>
                        <td class="py-2"> <?php echo $rows['email'] ?> </td>
                        <td class="py-2"> <?php echo $rows['balance'] ?> </td>
                        <td class="py-2"><a href="selecteduserdetail.php?id=<?php echo $rows['id'];?>"><button>Transfer</button></td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                    
                    <footer class="text-center-mt-5" style="background-color:grey; text-align:center; color:white; height:80px;">
                         &copy 2022.Made By <b>Vrushti Shah </b>
                    </footer>
                    
</body>
</html>