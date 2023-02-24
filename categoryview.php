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
    <div class="dateview">
        <div class="container-dateview">
            <h1>category view</h1>
            <center>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <label for="category">category:</label>
                <select name="Category" id="category">
                        <option value="fuel">fuel</option>
                        <option value="fruits">fruits</option> 
                        <option value="vegetables">vegetables</option>  
                    </select>
            <button type="submit" name="submit">search</button>
            </form>
            </center>
        </div>
            <table border="1">
                <thead>
                <?php
                include "database.php";
                if (isset($_POST["submit"])) {
                    $category = $_POST["Category"];
                    $sql = "select * from product where Category = '$category'";
                    $result = mysqli_query($conn, $sql);
                    if($result)
                     {
                        echo "<tr>
                    <th>id</th>
                    <th>date</th>
                    <th>item</th>
                    <th>category</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>total price</th>
                    </tr>";
                     }
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                </thead>
                <tbody>
                    <tr>
                    <td><?php echo $row['Id']?></td>
                    <td><?php echo $row['Date']?></td>
                    <td><?php echo $row['Item']?></td>
                    <td><?php echo $row['Category']?></td>
                    <td><?php echo $row['Quantity']?></td>
                    <td><?php echo $row['Price']?></td>
                    <td><?php echo $row['Total']?></td>
                    </tr>
                    <?php }
                }?>
              
                </tbody>
            </table>
        </div>
</body>
</html>