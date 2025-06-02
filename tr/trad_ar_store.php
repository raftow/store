<?php

class StoreArTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["store"]["store.single"] = "مخزن";
		$trad["store"]["store.new"] = "جديد(ة)";
		$trad["store"]["store"] = "مخازن";
		$trad["store"]["name_ar"] = "مسمى  بالعربية";
		$trad["store"]["desc_ar"] = "وصف  بالعربية";
		$trad["store"]["name_en"] = "مسمى  بالانجليزية";
		$trad["store"]["desc_en"] = "وصف  بالانجليزية";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new StoreEnTranslator();
		return new Store();
	}
}