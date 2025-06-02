<?php

class StockMovementArTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["stock_movement"]["stockmovement.single"] = "حركات مخزون";
		$trad["stock_movement"]["stockmovement.new"] = "جديد(ة)";
		$trad["stock_movement"]["stock_movement"] = "حركة مخزون";
		$trad["stock_movement"]["name_ar"] = "مسمى  بالعربية";
		$trad["stock_movement"]["desc_ar"] = "وصف  بالعربية";
		$trad["stock_movement"]["name_en"] = "مسمى  بالانجليزية";
		$trad["stock_movement"]["desc_en"] = "وصف  بالانجليزية";
		$trad["stock_movement"]["stock_sens_enum"] = "نوع الحركة";
		$trad["stock_movement"]["movement_date"] = "تاريخ الحركة";
		$trad["stock_movement"]["lookup_code"] = "الرمز";
		$trad["stock_movement"]["parent_stock_movement_id"] = "الحركة المؤرشفة";
		$trad["stock_movement"]["row_num"] = "رقم السطر";

		
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new StockMovementEnTranslator();
		return new StockMovement();
	}
}