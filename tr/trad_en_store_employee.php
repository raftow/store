<?php

class StoreEmployeeEnTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["store_employee"]["storeemployee.single"] = "Store employee";
		$trad["store_employee"]["storeemployee.new"] = "new";
		$trad["store_employee"]["store_employee"] = "Store employees";
		$trad["store_employee"]["email"] = "e-mail";
		$trad["store_employee"]["employeeScopeList"] = "List of Employee scopes";

		$trad["store_employee"]["firstname"] = "first name";
		$trad["store_employee"]["lastname"] = "last name";

		$trad["store_employee"]["firstname_en"] = "English first name";
		$trad["store_employee"]["lastname_en"] = "English last name";

        // steps
		$trad["store_employee"]["step1"] = "General infos";
		$trad["store_employee"]["step2"] = "Work scope";
		// $trad["store_employee"]["step3"] = "step3";
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new StoreEmployeeArTranslator();
		return new StoreEmployee();
	}
}