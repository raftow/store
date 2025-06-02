<?php

class StoreEmployeeArTranslator{
    public static function initData()
    {
        $trad = [];	
        $trad["store_employee"]["storeemployee.single"] = "موظف نقطة بيع";
        $trad["store_employee"]["storeemployee.single.short"] = "موظف";
        $trad["store_employee"]["storeemployee.new"] = "جديد";
        $trad["store_employee"]["store_employee"] = "موظفي نقاط بيع";
        $trad["store_employee"]["store_employee.short"] = "الموظفين";
        $trad["store_employee"]["orgunit_id"] = "نقطة البيع";
        $trad["store_employee"]["mstore_id"] = "نقطة البيع";


        $trad["store_employee"]["firstname_ar"] = "الاسم الأول";
		$trad["store_employee"]["lastname_ar"] = "اسم العائلة";

		$trad["store_employee"]["firstname_en"] = "الاسم الأول بالانجليزي";
		$trad["store_employee"]["lastname_en"] = "اسم العائلة بالانجليزي";
        
        // $trad["store_employee"]["service_category_mfk"] = "المسؤوليات المناطة به";
        // $trad["store_employee"]["service_category_mfk_tooltip"] = "أصناف الخدمات  التي يقدمها";
        // $trad["store_employee"]["service_mfk"] = "الخدمات التي يقدمها";
        // $trad["store_employee"]["requests_nb"] = "طاقة استيعاب الملفات يوميا";
        $trad["store_employee"]["employee_id"] = "الموظف";

        $trad["store_employee"]["ongoing_requests_count"] = "عدد الملفات الجاري العمل عليها";
        $trad["store_employee"]["done_requests_count"] = "عدد الملفات التي تم التحقيق عليها";
        $trad["store_employee"]["requests_count"] = "مجموع عدد الملفات المسندة";
        $trad["store_employee"]["statif_pct"] = "نسبة رضا المتقدم";


        $trad["store_employee"]["ongoing_requests_count.short"] = "الجاري";
        $trad["store_employee"]["done_requests_count.short"] = "تم التحقيق";
        $trad["store_employee"]["requests_count.short"] = "المسند";
        $trad["store_employee"]["statif_pct.short"] = "رضا المتقدم";
        

        $trad["store_employee"]["assignedRequests"] = "الملفات المسندة";
        $trad["store_employee"]["currentRequests"] = "الملفات الحالية";
        $trad["store_employee"]["finishedRequests"] = "الملفات المنتهية";
        $trad["store_employee"]["allOrgunitList"] = "نقاط البيع التي يعمل معها";


        $trad["store_employee"]["active"] = "نشط";
        $trad["store_employee"]["admin"] = "مشرف تنسيق";
        $trad["store_employee"]["super_admin"] = "مشرف عام";
        $trad["store_employee"]["approved"] = "موظف معتمد"; 
        $trad["store_employee"]["employeeScopeList"] = "قائمة مجالات عمل الموظف";


        $trad["store_employee"]["step1"] = "البيانات العامة";
        $trad["store_employee"]["step2"] = "مجالات العمل";
        // $trad["store_employee"]["step3"] = "الملفات المسندة";
    
        return $trad;
    }

    public static function getInstance()
	{
		return new StoreEmployee();
	}
}
    

    
	

	 
?>