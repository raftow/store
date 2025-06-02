<?php

class MstoreArTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["mstore"]["mstore.single"] = "نقطة بيع";
		$trad["mstore"]["mstore.new"] = "جديدة";
		$trad["mstore"]["mstore"] = "نقاط بيع";
		$trad["mstore"]["name_ar"] = "مسمى  بالعربية";
		$trad["mstore"]["desc_ar"] = "وصف  بالعربية";
		$trad["mstore"]["name_en"] = "مسمى  بالانجليزية";
		$trad["mstore"]["desc_en"] = "وصف  بالانجليزية";
		$trad["mstore"]["lookup_code"] = "الرمز";
		$trad["mstore"]["orgunit_id"] = "المنشأة/فرع";
		$trad["mstore"]["allEmployeeList"] = "الموظفين";


		$trad["mstore"]["step1"] = "المعلومات العامة";
		$trad["mstore"]["step2"] = "الموظفين";
	
	
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new MstoreEnTranslator();
		return new Mstore();
	}
}