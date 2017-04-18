<?php
session_start();
if(!isset($_SESSION['cart'])){
    header("location: /");
    exit();
}
include ('../header.php') ?>

<div class="container" id="myInside">

    <?php include ('../navBar.php') ?>
    <?php include ('../config/product_config.php'); ?>



    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Cart Details</div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="alert-success">
                            <td>Product Name</td>
                            <td>Unit Prices</td>
                            <td>Quantity</td>
                            <td>Prices</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $cart=$_SESSION['cart'];
                        $totalPrices=0;
                        foreach ($cart as $key=>$val){
                            $dCart=new Product();
                            $ddCart=$dCart->getProductForCart($key);
                            foreach ($ddCart as $row){
                                $totalPrices += $val * $row['p_price'];
                                ?>
                                <tr class="alert-warning">
                                    <td><?php echo $row['p_name'] ?></td>
                                    <td>$<?php echo $row['p_price'] ?></td>
                                    <td><?php echo $val ?>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-default btn-sm dropdown-toggle"  data-toggle="dropdown"><span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Reduce One Qty</a></li>
                                                <li><a href="#">Reduce All Qty</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>$<?php echo $val * $row['p_price'] ?></td>
                                </tr>

                                <?php
                            }
                        }
                        ?>
                        <tr class="alert-info">
                            <td colspan="3">Total Prices</td>
                            <td>$<?php echo $totalPrices ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="/" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-backward"></span> Continued Shopping</a>
                    <a href="/clearCart" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> Clear Cart</a>


                </div>
            </div>

        </div>

    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Order Form</div>
            <div class="panel-body">
                <div id="orderInfo"></div>

                <form role="form">
                    <div class="form-group">
                        <label for="order_name" class="control-label">Name</label>
                        <input type="text" name="order_name" id="order_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="order_email" class="control-label">Email</label>
                        <input type="email" name="order_email" id="order_email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="order_phone" class="control-label">Phone Number</label>
                        <input type="tel" name="order_phone" id="order_phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="button" id="btnOrder" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>

<?php include ('../footer.php') ?>
