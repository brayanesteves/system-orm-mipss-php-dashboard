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
                            <h1 class="page-header">Add user | <a href="<?php url("users"); ?>" class="btn btn-default"><i class="fa fa-users"></i> See listing</a></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- CONTENT -->
                    <div class="row">

                        <div class="col-md-6"> 

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"></h3>                                    
                                </div>
                                <div class="panel-body">
                                    <form action="<?php url("user/add"); ?>" method="POST" role="form">
                                        <legend>User data</legend>

                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter username...">
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" name="password" id="password" class="form-control" placeholder="Enter username...">
                                        </div>

                                        <div class="form-group">
                                            <label for="Rfrnc_Prsn">Person</label>
                                            <select name="Rfrnc_Prsn" id="Rfrnc_Prsn" class="form-control">
                                            <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="UsrTyp_Rfrnc">Type user</label>
                                            <select name="UsrTyp_Rfrnc" id="UsrTyp_Rfrnc" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="checkbox-inline">
                                            <input type="checkbox" name="Cndtn" id="Cndtn"> Condition                                            
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label class="checkbox-inline">
                                            <input type="checkbox" name="Rmvd" id="Rmvd"> Removed                                            
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label class="checkbox-inline">
                                            <input type="checkbox" name="Lckd" id="Lckd"> Locked                                            
                                            </label>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>

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
