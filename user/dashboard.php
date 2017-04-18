<?php
include ('../config/auth_config.php');
include ('../header.php') ?>

<div class="container">

    <?php include ('../navBar.php') ?>


    <div class="row">
        <div class="col-sm-12" id="myInside">
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-dashboard"></span> Dashboard <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus-sign"></span> New</a></div>
                <div class="panel-body">
                    <div class="col-sm-8">
                        <div class="panel panel-danger">
                        <div class="panel-heading">Products Lists</div>
                        <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <form method="post" action="/deleteProduct">
                                <thead>
                                <tr class="alert-success">
                                    <td>Images</td>
                                    <td>Product Name</td>
                                    <td>Product Description</td>
                                    <td>Product Prices</td>
                                    <td>Edit</td>
                                    <td><button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> Delete</button></td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php include ('../config/product_config.php');
                                    $pds=new Product();
                                    $pd=$pds->showPublicProduct();
                                    foreach ($pd as $row):
                                ?>
                                    <tr class="alert-warning">
                                        <td><img src="config/pCover/<?php echo $row['p_cover'] ?>" class="img-rounded" width="100px"></td>
                                        <td><?php echo $row['p_name'] ?></td>
                                        <td><?php echo $row['p_detail'] ?></td>
                                        <td>$<?php echo $row['p_price']?></td>
                                        <td><a href="?p_id=<?php echo $row['id'] ?>" class="alert-link"><span class="glyphicon glyphicon-edit"></span> </a></td>
                                        <td><input type="checkbox" class="checkbox" name="delProduct[]" value="<?php echo $row['id'] ?>"></td>
                                    </tr>

                                <?php endforeach; ?>
                                </tbody>
                                </form>
                            </table>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-danger">
                            <?php  $p_id=$_GET['p_id'];
                            $pds=new Product();
                            $pd=$pds->getProductById($p_id);
                            ?>
                            <div class="panel-heading">Update information of <?php echo $pd['p_name'] ?></div>
                            <div class="panel-body">

                                <form role="form" method="post" action="/updateProduct" enctype="multipart/form-data">
                                    <?php if($p_id): ?>
                                    <input type="hidden" name="p_id" value="<?php echo $pd['id'] ?>">
                                    <div class="form-group">
                                        <label for="p_cover" class="control-label">Select Product Photo</label>
                                        <input type="file" name="p_cover" id="p_cover">
                                    </div>
                                    <div class="form-group">
                                        <label for="p_price" class="control-label">Prices</label>
                                        <input type="number" class="form-control" name="p_price" value="<?php echo $pd['p_price'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    <?php endif; ?>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Product</h4>
                </div>

                <div class="modal-body">
                    <div id="productInfo"></div>
                    <div class="form-group">
                        <label for="cat_id" class="control-label">Categories</label>
                        <select name="cat_id" id="cat_id" class="form-control">
                        <option value="0">--Choose Category--</option>
                        <?php include ('config/product_config.php');
                        $cats=new Product();
                        $cat=$cats->showCat();
                        foreach ($cat as $row) {
                            ?>

                                <option value="<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>

                            <?php
                        }

                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="p_name" class="control-label">Product Name</label>
                        <input type="text" name="p_name" id="p_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="p_detail" class="control-label">Product Description</label>
                        <textarea name="p_detail" id="p_detail" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="p_price" class="control-label">Prices</label>
                        <input type="number" name="p_price" id="p_price" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"  id="btnSaveProduct">Save changes</button>
                    </div>

            </div>
        </div>
    </div>
</div>
<?php include ('../footer.php') ?>
