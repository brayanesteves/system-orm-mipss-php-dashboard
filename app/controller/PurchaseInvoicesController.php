<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 07/10/2021
     * Time: 11:39
     */
    use View\Views;
    use App\model\PrchsInvcs;
    use \libs\ORM\EtORM;
    class PurchaseInvoicesController {
        public function index() {
            $purchaseinvoices = PrchsInvcs::all();
            return Views::create("admin.purchases.invoices.list", array("purchaseinvoices" => $purchaseinvoices));
        }

        public function new() {
            return Views::create("admin.purchases.invoices.add");
        }

        public function add() {
            try {
                $purchaseinvoices               = new PrchsInvcs();
                /*if(input("InvcNmbr")) {
                    $purchaseinvoices           = PrchsInvcs::find(input("InvcNmbr"));
                }*/
                $purchaseinvoices->Rfrnc_Usr        = "1";   
                $purchaseinvoices->InvcNmbr         = input("InvcNmbr");                
                $purchaseinvoices->CntrlNmbr        = input("CntrlNmbr");
                $purchaseinvoices->Plc              = input("Plc");
                $purchaseinvoices->Dy               = input("Dy");
                $purchaseinvoices->Mnth             = input("Mnth");
                $purchaseinvoices->Yr               = input("Yr");
                $purchaseinvoices->Rfrnc_PymntCndtn = "1";
                $purchaseinvoices->Rfrnc_Prsn       = input("Rfrnc_Prsn");                
                $purchaseinvoices->Cndtn            = "1"; 
                $purchaseinvoices->Rmvd             = "0"; 
                $purchaseinvoices->Lckd             = "0";
                $purchaseinvoices->DtAdmssn         = Date("Y-m-d");
                $purchaseinvoices->ChckTm           = Date("H:i:s"); 
                $purchaseinvoices->save(); 
                redirecting()->to("/purchaseinvoices");

            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
?>