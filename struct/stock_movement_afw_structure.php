<?php 

     
        class StoreStockMovementAfwStructure
        {
                // token separator = §
                public static function initInstance(&$obj)
                {
                        if ($obj instanceof StockMovement ) 
                        {
                                $obj->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                                $obj->DISPLAY_FIELD_BY_LANG = ['ar'=>"", 'en'=>""];
                                
                                // $obj->ENABLE_DISPLAY_MODE_IN_QEDIT=true;
                                $obj->ORDER_BY_FIELDS = "mstore_id, invoice_id, row_num";
                                 
                                
                                $obj->editByStep = true;
                                $obj->editNbSteps = 2; 
                                $obj->UNIQUE_KEY = array('mstore_id', 'invoice_id', 'row_num');
                                
                                $obj->showQeditErrors = true;
                                $obj->showRetrieveErrors = true;
                                $obj->general_check_errors = true;
                                // $obj->after_save_edit = array("class"=>'Road',"attribute"=>'road_id', "currmod"=>'btb',"currstep"=>9);
                                $obj->after_save_edit = array("mode"=>"qsearch", "currmod"=>'store', "class"=>'StockMovement',"submit"=>true);
                        }
                        else 
                        {
                                StockMovementArTranslator::initData();
                                StockMovementEnTranslator::initData();
                        }
                }
                
                
                public static $DB_STRUCTURE =  
     array(
                'id' => array('SHOW' => true, 'RETRIEVE' => true, 'EDIT' => false, 'TYPE' => 'PK'),

                'mstore_id' => array('SHORTNAME' => 'mstore',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => true,  
				'EDIT' => true,  'QEDIT' => false,  
				'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'mstore',  'ANSMODULE' => 'store',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'DNA' => true, 
				'CSS' => 'width_pct_50', ),

                'invoice_id' => array('SHORTNAME' => 'invoice',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => false,  
				'EDIT' => true,  'QEDIT' => true,  
				'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'invoice',  'ANSMODULE' => 'store',  
				'RELATION' => 'OneToMany',  'READONLY' => false,  'DNA' => true, 
				'CSS' => 'width_pct_50', ),

		
                                'stock_sens_enum' => array('SHORTNAME' => 'sens',  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => true,  
                                                'EDIT' => true,  'QEDIT' => true,  
                                                'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'UTF8' => false,  
                                                'TYPE' => 'ENUM',  'ANSWER' => 'FUNCTION',  'READONLY' => false,  'DNA' => true, 
                                                'CSS' => 'width_pct_50', ),

                                'movement_date' => array('SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => true,  
                                                'EDIT' => true,  'QEDIT' => true,  
                                                'SIZE' => 10,  'MAXLENGTH' => 10,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'FORMAT' => 'HIJRI_UNIT',  'UTF8' => false,  
                                                'TYPE' => 'DATE',  'READONLY' => false,  'DNA' => true, 
                                                'CSS' => 'width_pct_50', ),

                                'customer_type_id' => array('SHORTNAME' => 'type',  'SEARCH' => true,  'QSEARCH' => true,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => false,  
                                                'EDIT' => true,  'QEDIT' => false,  
                                                'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'REQUIRED' => true,  'UTF8' => false,  
                                                'TYPE' => 'FK',  'ANSWER' => 'customer_type',  'ANSMODULE' => 'crm',  
                                                'RELATION' => 'ManyToOne',  'READONLY' => false,  'DNA' => true, 
                                                'CSS' => 'width_pct_50', ),

                                'customer_id' => array('SHORTNAME' => 'customer',  
                                                'WHERE' => "customer_type_id = §customer_type_id§", 
                                                'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => false,  
                                                'EDIT' => true,  'QEDIT' => false,  
                                                'SIZE' => 32,  'MAXLENGTH' => 32,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'MANDATORY' => true,  'UTF8' => false,  
                                                'TYPE' => 'FK',  'ANSWER' => 'crm_customer',  'ANSMODULE' => 'crm',  'AUTOCOMPLETE' => true,  
                                                'RELATION' => 'OneToMany',  'READONLY' => true,  'DNA' => true, 
                                                'CSS' => 'width_pct_50', ),

                'row_num' => array(
                        'IMPORTANT' => 'IN',
                        'SHOW' => true,
                        'RETRIEVE' => true,
                        'QEDIT' => true, 'READONLY'=>true,
                        'EDIT' => true, 
                        'TYPE' => 'INT', 'MANDATORY' => false, 
                        'STEP' => 1,
                        'DISPLAY-UGROUPS' => '',
                        'EDIT-UGROUPS' => '',
                        'CSS' => 'width_pct_50',),

                'good_id' => array('SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => true,  
				'EDIT' => true,  'QEDIT' => true,  
				'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'good',  'ANSMODULE' => 'store',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'DNA' => true, 
				'CSS' => 'width_pct_50', ),

		'store_id' => array('SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => true,  
				'EDIT' => true,  'QEDIT' => false,  
				'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'store',  'ANSMODULE' => 'store',  
				'RELATION' => 'ManyToOne',  'READONLY' => false,  'DNA' => true, 
				'CSS' => 'width_pct_50', ),

		'expiring_date' => array('SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => true,  
				'EDIT' => true,  'QEDIT' => true,  
				'SIZE' => 10,  'MAXLENGTH' => 10,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'UTF8' => false,  
				'TYPE' => 'DATE',  'FORMAT' => 'HIJRI_UNIT',  'READONLY' => false,  'DNA' => true, 
				'CSS' => 'width_pct_50', ),

                        'good_stock_id' => array('SHORTNAME' => 'stock',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => true,  
                                        'EDIT' => true,  'QEDIT' => false,  'STEP' => 99, 
                                        'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'UTF8' => false,  
                                        'TYPE' => 'FK',  'ANSWER' => 'good_stock',  'ANSMODULE' => 'store',  
                                        'RELATION' => 'OneToMany',  'READONLY' => true,  'DNA' => true, 
                                        'CSS' => 'width_pct_50', ),                                                 

		

		'bu_quantity' => array('SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => false,  
				'EDIT' => true,  'QEDIT' => false,  
				'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => false,  'DNA' => true, 
				'CSS' => 'width_pct_50', ),

		'su_quantity' => array('SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => false,  
				'EDIT' => true,  'QEDIT' => false,  
				'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'UTF8' => false,  
				'TYPE' => 'INT',  'READONLY' => false,  'DNA' => true, 
				'CSS' => 'width_pct_50', ),

		'bu_price' => array('SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => false,  
				'EDIT' => true,  'QEDIT' => false,  
				'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'AMNT',  'READONLY' => false,  'DNA' => true, 
				'CSS' => 'width_pct_50', ),

		'su_price' => array('SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => false,  
				'EDIT' => true,  'QEDIT' => false,  
				'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'MANDATORY' => true,  'UTF8' => false,  
				'TYPE' => 'AMNT',  'READONLY' => false,  'DNA' => true, 
				'CSS' => 'width_pct_50', ),

		        'parent_stock_movement_id' => array('SHORTNAME' => 'parent',  'SEARCH' => true,  'QSEARCH' => false,  'SHOW' => true,  'AUDIT' => false,  'RETRIEVE' => false,  
				'EDIT' => true,  'QEDIT' => true,  
				'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'UTF8' => false,  
				'TYPE' => 'FK',  'ANSWER' => 'stock_movement',  'ANSMODULE' => 'store',  
				'RELATION' => 'OneToMany',  'READONLY' => false,  'DNA' => true, 
				'CSS' => 'width_pct_50', ),

		                               

		

			'stockMovementList' => array('SHORTNAME' => 'stockMovements',  'SHOW' => true,  'FORMAT' => 'retrieve',  'ICONS' => true,  'DELETE-ICON' => true,  'BUTTONS' => true,  'SEARCH' => false,  'QSEARCH' => false,  'AUDIT' => false,  'RETRIEVE' => false,  
				'EDIT' => false,  'QEDIT' => false,  
				'SIZE' => 32,  'MAXLENGTH' => 32,  'MIN-SIZE' => 1,  'CHAR_TEMPLATE' => "ALPHABETIC,SPACE",  'MANDATORY' => false,  'UTF8' => false,  
				'TYPE' => 'FK', 'STEP' => 2,  
				'CATEGORY' => 'ITEMS',  'ANSWER' => 'stock_movement',  'ANSMODULE' => 'store',  'ITEM' => 'parent_stock_movement_id',  'READONLY' => true,  'CAN-BE-SETTED' => true, 
				'CSS' => 'width_pct_50', ),

                
                'created_by'         => array('STEP' =>99, 'HIDE_IF_NEW' => true, 'SHOW' => true, "TECH_FIELDS-RETRIEVE" => true, 'RETRIEVE' => false,  'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'FK', 'ANSWER' => 'auser', 'ANSMODULE' => 'ums', 'FGROUP' => 'tech_fields'),
                'created_at'         => array('STEP' =>99, 'HIDE_IF_NEW' => true, 'SHOW' => true, "TECH_FIELDS-RETRIEVE" => true, 'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'DATETIME', 'FGROUP' => 'tech_fields'),
                'updated_by'         => array('STEP' =>99, 'HIDE_IF_NEW' => true, 'SHOW' => true, "TECH_FIELDS-RETRIEVE" => true, 'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'FK', 'ANSWER' => 'auser', 'ANSMODULE' => 'ums', 'FGROUP' => 'tech_fields'),
                'updated_at'         => array('STEP' =>99, 'HIDE_IF_NEW' => true, 'SHOW' => true, "TECH_FIELDS-RETRIEVE" => true, 'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'DATETIME', 'FGROUP' => 'tech_fields'),
                'validated_by'       => array('STEP' =>99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'FK', 'ANSWER' => 'auser', 'ANSMODULE' => 'ums', 'FGROUP' => 'tech_fields'),
                'validated_at'       => array('STEP' =>99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'DATETIME', 'FGROUP' => 'tech_fields'),
                'active'             => array('STEP' =>99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'EDIT' => false, 'QEDIT' => false, "DEFAULT" => 'Y', 'TYPE' => 'YN', 'FGROUP' => 'tech_fields'),
                'version'            => array('STEP' =>99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'INT', 'FGROUP' => 'tech_fields'),
                'draft'             => array('STEP' =>99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'EDIT' => false, 'QEDIT' => false, "DEFAULT" => 'Y', 'TYPE' => 'YN', 'FGROUP' => 'tech_fields'),
                'update_groups_mfk' => array('STEP' =>99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 'ANSWER' => 'ugroup', 'ANSMODULE' => 'ums', 'TYPE' => 'MFK', 'FGROUP' => 'tech_fields'),
                'delete_groups_mfk' => array('STEP' =>99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 'ANSWER' => 'ugroup', 'ANSMODULE' => 'ums', 'TYPE' => 'MFK', 'FGROUP' => 'tech_fields'),
                'display_groups_mfk' => array('STEP' =>99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 'ANSWER' => 'ugroup', 'ANSMODULE' => 'ums', 'TYPE' => 'MFK', 'FGROUP' => 'tech_fields'),
                'sci_id'            => array('STEP' =>99, 'HIDE_IF_NEW' => true, 'SHOW' => true, 'RETRIEVE' => false, 'QEDIT' => false, 'TYPE' => 'FK', 'ANSWER' => 'scenario_item', 'ANSMODULE' => 'ums', 'FGROUP' => 'tech_fields'),
                'tech_notes' 	      => array('STEP' =>99, 'HIDE_IF_NEW' => true, 'TYPE' => 'TEXT', 'CATEGORY' => 'FORMULA', "SHOW-ADMIN" => true, 'TOKEN_SEP'=>"§", 'READONLY' =>true, "NO-ERROR-CHECK"=>true, 'FGROUP' => 'tech_fields'),
	);  
    
         }
    


// errors 

