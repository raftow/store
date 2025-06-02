<?php


class StoreInvoiceAfwStructure
{
	// token separator = §
	public static function initInstance(&$obj)
	{
		if ($obj instanceof Invoice) {
			$obj->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
			$obj->DISPLAY_FIELD = ["customer_id", "invoice_num"];

			// $obj->ENABLE_DISPLAY_MODE_IN_QEDIT=true;
			$obj->ORDER_BY_FIELDS = "customer_id, invoice_num";



			$obj->UNIQUE_KEY = array('invoice_num');

			$obj->showQeditErrors = true;
			$obj->showRetrieveErrors = true;
			$obj->general_check_errors = true;
			$obj->editByStep = true;
            $obj->editNbSteps = 2; 
			// $obj->after_save_edit = array("class"=>'Road',"attribute"=>'road_id', "currmod"=>'btb',"currstep"=>9);
			$obj->after_save_edit = array("mode" => "qsearch", "currmod" => 'store', "class" => 'Invoice', "submit" => true);
		} else {
			InvoiceArTranslator::initData();
			InvoiceEnTranslator::initData();
		}
	}


	public static $DB_STRUCTURE =
	array(
		'id' => array('SHOW' => true, 'RETRIEVE' => true, 'EDIT' => false, 'TYPE' => 'PK'),

		'mstore_id' => array('SHORTNAME' => 'mstore',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => true,  
				'EDIT' => true,  'QEDIT' => true,  
				'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'mstore',  'ANSMODULE' => 'store',  
				'RELATION' => 'unkn',  'READONLY' => false,  'DNA' => true, 
				'CSS' => 'width_pct_25', ),

		'stock_sens_enum' => array(
			'SHORTNAME' => 'sens',
			'SEARCH' => true,
			'QSEARCH' => true,
			'SHOW' => true,
			'AUDIT' => false,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => true,
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'MIN-SIZE' => 1,
			'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'ENUM',
			'ANSWER' => 'FUNCTION',
			'READONLY' => false,
			'DNA' => true,
			'CSS' => 'width_pct_25',
		),
	

		'customer_type_id' => array(
			'SHORTNAME' => 'type',
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'AUDIT' => false,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => true,
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'MIN-SIZE' => 1,
			'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'FK',
			'ANSWER' => 'customer_type',
			'ANSMODULE' => 'crm',
			'WHERE' => "module_mfk like '%,1285,%'",
			'RELATION' => 'ManyToOne',
			'READONLY' => false,
			'DNA' => true,
			// 'DISABLED' => true,			
			'CSS' => 'width_pct_25',
		),

		'newold_enum' => array(
			'SHORTNAME' => 'sens',
			'SEARCH' => true,
			'QSEARCH' => true,
			'SHOW' => true,
			'AUDIT' => false,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => true,
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'MIN-SIZE' => 1,
			'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'ENUM',
			'ANSWER' => 'FUNCTION',
			'READONLY' => false,
			'DNA' => true,
			'CSS' => 'width_pct_25',
		),

		'customer_id' => array(
			'FGROUP' => 'old_customer',
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'AUDIT' => false,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => true,
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'MIN-SIZE' => 1,
			'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'FK',
			'ANSWER' => 'crm_customer',
			'ANSMODULE' => 'crm',
			'AUTOCOMPLETE' => true,
			'RELATION' => 'OneToMany',
			'READONLY' => false,
			'DNA' => true,
			'CSS' => 'width_pct_100',
		),

		'mobile' => array(
			'FGROUP' => 'new_customer',
			'STEP' => 1,
			'SEARCH' => true,
			'QSEARCH' => true,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => true,
			'SIZE' => 16,
			'MIN-SIZE' => 10,
			'MAXLENGTH' => 16,
			'CHAR_TEMPLATE' => 'BRACKETS,MATH-SYMBOLS,NUMERIC',
			'MANDATORY' => true,
			'FORMAT' => 'SA-MOBILE',
			'UTF8' => false,
			'TYPE' => 'TEXT',
			'READONLY' => false,
			'SEARCH-BY-ONE' => true,
			'DISPLAY' => true,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'ERROR-CHECK' => true,
		),

		'idn_type_id' => array(
			'FGROUP' => 'new_customer',
			'STEP' => 1,
			'SHORTNAME' => 'idntype',
			'SEARCH' => false,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => false,
			'SIZE' => 16,
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'ENUM',
			'ANSWER' => 'FUNCTION',
			'READONLY' => false,
			'EDIT-SHORT-LIST' => true,
			'ANSMODULE' => 'crm',
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'ERROR-CHECK' => true,
		),

		'idn' => array(
			'FGROUP' => 'new_customer',
			'STEP' => 1,
			'SEARCH' => true,
			'QSEARCH' => true,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => true,
			'SIZE' => 16,
			'MIN-SIZE' => 5,
			'FORMAT' => 'SA-IDN',
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'TEXT',
			'READONLY' => false,
			'IDN-TYPE-ATTRIBUTE' => 'idn_type_id',
			'SEARCH-BY-ONE' => true,
			'DISPLAY' => true,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'ERROR-CHECK' => true,
		),

		'email' => array(
			'FGROUP' => 'new_customer',
			'STEP' => 1,
			'SEARCH' => true,
			'QSEARCH' => true,
			'SHOW' => true,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => true,
			'SIZE' => 16,
			'MIN-SIZE' => 7,
			'MAXLENGTH' => 64,
			'MANDATORY' => true,
			'FORMAT' => 'EMAIL',
			'UTF8' => false,
			'TYPE' => 'TEXT',
			'READONLY' => false,
			'SEARCH-BY-ONE' => true,
			'DISPLAY' => true,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'ERROR-CHECK' => true,
		),

		'gender_id' => array(
			'FGROUP' => 'new_customer',
			'STEP' => 1,
			'SHORTNAME' => 'gender',
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => true,
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'UTF8' => false,
			'TYPE' => 'ENUM',
			'ANSWER' => 'FUNCTION',
			'RELATION' => 'ManyToOne',
			'READONLY' => false,
			'ANSMODULE' => 'crm',
			'SEARCH-BY-ONE' => false,
			'DISPLAY' => true,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'MANDATORY' => true,
			'ERROR-CHECK' => true,
		),

		'first_name' => array(
			'FGROUP' => 'new_customer',
			'STEP' => 1,
			'SEARCH' => true,
			'QSEARCH' => true,
			'SHOW' => true,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => true,
			'SIZE' => 24,
			'MIN-SIZE' => 3,
			'MAXLENGTH' => 32,
			'CHAR_TEMPLATE' => 'ARABIC-CHARS,SPACE',
			'REQUIRED' => true,
			'UTF8' => true,
			'TYPE' => 'TEXT',
			'READONLY' => false,
			'SEARCH-BY-ONE' => true,
			'DISPLAY' => true,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'MANDATORY' => true,
			'ERROR-CHECK' => true,
		),

		'last_name' => array(
			'FGROUP' => 'new_customer',
			'STEP' => 1,
			'SEARCH' => true,
			'QSEARCH' => true,
			'SHOW' => true,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => true,
			'SIZE' => 24,
			'MIN-SIZE' => 3,
			'MAXLENGTH' => 32,
			'CHAR_TEMPLATE' => '',
			'REQUIRED' => true,
			'UTF8' => true,
			'TYPE' => 'TEXT',
			'READONLY' => false,
			'SEARCH-BY-ONE' => true,
			'DISPLAY' => true,
			'DISPLAY-UGROUPS' => '',
			'EDIT-UGROUPS' => '',
			'MANDATORY' => true,
			'ERROR-CHECK' => true,
		),

		'invoice_date' => array(
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'AUDIT' => false,
			'RETRIEVE' => true,
			'EDIT' => true,
			'QEDIT' => false,
			'SIZE' => 10,
			'MAXLENGTH' => 10,
			'MIN-SIZE' => 1,
			'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",
			'UTF8' => false,
			'TYPE' => 'GDAT',
			'READONLY' => false,
			'DNA' => true,
			'CSS' => 'width_pct_50',
		),

		'invoice_num' => array('SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => true,  
				'EDIT' => true,  'QEDIT' => false,  
				'SIZE' => 16,  'MAXLENGTH' => 16,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'MANDATORY' => true,  'UTF8' => true,  
				'TYPE' => 'TEXT',  'READONLY' => true,  'DNA' => true, 
				'CSS' => 'width_pct_50', ),


	

		

		'total_amount' => array(
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'AUDIT' => false,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => false,
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'MIN-SIZE' => 1,
			'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'FLOAT',
			'READONLY' => false,
			'DNA' => true,
			'CSS' => 'width_pct_50',
		),

		'tva_amount' => array(
			'SEARCH' => true,
			'QSEARCH' => false,
			'SHOW' => true,
			'AUDIT' => false,
			'RETRIEVE' => false,
			'EDIT' => true,
			'QEDIT' => false,
			'SIZE' => 32,
			'MAXLENGTH' => 32,
			'MIN-SIZE' => 1,
			'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",
			'MANDATORY' => true,
			'UTF8' => false,
			'TYPE' => 'FLOAT',
			'READONLY' => false,
			'DNA' => true,
			'CSS' => 'width_pct_50',
		),


		'stockMovementList' => array('STEP' => 2, 'SHORTNAME' => 'stockMovements',  'SHOW' => true,  
				'FORMAT' => 'retrieve',  'ICONS' => true,  'DELETE-ICON' => true,  'BUTTONS' => true,  
				'SEARCH' => false,  'QSEARCH' => false,  'AUDIT' => false,  'RETRIEVE' => false,  
				'EDIT' => false,  'QEDIT' => true,  
				'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE", 
				'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  
				'CATEGORY' => 'ITEMS',  'ANSWER' => 'stock_movement',  'ANSMODULE' => 'store',  'ITEM' => 'invoice_id',  
				'READONLY' => true,  
				'CSS' => 'width_pct_100', ),

		


		'created_by'         => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, "TECH_FIELDS-RETRIEVE" => true, 'RETRIEVE' => false,  'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'FK', 'ANSWER' => 'auser', 'ANSMODULE' => 'ums', 'FGROUP' => 'tech_fields'),
		'created_at'         => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, "TECH_FIELDS-RETRIEVE" => true, 'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'DATETIME', 'FGROUP' => 'tech_fields'),
		'updated_by'         => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, "TECH_FIELDS-RETRIEVE" => true, 'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'FK', 'ANSWER' => 'auser', 'ANSMODULE' => 'ums', 'FGROUP' => 'tech_fields'),
		'updated_at'         => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, "TECH_FIELDS-RETRIEVE" => true, 'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'DATETIME', 'FGROUP' => 'tech_fields'),
		'validated_by'       => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'FK', 'ANSWER' => 'auser', 'ANSMODULE' => 'ums', 'FGROUP' => 'tech_fields'),
		'validated_at'       => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'DATETIME', 'FGROUP' => 'tech_fields'),
		'active'             => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'EDIT' => false, 'QEDIT' => false, "DEFAULT" => 'Y', 'TYPE' => 'YN', 'FGROUP' => 'tech_fields'),
		'version'            => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'INT', 'FGROUP' => 'tech_fields'),
		'draft'             => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'EDIT' => false, 'QEDIT' => false, "DEFAULT" => 'Y', 'TYPE' => 'YN', 'FGROUP' => 'tech_fields'),
		'update_groups_mfk' => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 'ANSWER' => 'ugroup', 'ANSMODULE' => 'ums', 'TYPE' => 'MFK', 'FGROUP' => 'tech_fields'),
		'delete_groups_mfk' => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 'ANSWER' => 'ugroup', 'ANSMODULE' => 'ums', 'TYPE' => 'MFK', 'FGROUP' => 'tech_fields'),
		'display_groups_mfk' => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 'ANSWER' => 'ugroup', 'ANSMODULE' => 'ums', 'TYPE' => 'MFK', 'FGROUP' => 'tech_fields'),
		'sci_id'            => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'FK', 'ANSWER' => 'scenario_item', 'ANSMODULE' => 'ums', 'FGROUP' => 'tech_fields'),
		'tech_notes' 	      => array('STEP' => 99, 'HIDE_IF_NEW' => true, 'TYPE' => 'TEXT', 'CATEGORY' => 'FORMULA', "SHOW-ADMIN" => true, 'TOKEN_SEP' => "§", 'READONLY' => true, "NO-ERROR-CHECK" => true, 'FGROUP' => 'tech_fields'),
	);
}
    


// errors 
