<?php

class GoodStockEnTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["good_stock"]["goodstock.single"] = "Stocked Good";
		$trad["good_stock"]["goodstock.new"] = "new";
		$trad["good_stock"]["good_stock"] = "Stocked Goods";
		$trad["good_stock"]["name_ar"] = "Arabic Good stock name";
		$trad["good_stock"]["desc_ar"] = "Arabic Good stock description";
		$trad["good_stock"]["name_en"] = "English Good stock name";
		$trad["good_stock"]["desc_en"] = "English Good stock description";
		$trad["good_stock"]["good_id"] = "good";
		$trad["good_stock"]["store_id"] = "store";
		$trad["good_stock"]["expiring_date"] = "Expiring date";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new GoodStockArTranslator();
		return new GoodStock();
	}
}