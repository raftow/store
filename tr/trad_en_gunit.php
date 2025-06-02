<?php

class GunitEnTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["gunit"]["gunit.single"] = "measure unit";
		$trad["gunit"]["gunit.new"] = "new";
		$trad["gunit"]["gunit"] = "measure units";
		$trad["gunit"]["name_ar"] = "Arabic Gunit name";
		$trad["gunit"]["desc_ar"] = "Arabic Gunit description";
		$trad["gunit"]["name_en"] = "English Gunit name";
		$trad["gunit"]["desc_en"] = "English Gunit description";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new GunitArTranslator();
		return new Gunit();
	}
}