<?php

class GoodStockArTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["good_stock"]["goodstock.single"] = "بضاعة مخزونة";
		$trad["good_stock"]["goodstock.new"] = "جديد(ة)";
		$trad["good_stock"]["good_stock"] = "بضائع مخزونة";
		$trad["good_stock"]["name_ar"] = "مسمى  بالعربية";
		$trad["good_stock"]["desc_ar"] = "وصف  بالعربية";
		$trad["good_stock"]["name_en"] = "مسمى  بالانجليزية";
		$trad["good_stock"]["desc_en"] = "وصف  بالانجليزية";
		$trad["good_stock"]["good_id"] = "البضاعة";
		$trad["good_stock"]["store_id"] = "المخزن";
		$trad["good_stock"]["expiring_date"] = "تاريخ الانتهاء";
		$trad["good_stock"]["place_rack"] = "مكان التخزين";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new GoodStockEnTranslator();
		return new GoodStock();
	}
}