No customerinvoice<?php

class InvoiceArTranslator{
    public static function initData()
    {
        $trad = [];

		$trad["invoice"]["invoice.single"] = "فاتورة";
		$trad["invoice"]["invoice.new"] = "جديد(ة)";
		$trad["invoice"]["invoice"] = "فواتير";
		$trad["invoice"]["name_ar"] = "مسمى  بالعربية";
		$trad["invoice"]["desc_ar"] = "وصف  بالعربية";
		$trad["invoice"]["name_en"] = "مسمى  بالانجليزية";
		$trad["invoice"]["desc_en"] = "وصف  بالانجليزية";
		$trad["invoice"]["customer_type_id"] = "نوع العميل";
		$trad["invoice"]["customer_id"] = "العميل";
		$trad["invoice"]["mobile"] = "الجوال";
		$trad["invoice"]["email"] = "البريد الالكتروني";
		$trad["invoice"]["idn_type_id"] = "نوع الهوية";
		$trad["invoice"]["idn"] = "رقم الهوية / بطاقة الأحوال";
		$trad["invoice"]["gender_id"] = "الجنس";
		$trad["invoice"]["first_name"] = "الاسم الأول بالعربية";
		$trad["invoice"]["last_name"] = "إسم العائلة بالعربية";

		$trad["invoice"]["stock_sens_enum"] = "نوع الحركة";
		$trad["invoice"]["total_amount"] = "المبلغ الاجمالي";
		$trad["invoice"]["tva_amount"] = "مبلغ الضريبة";
		$trad["invoice"]["invoice_date"] = "تاريخ الفاتورة";
		$trad["invoice"]["invoice_num"] = "رقم الفاتورة";
		$trad["invoice"]["mstore_id"] = "نقطة البيع";
		$trad["invoice"]["newold_enum"] = "جديد/سابق";

		$trad["invoice"]["new_customer"] = "بيانات العميل";
		$trad["invoice"]["old_customer"] = "عميل سابق";
		
		

		$trad["invoice"]["step1"] = "معلومات الفاتورة";
		$trad["invoice"]["step2"] = "تفاصيل الفاتورة";


		$trad["invoice"]["stockMovementList"] = "سطور الفاتورة";
	
	
        // steps
        return $trad;
    }

    public static function getInstance()
	{
        if(false) return new InvoiceEnTranslator();
		return new Invoice();
	}
}