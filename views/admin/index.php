<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include(VIEWS_ROUTE . "admininclude/head.php"); ?>
    </head>
    <body>
        <?php if(isset($_SESSION['Usrnm'])): ?>
        <div id="wrapper">
            <?php include(VIEWS_ROUTE . "admininclude/menu.php"); ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Main</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- CONTENT -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Users</h3>
                        </div>
                        <div class="panel-body">
                            <a href="<?php url("users"); ?>" class="btn btn-default btn-large"><i class="fa fa-users"></i>User list</a>
                        </div>
                    </div>
                    <!-- .CONTENT -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php include(VIEWS_ROUTE . "admininclude/footer.php"); ?>
        <?php else: redirect('/login'); ?>
        <?php endif; ?>

    </body>
</html>
