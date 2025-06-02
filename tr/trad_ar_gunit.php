<?php

class GunitArTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["gunit"]["gunit.single"] = "وحدة قياس";
		$trad["gunit"]["gunit.new"] = "جديد(ة)";
		$trad["gunit"]["gunit"] = "وحدات القياس";
		$trad["gunit"]["name_ar"] = "مسمى  بالعربية";
		$trad["gunit"]["desc_ar"] = "وصف  بالعربية";
		$trad["gunit"]["name_en"] = "مسمى  بالانجليزية";
		$trad["gunit"]["desc_en"] = "وصف  بالانجليزية";
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new GunitEnTranslator();
		return new Gunit();
	}
}