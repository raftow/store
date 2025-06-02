<?php

class StoreEnTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["store"]["store.single"] = "store";
		$trad["store"]["store.new"] = "new";
		$trad["store"]["store"] = "stores";
		$trad["store"]["name_ar"] = "Arabic Store name";
		$trad["store"]["desc_ar"] = "Arabic Store description";
		$trad["store"]["name_en"] = "English Store name";
		$trad["store"]["desc_en"] = "English Store description";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new StoreArTranslator();
		return new Store();
	}
}