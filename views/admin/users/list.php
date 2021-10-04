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
                                <th>Date admission</th>
                                <th>Check time</th>
                                <th>Action</th>
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
                                
                                <td><?php echo $user->DtAdmssn; ?></td>
                                <td><?php echo $user->ChckTm; ?></td>
                                <td>
                                    <a href="<?php url("user/edit/" . $user->Rfrnc); ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <?php if($user->Cndtn == 1): ?>
                                    <td><a href="<?php url("user/desactivate/" . $user->Rfrnc); ?>" class="btn btn-warning btn-sm">Desactivate</a></td>
                                    <?php else: ?>
                                    <td><a href="<?php url("user/activate/" . $user->Rfrnc); ?>" class="btn btn-warning btn-sm">Activate</a></td>
                                    <?php endif; ?>
                                    
                                    <?php if($user->Rmvd == 1): ?>
                                    <td><a href="<?php url("user/recover/" . $user->Rfrnc); ?>" class="btn btn-success btn-sm">Recover</a></td>
                                    <?php else: ?>
                                    <td><a href="<?php url("user/remove/" . $user->Rfrnc); ?>" class="btn btn-danger btn-sm">Remove</a></td>
                                    <?php endif; ?>
                                    
                                    <?php if($user->Lckd == 1): ?>
                                    <td><a href="<?php url("user/unlock/" . $user->Rfrnc); ?>" class="btn btn-success btn-sm">Unlock</a></td>
                                    <?php else: ?>
                                    <td><a href="<?php url("user/locked/" . $user->Rfrnc); ?>" class="btn btn-warning btn-sm">Locked</a></td>
                                    <?php endif; ?>   
                                    
                                </td>
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
        <?php else: _redirect('/login'); ?>
        <?php endif; ?>

    </body>
</html>
