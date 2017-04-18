<?php
include ('../config/auth_config.php');
include ('../config/product_config.php'); ?>

                            <?php
                            $orders=new Product();
                            $order=$orders->shOrder();

                            foreach ($order as $row):
                                $id=$row['id'];
                            ?>
                                <li class="list-group-item clearfix">
                                    <ul class="col-sm-4">
                                        <li><?php echo $row['order_name'] ?></li>
                                        <li><?php echo $row['order_email'] ?></li>
                                        <li><?php echo $row['order_phone'] ?></li>
                                        <li><?php echo date('d-m-Y / h:i A', strtotime($row['order_date'])) ?></li>

                                    </ul>

                                <table class="table table-bordered table-hover">
                                <tr class="alert-info">
                                <td>Product Name</td>
                                <td>Unit Prices</td>
                                <td>Quantity</td>
                                <td>Prices</td>
    </tr>
                                <?php
                            $items=new Product();
                            $order_items=$items->shOrdered($id);
                            $total=0;
                            foreach ($order_items as $item){
                                $total+=$item['item_qty']*$item['item_price'] ;
                                ?>
                                    <tr class="alert-warning">
                                        <td><?php echo $item['item_name'] ?></td>
                                        <td>$<?php echo $item['item_price'] ?></td>
                                        <td><?php echo $item['item_qty'] ?></td>
                                        <td>$<?php echo $item['item_qty']*$item['item_price'] ?></td>

                                    </tr>
                                </li>

                                <?php
                            }
                            ?>
                            <tr class="alert-success"><td colspan="3">Total Prices</td><td>$<?php echo $total ?></td></tr>
                            </table>
                            <?php endforeach; ?>