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
                            <h1 class="page-header">Purchase list | <a href="<?php url("purchaseinvoices/new"); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add purchase</a></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- CONTENT -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Concept or Description</th>
                                <th>Type purchaseinvoice</th>                                
                                <th>Date admission</th>
                                <th>Check time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; foreach($purchaseinvoices as $purchaseinvoice): ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $purchaseinvoice->Rfrnc_Usr; ?></td>
                                
                                <td><b class="text-success"><?php echo $purchaseinvoice->InvcNmbr; ?></b></td>

                                <td><?php echo $purchaseinvoice->CntrlNmbr ; ?></td>
                                
                                <td><?php echo $purchaseinvoice->Plc; ?></td>
                                <td><?php echo $purchaseinvoice->Dy . "/" . $purchaseinvoice->Mnth . "/" . $purchaseinvoice->Yr; ?></td>
                                <td><?php echo $purchaseinvoice->Rfrnc_PymntCndtn; ?></td>
                                <td><?php echo $purchaseinvoice->Rfrnc_Prsn; ?></td>
                                <td><?php echo $purchaseinvoice->DtAdmssn; ?></td>
                                <td><?php echo $purchaseinvoice->ChckTm; ?></td>
                                <td>
                                    <a href="<?php url("purchaseinvoice/edit/" . $purchaseinvoice->Rfrnc); ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <?php if($purchaseinvoice->Cndtn == 1): ?>
                                    <button href="<?php url("purchaseinvoice/desactivate/" . $purchaseinvoice->Rfrnc); ?>" class="btn btn-warning btn-sm">Desactivate</button>
                                    <?php else: ?>
                                    <button href="<?php url("purchaseinvoice/activate/" . $purchaseinvoice->Rfrnc); ?>" class="btn btn-warning btn-sm">Activate</button>
                                    <?php endif; ?>
                                    
                                    <?php if($purchaseinvoice->Rmvd == 1): ?>
                                    <button onclick="<?php url("purchaseinvoice/recover/" . $purchaseinvoice->Rfrnc); ?>" class="btn btn-success btn-sm">Recover</button>
                                    <?php else: ?>
                                    <button onclick="remove('<?php url('purchaseinvoice/remove/' . $purchaseinvoice->Rfrnc); ?>')" class="btn btn-danger btn-sm">Remove</button>
                                    <?php endif; ?>
                                    
                                    <?php if($purchaseinvoice->Lckd == 1): ?>
                                    <button href="<?php url("purchaseinvoice/unlock/" . $purchaseinvoice->Rfrnc); ?>" class="btn btn-success btn-sm">Unlock</button>
                                    <?php else: ?>
                                    <button href="<?php url("purchaseinvoice/locked/" . $purchaseinvoice->Rfrnc); ?>" class="btn btn-warning btn-sm">Locked</button>
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
