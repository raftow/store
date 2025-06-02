<?php

class BrandEnTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["brand"]["brand.single"] = "brand";
		$trad["brand"]["brand.new"] = "new";
		$trad["brand"]["brand"] = "brands";
		$trad["brand"]["name_ar"] = "Arabic Brand name";
		$trad["brand"]["desc_ar"] = "Arabic Brand description";
		$trad["brand"]["name_en"] = "English Brand name";
		$trad["brand"]["desc_en"] = "English Brand description";
		$trad["brand"]["goodList"] = "List of goods";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new BrandArTranslator();
		return new Brand();
	}
}