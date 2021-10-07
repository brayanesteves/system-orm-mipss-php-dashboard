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
                            <h1 class="page-header"><?php echo isset($product) ? 'Update' : 'Add'; ?> product | <a href="<?php url("products"); ?>" class="btn btn-default"><i class="fa fa-products"></i> See listing</a></h1>
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
                                    <form action="<?php url("product/add"); ?>" method="POST" role="form">
                                        <legend>Product data</legend>
                                        <?php if(isset($product)): ?>
                                            <input type="hidden" name="Rfrnc" value="<?php echo $product->Rfrnc; ?>">
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <label for="Nm">Name</label>
                                            <input type="text" name="Nm" id="Nm" class="form-control" value="<?php echo isset($product) ? $product->Nm : ''; ?>" placeholder="Enter name...">
                                        </div>

                                        <div class="form-group">
                                            <label for="CncptDscrptn">Concept or Description</label>
                                            <textarea type="text" name="CncptDscrptn" id="CncptDscrptn" class="form-control" value="<?php echo isset($product) ? $product->CncptDscrptn : ''; ?>" placeholder="Enter concept or description..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="Rfrnc_TypPrdct">Type product</label>
                                            <select name="Rfrnc_TypPrdct" id="Rfrnc_TypPrdct" class="form-control">
                                                <option value="<?php echo isset($product) ? $product->Rfrnc_TypPrdct : ''; ?>" disabled><?php echo isset($product) ? $product->Rfrnc_TypPrdct : ''; ?></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>

                                        

                                        <div class="form-group">
                                            <label class="checkbox-inline">
                                            <input type="checkbox" name="Cndtn" id="Cndtn" <?php echo $product->Cndtn == 1 ? 'checked' : ''; ?>> Condition                                            
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label class="checkbox-inline">
                                            <input type="checkbox" name="Rmvd" id="Rmvd" <?php echo $product->Rmvd == 1 ? 'checked' : ''; ?>> Removed                                            
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label class="checkbox-inline">
                                            <input type="checkbox" name="Lckd" id="Lckd" <?php echo $product->Lckd == 1 ? 'checked' : ''; ?>> Locked                                            
                                            </label>
                                        </div>

                                        <button type="submit" class="btn btn-primary"><?php echo isset($product) ? 'Update' : 'Add'; ?></button>
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
