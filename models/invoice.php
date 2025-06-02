<?php


$file_dir_name = dirname(__FILE__);

// require_once("$file_dir_name/../afw/afw.php");

class Invoice extends StoreObject
{

    public static $STOCK_SENS_BUY = 1;
    public static $STOCK_SENS_SELL = 2;
    public static $STOCK_SENS_DESTUCT = 3;
    public static $STOCK_SENS_REFUND = 4;


    public static $CUSTOMER_TYPE_NONE = 9;
    public static $CUSTOMER_TYPE_BUYER = 8;
    public static $CUSTOMER_TYPE_PROVIDER = 7;
        

    public static $MY_ATABLE_ID = 14047;

    public static $DATABASE        = "store";
    public static $MODULE                = "store";
    public static $TABLE            = "invoice";

    public static $DB_STRUCTURE = null;

    public function __construct()
    {
        parent::__construct("invoice", "id", "store");
        StoreInvoiceAfwStructure::initInstance($this);
    }

    public static function loadById($id)
    {
        $obj = new Invoice();
        $obj->select_visibilite_horizontale();
        if ($obj->load($id)) {
            return $obj;
        } else return null;
    }

    public static function loadByMainIndex($invoice_num, $create_obj_if_not_found = false)
    {
        if (!$invoice_num) throw new AfwRuntimeException("loadByMainIndex : invoice_num is mandatory field");


        $obj = new Invoice();
        $obj->select("invoice_num", $invoice_num);

        if ($obj->load()) {
            if ($create_obj_if_not_found) $obj->activate();
            return $obj;
        } elseif ($create_obj_if_not_found) {
            $obj->set("invoice_num", $invoice_num);

            $obj->insertNew();
            if (!$obj->id) return null; // means beforeInsert rejected insert operation
            $obj->is_new = true;
            return $obj;
        } else return null;
    }

    public function getScenarioItemId($currstep)
    {

        return 0;
    }


    public function getDisplay($lang = "ar") {}



    /*        public function list_of_stock_sens_enum() { 
            $list_of_items = array(); 
            $list_of_items[1] = "FUNCTION";  //     code : ... not defined ... 
           return  $list_of_items;
        } 


*/

    

    protected function getPublicMethods()
    {

        $pbms = array();

        $color = "green";
        $title_ar = "xxxxxxxxxxxxxxxxxxxx";
        $methodName = "mmmmmmmmmmmmmmmmmmmmmmm";
        //$pbms[AfwStringHelper::hzmEncode($methodName)] = array("METHOD"=>$methodName,"COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"", 'STEP' =>$this->stepOfAttribute("xxyy"));



        return $pbms;
    }

    public function fld_CREATION_USER_ID()
    {
        return "created_by";
    }

    public function fld_CREATION_DATE()
    {
        return "created_at";
    }

    public function fld_UPDATE_USER_ID()
    {
        return "updated_by";
    }

    public function fld_UPDATE_DATE()
    {
        return "updated_at";
    }

    public function fld_VALIDATION_USER_ID()
    {
        return "validated_by";
    }

    public function fld_VALIDATION_DATE()
    {
        return "validated_at";
    }

    public function fld_VERSION()
    {
        return "version";
    }

    public function fld_ACTIVE()
    {
        return  "active";
    }

    public function isTechField($attribute)
    {
        return (($attribute == "created_by") or ($attribute == "created_at") or ($attribute == "updated_by") or ($attribute == "updated_at") or ($attribute == "validated_by") or ($attribute == "validated_at") or ($attribute == "version"));
    }


    

    protected function getOtherLinksArray($mode, $genereLog = false, $step = "all")
    {
        global $lang;
        // $objme = AfwSession::getUserConnected();
        // $me = ($objme) ? $objme->id : 0;

        $otherLinksArray = $this->getOtherLinksArrayStandard($mode, $genereLog, $step);
        $my_id = $this->getId();
        $displ = $this->getDisplay($lang);

        if ($mode == "mode_stockMovementList") {
            unset($link);
            $link = array();
            $title = "إضافة سطر";
            $title_detailed = $title . "لـ : " . $displ;
            $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=StockMovement&currmod=store&sel_invoice_id=$my_id";
            $link["TITLE"] = $title;
            $link["UGROUPS"] = array();
            $otherLinksArray[] = $link;
        }



        // check errors on all steps (by default no for optimization)
        // rafik don't know why this : \//  = false;

        return $otherLinksArray;
    }

