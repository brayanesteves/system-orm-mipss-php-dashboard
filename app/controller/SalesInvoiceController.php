<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 30/09/2021
     * Time: 15:00  
     */
    use View\Views;
    use App\model\SlsInvcs;
    class SalesInvoiceController {
        public function index() {
            $salesinvoice                   = new SlsInvcs();
            $salesinvoice->Rfrnc            = 1;
            $salesinvoice->Rfrnc_Usr        = 1234;
            $salesinvoice->InvcNmbr         = "00000";
            $salesinvoice->CntrlNmbr        = "0000000000";
            $salesinvoice->Plc              = "Caracas";
            $salesinvoice->Dy               = "01";
            $salesinvoice->Mnth             = "01";
            $salesinvoice->Yr               = "0001";
            $salesinvoice->Rfrnc_PymntCndtn = 1;
            $salesinvoice->Rfrnc_Prsn       = 1;
            $salesinvoice->Cndtn            = 1;
            $salesinvoice->Rmvd             = 0;
            $salesinvoice->Lckd             = 0;
            $salesinvoice->DtAdmssn         = "0001-01-01"; 
            $salesinvoice->ChckTm           = "00:00:00";          

            //echo $salesinvoice->InvcNmbr;

            $salesinvoice->getTable();
            $salesinvoice->save();
        }

        public function test() {
            /**
             * Fake data
             */
            $salesinvoice = array(
                1 => array(
                    "Rfrnc"            => 1,
                    "Rfrnc_Usr"        => 1,
                    "InvcNmbr"         => "00000",
                    "CntrlNmbr"        => "0000000000",
                    "Plc"              => "Caracas",
                    "Dy"               => "01",
                    "Mnth"             => "01",
                    "Yr"               => "0001",
                    "Rfrnc_PymntCndtn" => 1,
                    "Rfrnc_Prsn"       => 1,
                    "Cndtn"            => 1,
                    "Rmvd"             => 0,
                    "Lckd"             => 0,
                    "DtAdmssn"         => "0001-01-01",
                    "ChckTm"           => "00:00:00" 
                ),
                2 => array(
                    "Rfrnc"            => 2,
                    "Rfrnc_Usr"        => 1,
                    "InvcNmbr"         => "00001",
                    "CntrlNmbr"        => "0000000001",
                    "Plc"              => "Caracas",
                    "Dy"               => "01",
                    "Mnth"             => "01",
                    "Yr"               => "0001",
                    "Rfrnc_PymntCndtn" => 1,
                    "Rfrnc_Prsn"       => 1,
                    "Cndtn"            => 1,
                    "Rmvd"             => 0,
                    "Lckd"             => 0,
                    "DtAdmssn"         => "0001-01-01",
                    "ChckTm"           => "00:00:00"
                ),
                3 => array(
                    "Rfrnc"            => 3,
                    "Rfrnc_Usr"        => 1,
                    "InvcNmbr"         => "00002",
                    "CntrlNmbr"        => "0000000002",
                    "Plc"              => "Caracas",
                    "Dy"               => "01",
                    "Mnth"             => "01",
                    "Yr"               => "0001",
                    "Rfrnc_PymntCndtn" => 1,
                    "Rfrnc_Prsn"       => 1,
                    "Cndtn"            => 1,
                    "Rmvd"             => 0,
                    "Lckd"             => 0,
                    "DtAdmssn"         => "0001-01-01",
                    "ChckTm"           => "00:00:00"
                ),
                4 => array(
                    "Rfrnc"            => 4,
                    "Rfrnc_Usr"        => 1,
                    "InvcNmbr"         => "00003",
                    "CntrlNmbr"        => "0000000003",
                    "Plc"              => "Caracas",
                    "Dy"               => "01",
                    "Mnth"             => "01",
                    "Yr"               => "0001",
                    "Rfrnc_PymntCndtn" => 1,
                    "Rfrnc_Prsn"       => 1,
                    "Cndtn"            => 1,
                    "Rmvd"             => 0,
                    "Lckd"             => 0,
                    "DtAdmssn"         => "0001-01-01",
                    "ChckTm"           => "00:00:00"
                ),
                5 => array(
                    "Rfrnc"            => 5,
                    "Rfrnc_Usr"        => 1,
                    "InvcNmbr"         => "00004",
                    "CntrlNmbr"        => "0000000004",
                    "Plc"              => "Caracas",
                    "Dy"               => "01",
                    "Mnth"             => "01",
                    "Yr"               => "0001",
                    "Rfrnc_PymntCndtn" => 1,
                    "Rfrnc_Prsn"       => 1,
                    "Cndtn"            => 1,
                    "Rmvd"             => 0,
                    "Lckd"             => 0,
                    "DtAdmssn"         => "0001-01-01",
                    "ChckTm"           => "00:00:00"
                ),
            );
            /**
             * Example: 
             * 'salesinvoice.list.index'
             * 1) 'salesinvoice' => 'folder'
             * 2) 'list'         => 'folder'
             * 3) 'index'        => file .php or .html
             */
            return Views::create("salesinvoice.test", "salesinvoice", array("salesinvoice" => $salesinvoice));
        }
        public function insert() {
            
        }
    }
?>