<?php

class MstoreEnTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["mstore"]["mstore.single"] = "sales store";
		$trad["mstore"]["mstore.new"] = "new";
		$trad["mstore"]["mstore"] = "sales stores";
		$trad["mstore"]["name_ar"] = "Arabic Mstore name";
		$trad["mstore"]["desc_ar"] = "Arabic Mstore description";
		$trad["mstore"]["name_en"] = "English Mstore name";
		$trad["mstore"]["desc_en"] = "English Mstore description";
		$trad["mstore"]["lookup_code"] = "Code";
		$trad["mstore"]["orgunit_id"] = "Organization";
		$trad["mstore"]["allEmployeeList"] = "Employees";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new MstoreArTranslator();
		return new Mstore();
	}
}