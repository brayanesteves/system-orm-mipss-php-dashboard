<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 30/09/2021
     * Time: 14:55
     * 
     * @class (English: Sales Invoices / Spanish: Facturas de Ventas)
     * @table 'database' 0_Usrs (English: 0 - Sales Invoices / Spanish: 0 - Facturas de Ventas)
     */
    namespace App\model;
    use libs\ORM\Model;
    class SlsInvcs extends Model {
        /**
         * Name table
         */
        protected static $table = "0_SlsInvcs";
    }