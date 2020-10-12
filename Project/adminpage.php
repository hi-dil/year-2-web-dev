<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
    <style>
        #inventory td {
            padding: 0 30px;
            padding-bottom: 5px;
            border-bottom: rgb(219, 219, 219) 1px solid;
            padding-top: 5px;
        }

        .listproduct {
            margin: 40px auto !important ;
        }

        .addproduct{
            margin: 40px auto !important;
        }

        .deleteproduct{
            margin: 40px auto !important;
        }

        .userinfo{
            margin: 40px auto !important;
        }

        fieldset.add {
            height: 20%;
            margin-left: 15%;
            background:
                rgba(168, 168, 168, 0.575);
            width: 70%;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="logo-nav">
                <div class="logo-nav-left">
                    <h1><a href="index.php">ReJecT<span>MERCH STORE</span></a></h1>
                </div>

                <div class="logo-nav-left1">
                    <nav>
                        <ul>
                            <li>
                                <?php
                                if(!empty($_SESSION["shopping_cart"])) {
                                $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                                ?>
                                <div class="cart_div">
                                    <a href="cart.php"><img src="images/cart-icon.png" />
                                        Cart<span><?php echo $cart_count; ?></span></a>
                                </div>
                                <?php } ?>
                            </li>
                            <li class="resize"><a href="login.html">Sign in</a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropbtn">Collection</a>
                                <div class="dropdown-content">
                                    <a href="catalogue-unimas.php">Unimas</a>
                                    <a href="catalogue-cempaka.php">Cempaka</a>
                                </div>
                            <li class="resize"><a href="index.php">Home</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="homepage.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>
                </li>
                <li class="active">Cempaka</li>
            </ol>
        </div>
    </div>

    <div class="listproduct">
        <h2>All product</h2>
        <?php
            $conn = mysqli_connect("localhost", "root", "","project");
            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql);
        echo "<table id='inventory'>";
            echo "<tr>";
                echo "<td class='a1'><b>Product ID</b></td>";
                echo "<td class='a1'><b>Product Image</b></td>";
                echo "<td class='a1'><b>Product Name</b><//btd>";
                echo "<td class='a1'><b>Product Price</b></td>";
                echo "<td class='a1'><b>Product Description</b></td>";
            echo "</tr>";
            if(mysqli_num_rows($result)){
                
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td class='a1'>".$row['product_id']."</td>";
                    echo "<td class='a1'>"."<img src='".$row['image']."' height='100' width='100'>"."</td>";
                    echo "<td class='a1'>".$row['name']."</td>";
                    echo "<td class='a1'>".$row['price']."</td>";
                    echo "<td class='a1'>".$row['description']."</td>";
                    echo "</tr>";
                    
                }
                
            }else{
                echo "No Data";
            }
            echo "</table>";

            ?>
    </div>
    <hr>
    <div class="addproduct">
        <h2>Add product</h2>
        <form action="adminpage.php" method="post" enctype="multipart/form-data">
            <fieldset class="add">
                <table cellspacing="8">
                    <input type="file" name="product_image">
                    <tr>
                        <td>Product Name:</td>
                        <td><input style="width: 210%" type="text" name="product_name"></td>
                    </tr>
                    <tr>
                        <td><label for="product_price">Price</label></td>
                        <td><input style="width: 210%" type="text" name="product_price"></td>
                    </tr>
                    <td colspan="3"><textarea style="width: 210%" name="product_description" cols="40" rows="4"
                            placeholder="Item Description..."></textarea></td>
                    </tr>
                </table>
                <input type="submit" name="submit" value="Upload">
        </form>
        </fieldset>
    </div>
    <hr>

    <div class="deleteproduct">
        <h2>Delete Product</h2>
        <fieldset class="add">
            <form action="" method="post">
                <table cellspacing="8">
                    <tr>
                        <td>Product ID:</td>
                        <td><input type="text" name="product_id"
                                value="<?php if(isset($product_id))  {echo $product_id;} ?>"></td>
                    </tr>
                </table>
                <input type="submit" name="delete" value="Delete">
        </fieldset>

        </form>
    </div>
    <hr>

    <div class="userinfo">
        <h2>User Info</h2>
        <?php
        $conn = mysqli_connect("localhost", "root", "","project_wb");
        $sql = "SELECT * FROM cart";
        $result = mysqli_query($conn, $sql);
       echo "<table id='inventory'>";
        echo "<tr>";
            echo "<td class='a1'><b>Cart ID</b></td>";
            echo "<td class='a1'><b>Product ID</b></td>";
            echo "<td class='a1'><b>Customer Email</b><//btd>";
            echo "<td class='a1'><b>Product Quantity</b></td>";
        echo "</tr>";
        if(mysqli_num_rows($result)){
            
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td class='a1'>".$row['cart_id']."</td>";
                echo "<td class='a1'>".$row['product_id']."</td>";
                echo "<td class='a1'>".$row['user_email']."</td>";
                echo "<td class='a1'>".$row['product_quantity']."</td>";
                echo "</tr>";
                
            }
            
        }else{
            echo "No Data";
        }
        echo "</table>";

?>

    </div>

    <div class="footer">
        <p>Cempaka Merch Store Inc. Establish since 2019.</p>
    </div>
</body>

</html>