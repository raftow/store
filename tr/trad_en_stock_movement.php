<?php

class StockMovementEnTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["stock_movement"]["stockmovement.single"] = "stock movement";
		$trad["stock_movement"]["stockmovement.new"] = "new";
		$trad["stock_movement"]["stock_movement"] = "stock movements";
		$trad["stock_movement"]["stock_sens_enum"] = "Stock sens enum";
		$trad["stock_movement"]["movement_date"] = "Movement date";
		$trad["stock_movement"]["parent_stock_movement_id"] = "archive movement";
		$trad["stock_movement"]["bu_quantity"] = "Big unit quantity";
		$trad["stock_movement"]["su_quantity"] = "Small unit quantity";
		$trad["stock_movement"]["bu_price"] = "Big unit price";
		$trad["stock_movement"]["su_price"] = "Small unit price";
		$trad["stock_movement"]["invoice_id"] = "invoice";
		$trad["stock_movement"]["good_id"] = "good";
		$trad["stock_movement"]["good_stock_id"] = "Stocked Good";
		$trad["stock_movement"]["store_id"] = "store";
		$trad["stock_movement"]["expiring_date"] = "Expiring date";
		$trad["stock_movement"]["mstore_id"] = "sales store";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new StockMovementArTranslator();
		return new StockMovement();
	}
}