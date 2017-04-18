<?php include ('../header.php') ?>
<div class="container">
    <?php include ('../navBar.php') ?>

    <div class="row">
        <div class="col-sm-4 col-sm-offset-4" id="myForm">
            <div class="panel panel-default">
                <div class="panel-heading">Sign In</div>
                <div class="panel-body">
                    <div id="infoMsg"></div>
                    <form role="form">
                        <div class="form-group">
                            <label for="userName" class="control-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" name="userName" id="userName" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-block" id="btnSignin">Signin</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>



</div>
<?php include ('../footer.php') ?>
