
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expenses";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST["submit"]))
{
    
    $item = $_POST["Item"];
    $category = $_POST["Category"];
    $quantity = $_POST["Quantity"];
    $price = $_POST["Price"];
    $total = $_POST["Totalprice"];
    if( $item!=""&& $category!=""&& $quantity!=""&& $price!=""&& $total!="")
    {
    $sql = "INSERT INTO `product`(`Date`, `Item`, `Category`, `Quantity`, `Price`, `Total`) VALUES (NOW(),'$item','$category','$quantity','$price','$total')";
    if($conn->query($sql))
    {
        $error= "successfully inserted";
    }
    else{
        $error="insert data fail";
    }
    }
    else{
        $error="all the fields are required";
    }
}
else{
    $error="please fill all the fields";
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
  
</head>
<body onload="totalprice();">
    
<div class="container-update">
        <div class="form-group">
        <h2>enter expenses detail</h2>
           <form method="post" action="update.php">
            
                <label for="product">product</label>
                <input type="text" placeholder="enter your product" id="product" name="Item">
                <label for="category">category</label>
                    <select name="Category" id="category">
                        <option value="fuel">fuel</option>
                        <option value="fruits">fruits</option> 
                        <option value="vegetables">vegetables</option>  
                    </select>
                    <label for="quantity">quantity</label>
                    <input type="number" placeholder="quantity"  id="quantity" name="Quantity"  onchange="totalprice();">
                    <label for="price">price</label>
                    <input type="number" placeholder="price"  id="price" name="Price"  onchange="totalprice();">
                    <label for="price">totalamount</label>
                    <input type="text" placeholder="total"  id="total" name="Totalprice" >
                    <div class="form-btn">
                    <button type="submit" name="submit">add</button>
                    <button type="button" onclick="location.href='index.php'">back</button>
                     </div>
                <div class="error">
                   <?php echo $error ?> 
                </div>
        </form>   
    </div>

     <script>
    function totalprice()
        {
            var quantity=document.getElementById("quantity").value;
            var price=document.getElementById("price").value;
            var total=parseFloat(quantity)*parseFloat(price);
            document.getElementById("total").value=total;

        }
        </script>
 </div>
</body>
</html>