<?php 

                
$file_dir_name = dirname(__FILE__); 
                
// require_once("$file_dir_name/../afw/afw.php");

class Store extends AFWObject{

        public static $MY_ATABLE_ID=14043; 
        // إحصائيات مخازن 
        public static $BF_STATS_STORE = 104962; 
        // إدارة مخازن 
        public static $BF_QEDIT_STORE = 104957; 
        // إنشاء  
        public static $BF_EDIT_STORE = 104956; 
        // البحث في مخازن 
        public static $BF_SEARCH_STORE = 104960; 
        // عرض تفاصيل  
        public static $BF_DISPLAY_STORE = 104959; 
        // مخازن 
        public static $BF_QSEARCH_STORE = 104961; 
        // مسح  
        public static $BF_DELETE_STORE = 104958; 
  
        public static $DATABASE		= "store";
        public static $MODULE		        = "store";        
        public static $TABLE			= "store";

	    public static $DB_STRUCTURE = null;
	
	    public function __construct(){
		parent::__construct("store","id","store");
            StoreStoreAfwStructure::initInstance($this);    
	    }
        
        public static function loadById($id)
        {
           $obj = new Store();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        

        public function getScenarioItemId($currstep)
                {
                    
                    return 0;
                }
        
        
        public function getDisplay($lang="ar")
        {
               return $this->getVal("name_$lang");
        }
        
        
        

        
        protected function getOtherLinksArray($mode,$genereLog=false,$step="all")      
        {
             global $lang;
             // $objme = AfwSession::getUserConnected();
             // $me = ($objme) ? $objme->id : 0;

             $otherLinksArray = $this->getOtherLinksArrayStandard($mode,$genereLog,$step);
             $my_id = $this->getId();
             $displ = $this->getDisplay($lang);
             
             
             
             // check errors on all steps (by default no for optimization)
             // rafik don't know why this : \//  = false;
             
             return $otherLinksArray;
        }
        
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
        
        public function isTechField($attribute) {
            return (($attribute=="created_by") or ($attribute=="created_at") or ($attribute=="updated_by") or ($attribute=="updated_at") or ($attribute=="validated_by") or ($attribute=="validated_at") or ($attribute=="version"));  
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

                        
                   // FK part of me - deletable 

                   
                   // FK not part of me - replaceable 
                       // store.good_stock-المخزن	store_id  غير معروفة
                        if(!$simul)
                        {
                            // require_once "../store/good_stock.php";
                            GoodStock::updateWhere(array('store_id'=>$id_replace), "store_id='$id'");
                            // $this->execQuery("update ${server_db_prefix}store.good_stock set store_id='$id_replace' where store_id='$id' ");
                        }

                        
                   
                   // MFK

               }
               else
               {
                        // FK on me 
                       // store.good_stock-المخزن	store_id  غير معروفة
                        if(!$simul)
                        {
                            // require_once "../store/good_stock.php";
                            GoodStock::updateWhere(array('store_id'=>$id_replace), "store_id='$id'");
                            // $this->execQuery("update ${server_db_prefix}store.good_stock set store_id='$id_replace' where store_id='$id' ");
                        }

                        
                        // MFK

                   
               } 
               return true;
            }    
	}
             
}



// errors 

