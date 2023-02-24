<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="view">
        <table border="1">
            <thead>
            <tr><th>id</th>
                <th>date</th>
                <th>item</th>
                <th>catagery</th>
                <th>quantity</th>
                <th>price</th>
                <th>totalprice</th>
            </tr>
            </thead>
            <tbody>
            <?php
                include "database.php";
                $sql = "SELECT * FROM product";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result)){
                ?>
                 <td><?php echo $row['Id']?></td>
                    <td><?php echo $row['Date']?></td>
                    <td><?php echo $row['Item']?></td>
                    <td><?php echo $row['Category']?></td>
                    <td><?php echo $row['Quantity']?></td>
                    <td><?php echo $row['Price']?></td>
                    <td><?php echo $row['Total']?></td>
                    </tr>
                    <?php }?>
            </tbody>
        </table>
       
        </div>
    </div>
</body>
</html>