<?php
include ('../config/auth_config.php');
include ('../header.php') ?>

<div class="container">

    <?php include ('../navBar.php') ?>


    <div class="row">
        <div class="col-sm-12" id="myInside">
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span> Product Categories <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus-sign"></span> New</a></div>
                <div class="panel-body">

                    <table class="table table-bordered table-hover">
                        <form method="post" action="/deleteCat">
                        <thead>
                        <tr class="alert-success">
                            <td><span class="glyphicon glyphicon-circle-arrow-right"></span> Category ID</td>
                            <td><span class="glyphicon glyphicon-circle-arrow-right"></span> Category Name</td>
                            <td><button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> Delete</button></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php include ('../config/product_config.php');
                            $pds=new Product();
                            $pd=$pds->showPublicCat();
                            foreach ($pd as $row):

                            ?>
                        <tr class="alert-warning">
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['cat_name'] ?></td>
                            <td><input type="checkbox" name="delCat[]" value="<?php echo $row['id'] ?>" class="checkbox"></td>
                        </tr>
                        <?php  endforeach;  ?>
                        </tbody>
                        </form>
                    </table>
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
                    <h4 class="modal-title" id="myModalLabel">Add New Category</h4>
                </div>

                <div class="modal-body">
                    <div id="productInfo"></div>
                    <div class="form-group">
                        <label for="cat_name" class="control-label">Category Name</label>
                        <input type="text" name="cat_name" id="cat_name" class="form-control">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"  id="btnSaveCat">Save changes</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include ('../footer.php') ?>
