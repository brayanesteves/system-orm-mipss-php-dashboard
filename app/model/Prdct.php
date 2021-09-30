<?php

    class Prdcts {
        private $Rfrnc;
        private $Nm;
        private $CncptDscrptn;
        private $Rfrnc_TypPrdct;
        private $Cndtn;
        private $Rmvd;
        private $Lckd;
        private $DtAdmssn;
        private $ChckTm;

        function __construct($Rfrnc, $Nm, $CncptDscrptn, $Rfrnc_TypPrdct, $Cndtn, $Rmvd, $Lckd, $DtAdmssn, $ChckTm) {
            $this->Rfrnc          = $Rfrnc;
            $this->Nm             = $Nm;
            $this->CncptDscrptn   = $CncptDscrptn;
            $this->Rfrnc_TypPrdct =  $Rfrnc_TypPrdct;
            $this->Cndtn          = $Cndtn;
            $this->Rmvd           = $Rmvd;
            $this->Lckd           = $Lckd;
            $this->DtAdmssn       = $DtAdmssn;
            $this->ChckTm         = $ChckTm;
        }

        public function setRfrnc($Rfrnc) {
            $this->Rfrnc = $Rfrnc;
        }
        public function getRfrnc() {
            return $this->Rfrnc;
        }
    }
?>