    public function attributeIsApplicable($attribute)
    {
        if(in_array($attribute,["invoice_date","invoice_num","total_amount", "tva_amount"])) return $this->id > 0;

        return true;
    }

    public function beforeDelete($id,$id_replace) 
        {
            $server_db_prefix = AfwSession::config("db_prefix","tvtc_");
            
            if(!$id)
            {
                $id = $this->getId();
                $simul = true;
            }
            else
            {
                $simul = false;
            }
            
            if($id)
            {   
               if($id_replace==0)
               {
                   // FK part of me - not deletable 
                       // store.stock_movement-الفاتورة	invoice_id  أنا تفاصيل لها (required field)
                        // require_once "../store/stock_movement.php";
                        $obj = new StockMovement();
                        $obj->where("invoice_id = '$id' and active='Y' and parent_stock_movement_id > 0");
                        $nbRecords = $obj->count();
                        // check if there's no record that block the delete operation
                        if($nbRecords>0)
                        {
                            $this->deleteNotAllowedReason = "Some records of this invoice is archived, so can't be deleted";
                            return false;
                        }
                        // if there's no record that block the delete operation perform the delete of the other records linked with me and deletable
                        if(!$simul) $obj->deleteWhere("invoice_id = '$id' and (active!='Y' or parent_stock_movement_id <= 0)");


                        
                   // FK part of me - deletable 

                   
                   // FK not part of me - replaceable 

                        
                   
                   // MFK

               }
               else
               {
                        // FK on me 
 

                        // store.stock_movement-الفاتورة	invoice_id  أنا تفاصيل لها (required field)
                        if(!$simul)
                        {
                            // require_once "../store/stock_movement.php";
                            StockMovement::updateWhere(array('invoice_id'=>$id_replace), "invoice_id='$id'");
                            // $this->execQuery("update ${server_db_prefix}store.stock_movement set invoice_id='$id_replace' where invoice_id='$id' ");
                            
                        } 
                        


                        
                        // MFK

                   
               } 
               return true;
            }    
	}

    public function beforeMaj($id, $fields_updated)
    {
        if($fields_updated["stock_sens_enum"])
        {
            if (($this->getVal("stock_sens_enum") == self::$STOCK_SENS_BUY) or 
                ($this->getVal("stock_sens_enum") == self::$STOCK_SENS_REFUND))
            {
                $this->set("customer_type_id", self::$CUSTOMER_TYPE_PROVIDER);
            }


            if (($this->getVal("stock_sens_enum") == self::$STOCK_SENS_SELL))
            {
                $this->set("customer_type_id", self::$CUSTOMER_TYPE_BUYER);
            }

            if (($this->getVal("stock_sens_enum") == self::$STOCK_SENS_DESTUCT))
            {
                $this->set("customer_type_id", self::$CUSTOMER_TYPE_NONE);
            }

        }

          
        /*

        if(($("#stock_sens_enum").val()==1) || ($("#stock_sens_enum").val()==4)) // شراء / استرجاع
        {
          $("#customer_type_id").val(7);
          $("#newold_enum").prop("disabled", false);
          $("#newold_enum").val(0);
        }


        
        if($("#stock_sens_enum").val()==2)  // بيع
        {
            $("#customer_type_id").val(8);
            $("#newold_enum").prop("disabled", false);
            $("#newold_enum").val(0);
        }    


        if($("#stock_sens_enum").val()==3) // اتلاف
        {
            $("#customer_type_id").val(9);
            $("#newold_enum").prop("disabled", true);
            $("#newold_enum").val(3);
            
        }

        */



        return true;
    }
}



// errors 
