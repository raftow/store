<?php

class GoodCategoryEnTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["good_category"]["goodcategory.single"] = "good category";
		$trad["good_category"]["goodcategory.new"] = "new";
		$trad["good_category"]["good_category"] = "good categories";
		$trad["good_category"]["name_ar"] = "Arabic Good category name";
		$trad["good_category"]["desc_ar"] = "Arabic Good category description";
		$trad["good_category"]["name_en"] = "English Good category name";
		$trad["good_category"]["desc_en"] = "English Good category description";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new GoodCategoryArTranslator();
		return new GoodCategory();
	}
}