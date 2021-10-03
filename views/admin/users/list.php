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
                            <h1 class="page-header">Users list | <a href="<?php url("user/new"); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add user</a></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- CONTENT -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Person</th>
                                <th>Type username</th>
                                <th>Condition</th>
                                <th>Removed</th>
                                <th>Locked</th>
                                <th>Date admission</th>
                                <th>Check time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; foreach($users as $user): ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $user->Usrnm; ?></td>

                                <?php if(strlen($user->Psswrd) > 4): ?>
                                <td><b class="text-success">Password strong</b></td>
                                <?php else: ?>
                                <td>Password weak</td>
                                <?php endif; ?>

                                <td><?php echo $user->Rfrnc_Prsn; ?></td>
                                <td><?php echo $user->UsrTyp_Rfrnc; ?></td>

                                <?php if($user->Cndtn == 1): ?>
                                <td><b class="text-success">Activated</b></td>
                                <?php else: ?>
                                <td>No activated</td>
                                <?php endif; ?>
                                
                                <?php if($user->Rmvd == 1): ?>
                                <td>Removed</td>
                                <?php else: ?>
                                <td><b class="text-success">No removed</b></td>
                                <?php endif; ?>
                                
                                <?php if($user->Lckd == 1): ?>
                                <td>Locked</td>
                                <?php else: ?>
                                <td><b class="text-success">No locked</b></td>
                                <?php endif; ?>                                
                                
                                <td><?php echo $user->DtAdmssn; ?></td>
                                <td><?php echo $user->ChckTm; ?></td>
                            </tr>
                            <?php $count++; endforeach; ?>
                        </tbody>
                    </table>
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
