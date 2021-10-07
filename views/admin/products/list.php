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
                            <h1 class="page-header">Products list | <a href="<?php url("product/new"); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add product</a></h1>
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
                                <th>Type Product</th>                                
                                <th>Date admission</th>
                                <th>Check time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; foreach($products as $product): ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $product->Nm; ?></td>

                                <?php if(strlen($product->CncptDscrptn) > 4): ?>
                                <td><b class="text-success"><?php echo $product->CncptDscrptn; ?></b>...</td>
                                <?php else: ?>
                                <td>-</td>
                                <?php endif; ?>

                                <td><?php echo $product->Rfrnc_TypPrdct ; ?></td>
                                
                                <td><?php echo $product->DtAdmssn; ?></td>
                                <td><?php echo $product->ChckTm; ?></td>
                                <td>
                                    <a href="<?php url("product/edit/" . $product->Rfrnc); ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <?php if($product->Cndtn == 1): ?>
                                    <button href="<?php url("product/desactivate/" . $product->Rfrnc); ?>" class="btn btn-warning btn-sm">Desactivate</button>
                                    <?php else: ?>
                                    <button href="<?php url("product/activate/" . $product->Rfrnc); ?>" class="btn btn-warning btn-sm">Activate</button>
                                    <?php endif; ?>
                                    
                                    <?php if($product->Rmvd == 1): ?>
                                    <button onclick="<?php url("product/recover/" . $product->Rfrnc); ?>" class="btn btn-success btn-sm">Recover</button>
                                    <?php else: ?>
                                    <button onclick="remove('<?php url('product/remove/' . $product->Rfrnc); ?>')" class="btn btn-danger btn-sm">Remove</button>
                                    <?php endif; ?>
                                    
                                    <?php if($product->Lckd == 1): ?>
                                    <button href="<?php url("product/unlock/" . $product->Rfrnc); ?>" class="btn btn-success btn-sm">Unlock</button>
                                    <?php else: ?>
                                    <button href="<?php url("product/locked/" . $product->Rfrnc); ?>" class="btn btn-warning btn-sm">Locked</button>
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
