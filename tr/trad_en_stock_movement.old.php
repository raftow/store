<?php

class StockMovementEnTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["stock_movement"]["stockmovement.single"] = "stock movement";
		$trad["stock_movement"]["stockmovement.new"] = "new";
		$trad["stock_movement"]["stock_movement"] = "stock movements";
		$trad["stock_movement"]["name_ar"] = "Arabic Stock movement name";
		$trad["stock_movement"]["desc_ar"] = "Arabic Stock movement description";
		$trad["stock_movement"]["name_en"] = "English Stock movement name";
		$trad["stock_movement"]["desc_en"] = "English Stock movement description";
		$trad["stock_movement"]["stock_sens_enum"] = "Stock sens enum";
		$trad["stock_movement"]["movement_date"] = "Movement date";
		$trad["stock_movement"]["lookup_code"] = "Lookup code";
		$trad["stock_movement"]["parent_stock_movement_id"] = "archive movement";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new StockMovementArTranslator();
		return new StockMovement();
	}
}