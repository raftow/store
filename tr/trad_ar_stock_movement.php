<?php

class StockMovementArTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["stock_movement"]["stockmovement.single"] = "حركات مخزون";
		$trad["stock_movement"]["stockmovement.new"] = "جديد(ة)";
		$trad["stock_movement"]["stock_movement"] = "حركة مخزون";
		$trad["stock_movement"]["stock_sens_enum"] = "نوع الحركة";
		$trad["stock_movement"]["movement_date"] = "تاريخ الحركة";
		$trad["stock_movement"]["customer_type_id"] = "نوع العميل";
		$trad["stock_movement"]["customer_id"] = "العميل";
		$trad["stock_movement"]["parent_stock_movement_id"] = "الحركة المؤرشفة";
		$trad["stock_movement"]["bu_quantity"] = "الكمية من الوحدة الكبيرة";
		$trad["stock_movement"]["su_quantity"] = "الكمية من الوحدة الصغيرة";
		$trad["stock_movement"]["bu_price"] = "السعر للوحدة الكبيرة";
		$trad["stock_movement"]["su_price"] = "السعر للوحدة الصغيرة";
		$trad["stock_movement"]["invoice_id"] = "الفاتورة";
		$trad["stock_movement"]["good_id"] = "البضاعة";
		$trad["stock_movement"]["good_stock_id"] = "بضاعة المخزونة";
		$trad["stock_movement"]["store_id"] = "المخزن";
		$trad["stock_movement"]["expiring_date"] = "تاريخ -------";
		$trad["stock_movement"]["mstore_id"] = "نقطة البيع";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new StockMovementEnTranslator();
		return new StockMovement();
	}
}