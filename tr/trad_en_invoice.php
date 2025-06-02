<?php

class InvoiceEnTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["invoice"]["invoice.single"] = "invoice";
		$trad["invoice"]["invoice.new"] = "new";
		$trad["invoice"]["invoice"] = "invoices";
		$trad["invoice"]["name_ar"] = "Arabic Invoice name";
		$trad["invoice"]["desc_ar"] = "Arabic Invoice description";
		$trad["invoice"]["name_en"] = "English Invoice name";
		$trad["invoice"]["desc_en"] = "English Invoice description";
		$trad["invoice"]["customer_type_id"] = "Customer type";
		$trad["invoice"]["customer_id"] = "CRM Customer account";
		$trad["invoice"]["stock_sens_enum"] = "Stock sens enum";
		$trad["invoice"]["total_amount"] = "Total amount";
		$trad["invoice"]["tva_amount"] = "Tva amount";
		$trad["invoice"]["invoice_date"] = "Invoice date";
		$trad["invoice"]["invoice_num"] = "Invoice number";
		$trad["invoice"]["mstore_id"] = "sales store";

		$trad["invoice"]["step1"] = "Invoice info";
		$trad["invoice"]["step2"] = "Invoice details";

		$trad["invoice"]["stockMovementList"] = "Invoice rows";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new InvoiceArTranslator();
		return new Invoice();
	}
}