<table width="200">
    <tr>
        <td class="menu_item"> 
            <!--tambahkan fungsi untuk mengecek session-->
            <?php
            if (isset($_SESSION['logged'])) {
                echo ($_SESSION['logged'] . "[<a href='login.php?logout=1'>logout</a>]");
            } else {
                echo ("<a href='login.php'> Login here </a>");
                ?>
            </td>
        </tr>
        <tr>
            <td><a href='register.php'> Register </a></td>

        </tr>
        <?php
    }
    ?>

    <tr>
        <td class="menu_item"> <a href="index.php">home</a></td>
    </tr>
    <tr>
        <td class="menu_item"> <a href="SellerSignup.php">Seller Signup</a></td>
    </tr>
    <tr>
        <td class="menu_item"> <a href="browseall.php">browse all items</a></td>
    </tr>
    <tr>
        <td class="menu_item"> <a href="browsebycategory.php">browse by category</a></td>
    </tr>
    <tr>
        <td class="menu_item"> <a href="cart.php">shopping cart</a></td>
    </tr>
</table>