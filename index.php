<?php include ('header.php') ?>

<div class="container" id="myInside">

<?php include ('navBar.php') ?>
    <?php include ('config/product_config.php'); ?>

    <nav class="navbar navbar-default navbar-primary">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-home"></span> Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav">
                    <?php
                    $cats=new Product();
                    $catt=$cats->showPublicCat();
                    foreach ($catt as $cat) :
                    ?>

                    <li><a href="/category<?php echo $cat['id']?>"><?php echo $cat['cat_name'] ?></a></li>
                    <?php endforeach; ?>
                </ul>

                <ul class="nav navbar-nav navbar-right">

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>




      <div class="row">
          <div class="info"></div>
          <?php
          $cat_id=$_GET['cat_id'];
          $pds=new Product();
          $pd=$pds->showPublicProduct($cat_id);
          foreach ($pd as $row) :
          ?>

          <div class="col-sm-6 col-md-3">
              <div class="thumbnail clearfix">
                  <img src="config/pCover/<?php echo $row['p_cover'] ?>" class="img-rounded" alt="...">
                  <div class="caption">
                      <h3><?php echo $row['p_name'] ?></h3>
                      <p><?php echo $row['p_detail'] ?></p>

                      <p><a href="#" id="btnATC" idd="<?php echo $row['id'] ?>" class="btn btn-primary btn-sm pull-right" role="button" ><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</a>  <strong> $<?php echo $row['p_price'] ?></strong> </p>
                  </div>
              </div>
          </div>

            <?php endforeach; ?>
      </div>

</div>

<?php include ('footer.php') ?>
