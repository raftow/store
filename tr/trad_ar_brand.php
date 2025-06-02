<?php

class BrandArTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["brand"]["brand.single"] = "ماركة مسجلة";
		$trad["brand"]["brand.new"] = "جديد(ة)";
		$trad["brand"]["brand"] = "الماركات المسجلة";
		$trad["brand"]["name_ar"] = "مسمى  بالعربية";
		$trad["brand"]["desc_ar"] = "وصف  بالعربية";
		$trad["brand"]["name_en"] = "مسمى  بالانجليزية";
		$trad["brand"]["desc_en"] = "وصف  بالانجليزية";
		$trad["brand"]["goodList"] = "قائمة بضائع";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new BrandEnTranslator();
		return new Brand();
	}
}