<?php

class GoodArTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["good"]["good.single"] = "بضاعة";
		$trad["good"]["good.new"] = "جديد(ة)";
		$trad["good"]["good"] = "بضائع";
		$trad["good"]["name_ar"] = "مسمى  بالعربية";
		$trad["good"]["desc_ar"] = "وصف  بالعربية";
		$trad["good"]["name_en"] = "مسمى  بالانجليزية";
		$trad["good"]["desc_en"] = "وصف  بالانجليزية";
		$trad["good"]["brand_id"] = "ماركة المسجلة";
		$trad["good"]["small_unit_id"] = "وحدة القياس الصغيرة";
		$trad["good"]["big_unit_id"] = "وحدة القياس الكبيرة";
		$trad["good"]["bu_su_num"] = "عدد الوحدات الصغيرة في وحدة كبيرة";
		$trad["good"]["good_category_id"] = "فئة البضاعة";
		$trad["good"]["lookup_code"] = "الرمز";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new GoodEnTranslator();
		return new Good();
	}
}