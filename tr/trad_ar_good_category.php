<?php

class GoodCategoryArTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["good_category"]["goodcategory.single"] = "فئة بضاعة";
		$trad["good_category"]["goodcategory.new"] = "جديد(ة)";
		$trad["good_category"]["good_category"] = "فئات البضائع";
		$trad["good_category"]["name_ar"] = "مسمى  بالعربية";
		$trad["good_category"]["desc_ar"] = "وصف  بالعربية";
		$trad["good_category"]["name_en"] = "مسمى  بالانجليزية";
		$trad["good_category"]["desc_en"] = "وصف  بالانجليزية";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new GoodCategoryEnTranslator();
		return new GoodCategory();
	}
}