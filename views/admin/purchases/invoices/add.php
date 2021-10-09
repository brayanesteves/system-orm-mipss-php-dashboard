<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include(VIEWS_ROUTE . "admininclude/head.php"); ?>
    </head>
    <body>
        <?php if(isset($_SESSION['Usrnm'])): ?>
        <div id="wrapper">
            <?php include(VIEWS_ROUTE . "admininclude/menu.php"); ?>
            <div id="page-wrapper" ng-app="PurchaseApp" ng-controller="PurchaseController">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><?php echo isset($purchaseinvoices) ? 'Update' : 'Add'; ?> purchase | <a href="<?php url("purchaseinvoices"); ?>" class="btn btn-default"><i class="fa fa-purchaseinvoicess"></i> See listing</a></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- CONTENT -->
                    <div class="row">
                        <form action="<?php url("purchaseinvoices/add"); ?>" method="POST" role="form">
                            <input type="hidden" id="urlmain" name="urlmain" value="<?php url(""); ?>">
                            <div class="col-md-6"> 

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"></h3>                                    
                                    </div>
                                    <div class="panel-body">
                                        
                                            <legend>Purchase invoices data</legend>
                                            <?php if(isset($purchaseinvoices)): ?>
                                                <input type="hidden" name="Rfrnc" value="<?php echo $purchaseinvoices->Rfrnc; ?>">
                                            <?php endif; ?>
                                            
                                            <div class="form-group">
                                                <label for="InvcNmbr">Invoice number</label>
                                                <input type="text" name="InvcNmbr" id="InvcNmbr" class="form-control" value="<?php echo isset($purchaseinvoices) ? $purchaseinvoices->InvcNmbr : ''; ?>" placeholder="Enter invoice number..." />
                                            </div>

                                            <div class="form-group">
                                                <label for="CntrlNmbr">Control number</label>
                                                <input type="text" name="CntrlNmbr" id="CntrlNmbr" class="form-control" value="<?php echo isset($purchaseinvoices) ? $purchaseinvoices->CntrlNmbr : ''; ?>" placeholder="Enter control number..." />
                                            </div>

                                            <div class="form-group">
                                                <label for="Dy">Day</label>
                                                <input type="text" name="Dy" id="Dy" class="form-control" value="<?php echo isset($purchaseinvoices) ? $purchaseinvoices->Dy : ''; ?>" placeholder="Enter day..." />
                                            </div>

                                            <div class="form-group">
                                                <label for="Mnth">Month</label>
                                                <input type="text" name="Mnth" id="Mnth" class="form-control" value="<?php echo isset($purchaseinvoices) ? $purchaseinvoices->Mnth : ''; ?>" placeholder="Enter month..." />
                                            </div>

                                            <div class="form-group">
                                                <label for="Yr">Year</label>
                                                <input type="text" name="Yr" id="Yr" class="form-control" value="<?php echo isset($purchaseinvoices) ? $purchaseinvoices->Yr : ''; ?>" placeholder="Enter year..." />
                                            </div>                                        

                                            <div class="form-group">
                                                <label for="Plc">Place</label>
                                                <input type="text" name="Plc" id="Plc" class="form-control" value="<?php echo isset($purchaseinvoices) ? $purchaseinvoices->Plc : ''; ?>" placeholder="Enter place..." />
                                            </div>

                                            <div class="form-group">
                                                <label for="Rfrnc_Prsn">Name person</label>
                                                <select name="Rfrnc_Prsn" id="Rfrnc_Prsn" class="form-control">
                                                    <option value="<?php echo isset($purchaseinvoices) ? $purchaseinvoices->Rfrnc_Prsn : ''; ?>" disabled><?php echo isset($purchaseinvoices) ? $purchaseinvoices->Rfrnc_Prsn : ''; ?></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>

                                            <!--<button type="submit" class="btn btn-primary"><?php echo isset($purchaseinvoices) ? 'Update' : 'Add'; ?></button>-->
                                        
                                    </div>
                                </div>
                            </div> 

                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <button ng-click="loadData()" data-toggle="modal" data-target="#ProductsList"type="button" class="btn btn-sm btn-primary">Add purchased products</button>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Unite Price: Provider</th>
                                                    <th>Subtotal</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="_product in addData">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ _product.Nm }}</td>
                                                    <td>{{ _product.Qntty }}</td>
                                                    <td>{{ _product.UntPrc_Prvdr }}</td>
                                                    <td>{{ _product.Qntty * _product.UntPrc_Prvdr }}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>{{ getTotalQntty() }}</th>
                                                    <th>{{ getTotalUntPrc_Prvdr() }}</th>
                                                    <th><span class="text-right">Total: </span>{{ getTotal() }}</th>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- .CONTENT -->
                </div>
                <!-- /.container-fluid -->
                <!-- Modal -->
                <div class="modal fade" id="ProductsList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Products List</h4>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="" id="" class="form-control" placeholder="Search..." ng-model="search">
                            <hr>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Concept or Description</th>
                                        <th>Type Product</th>
                                        <th>Quantity</th>
                                        <th>Unite Price: Provider</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="product in products | filter:search">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ product.Nm }}</td>
                                        <td>{{ product.CncptDscrptn }}</td>
                                        <td>{{ product.TypPrdct }}</td>
                                        <td><input type="text" name="Qntty-{{ $index }}" id="Qntty-{{ $index }}" class="form-control"></td>
                                        <td><input type="text" name="UntPrc_Prvdr-{{ $index }}" id="UntPrc_Prvdr-{{ $index }}" class="form-control"></td>
                                        <td>
                                            <button ng-click="selectedData($index, product.Rfrnc)" type="button" class="btn btn-sm btn-primary">Add</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php include(VIEWS_ROUTE . "admininclude/footer.php"); ?>
        <?php else: redirect('/login'); ?>
        <?php endif; ?>

    </body>
</html>
