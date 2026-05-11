<?php 

                
$file_dir_name = dirname(__FILE__); 
                
// require_once("$file_dir_name/../afw/afw.php");

class Gunit extends AFWObject{

        public static $MY_ATABLE_ID=14041; 
  
        public static $DATABASE		= "store";
        public static $MODULE		        = "store";        
        public static $TABLE			= "gunit";

	    public static $DB_STRUCTURE = null;
	
	    public function __construct(){
		parent::__construct("gunit","id","store");
            StoreGunitAfwStructure::initInstance($this);    
	    }
        
        public static function loadById($id)
        {
           $obj = new Gunit();
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
            $server_db_prefix = AfwSession::config("db_prefix","ttc_");
            
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
                       // store.good-وحدة القياس الصغيرة	small_unit_id  حقل يفلتر به (required field)
                        // require_once "../store/good.php";
                        $obj = new Good();
                        $obj->where("small_unit_id = '$id' and active='Y' ");
                        $nbRecords = $obj->count();
                        // check if there's no record that block the delete operation
                        if($nbRecords>0)
                        {
                            $this->deleteNotAllowedReason = "Used in some goods(s) as big measure unit";
                            return false;
                        }
                        // if there's no record that block the delete operation perform the delete of the other records linked with me and deletable
                        if(!$simul) $obj->deleteWhere("small_unit_id = '$id' and active='N'");

                       // store.good-وحدة القياس الكبيرة	big_unit_id  حقل يفلتر به (required field)
                        // require_once "../store/good.php";
                        $obj = new Good();
                        $obj->where("big_unit_id = '$id' and active='Y' ");
                        $nbRecords = $obj->count();
                        // check if there's no record that block the delete operation
                        if($nbRecords>0)
                        {
                            $this->deleteNotAllowedReason = "Used in some goods(s) as big measure unit";
                            return false;
                        }
                        // if there's no record that block the delete operation perform the delete of the other records linked with me and deletable
                        if(!$simul) $obj->deleteWhere("big_unit_id = '$id' and active='N'");


                        
                   // FK part of me - deletable 

                   
                   // FK not part of me - replaceable 

                        
                   
                   // MFK

               }
               else
               {
                        // FK on me 
 

                        // store.good-وحدة القياس الصغيرة	small_unit_id  حقل يفلتر به (required field)
                        if(!$simul)
                        {
                            // require_once "../store/good.php";
                            Good::updateWhere(array('small_unit_id'=>$id_replace), "small_unit_id='$id'");
                            // $this->execQuery("update ${server_db_prefix}store.good set small_unit_id='$id_replace' where small_unit_id='$id' ");
                            
                        } 
                        

 

                        // store.good-وحدة القياس الكبيرة	big_unit_id  حقل يفلتر به (required field)
                        if(!$simul)
                        {
                            // require_once "../store/good.php";
                            Good::updateWhere(array('big_unit_id'=>$id_replace), "big_unit_id='$id'");
                            // $this->execQuery("update ${server_db_prefix}store.good set big_unit_id='$id_replace' where big_unit_id='$id' ");
                            
                        } 
                        


                        
                        // MFK

                   
               } 
               return true;
            }    
	}
             
}



// errors 

