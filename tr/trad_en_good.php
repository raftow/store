<?php

class GoodEnTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["good"]["good.single"] = "good";
		$trad["good"]["good.new"] = "new";
		$trad["good"]["good"] = "goods";
		$trad["good"]["name_ar"] = "Arabic Good name";
		$trad["good"]["desc_ar"] = "Arabic Good description";
		$trad["good"]["name_en"] = "English Good name";
		$trad["good"]["desc_en"] = "English Good description";
		$trad["good"]["brand_id"] = "brand";
		$trad["good"]["small_unit_id"] = "big measure unit";
		$trad["good"]["big_unit_id"] = "big measure unit";
		$trad["good"]["bu_su_num"] = "Bu su num";
		$trad["good"]["good_category_id"] = "good category";
		$trad["good"]["lookup_code"] = "Lookup code";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new GoodArTranslator();
		return new Good();
	}
}