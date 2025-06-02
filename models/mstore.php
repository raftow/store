<?php


$file_dir_name = dirname(__FILE__);

// require_once("$file_dir_name/../afw/afw.php");

class Mstore extends AFWObject
{

    public static $MY_ATABLE_ID = 14044;
    // إحصائيات مغازات 
    public static $BF_STATS_MSTORE = 104955;
    // إدارة مغازات 
    public static $BF_QEDIT_MSTORE = 104950;
    // إنشاء  
    public static $BF_EDIT_MSTORE = 104949;
    // البحث في مغازات 
    public static $BF_SEARCH_MSTORE = 104953;
    // عرض تفاصيل  
    public static $BF_DISPLAY_MSTORE = 104952;
    // مسح  
    public static $BF_DELETE_MSTORE = 104951;
    // مغازات 
    public static $BF_QSEARCH_MSTORE = 104954;

    public static $DATABASE        = "store";
    public static $MODULE                = "store";
    public static $TABLE            = "mstore";

    public static $DB_STRUCTURE = null;

    public function __construct()
    {
        parent::__construct("mstore", "id", "store");
        StoreMstoreAfwStructure::initInstance($this);
    }

    public static function loadById($id)
    {
        $obj = new Mstore();
        $obj->select_visibilite_horizontale();
        if ($obj->load($id)) {
            return $obj;
        } else return null;
    }

    public static function loadByMainIndex($lookup_code, $create_obj_if_not_found = false)
    {
        if (!$lookup_code) throw new AfwRuntimeException("loadByMainIndex : lookup_code is mandatory field");


        $obj = new Mstore();
        $obj->select("lookup_code", $lookup_code);

        if ($obj->load()) {
            if ($create_obj_if_not_found) $obj->activate();
            return $obj;
        } elseif ($create_obj_if_not_found) {
            $obj->set("lookup_code", $lookup_code);

            $obj->insertNew();
            if (!$obj->id) return null; // means beforeInsert rejected insert operation
            $obj->is_new = true;
            return $obj;
        } else return null;
    }



    public static function loadByOrgunitId($orgunit_id)
    {
        $create_obj_if_not_found = false;
        if (!$orgunit_id) throw new AfwRuntimeException("loadByMainIndex : orgunit_id is mandatory field");


        $obj = new Mstore();
        $obj->select("orgunit_id", $orgunit_id);

        if ($obj->load()) {
            if ($create_obj_if_not_found) $obj->activate();
            return $obj;
        } elseif ($create_obj_if_not_found) {
            $obj->set("orgunit_id", $orgunit_id);

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


    public function getDisplay($lang = "ar")
    {
        return $this->getVal("name_$lang");
    }





    protected function getOtherLinksArray($mode, $genereLog = false, $step = "all")
    {
        global $lang;
        // $objme = AfwSession::getUserConnected();
        // $me = ($objme) ? $objme->id : 0;

        $otherLinksArray = $this->getOtherLinksArrayStandard($mode, $genereLog, $step);
        $my_id = $this->getId();
        $orgunit_id = $this->getVal("orgunit_id");
        $displ = $this->getDisplay($lang);

        if ($mode == "mode_allEmployeeList") {
            unset($link);
            $link = array();
            $title = "إضافة موظف ";
            $title_detailed = $title . "لـ : " . $displ;
            $link["URL"] = "main.php?Main_Page=afw_mode_edit.php&cl=StoreEmployee&currmod=store&sel_orgunit_id=$orgunit_id";
            $link["TITLE"] = $title;
            $link["TARGET"] = "newEmployee";
            $link["PUBLIC"] = true;
            $link["UGROUPS"] = array();
            $link['ATTRIBUTE_WRITEABLE'] = 'allEmployeeList';
            $otherLinksArray[] = $link;
        }

        // check errors on all steps (by default no for optimization)
        // rafik don't know why this : \//  = false;

        return $otherLinksArray;
    }

    protected function getPublicMethods()
    {

        $pbms = array();

        $color = "green";
        $title_ar = "احداث/تحديث عنصر الموارد البشرية";
        $methodName = "updateOrgunit";
        $pbms[AfwStringHelper::hzmEncode($methodName)] = array("METHOD" => $methodName, "COLOR" => $color, "LABEL_AR" => $title_ar, "PUBLIC" => true, "BF-ID" => "", 'STEP' => 1);



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


    public function updateOrgunit($lang = "ar")
    {
        $hrm_code = $this->getVal("lookup_code");
        if (!$hrm_code) return ["please define sale point code before and if the organization is already in HRM system use the same hrm-code to avoid create a duplicated orgunit"];

        $parent_orgunit_id = 1;
        // $UnitManager = self::loadUnitManager();
        $id_sh_org = 1;
        $id_sh_type = OrgunitType::$ORGUNIT_TYPE_FIRM;

        $id_domain = Domain::$DOMAIN_CRM;

        $titre_short_ar = $titre_ar = $this->getVal("name_ar");
        $titre_short_en = $titre_en = $this->getVal("name_en");
        $orgunitObj = Orgunit::findOrgunit(
            $id_sh_type,
            $id_sh_org,
            $hrm_code,
            $titre_short_ar,
            $titre_ar,
            $titre_short_en,
            $titre_en,
            $id_domain,
            $hrm_crm = "crm",
            $create_obj_if_not_found = false
        );
        if (!$orgunitObj) {
            $orgunitObj = Orgunit::findOrgunit(
                $id_sh_type,
                $id_sh_org,
                $hrm_code,
                $titre_short_ar,
                $titre_ar,
                $titre_short_en,
                $titre_en,
                $id_domain,
                $hrm_crm = "hrm",
                $create_obj_if_not_found = true
            );
        }

        $orgunitObj->set("gender_id", 1);
        $orgunitObj->set("id_sh_parent", $parent_orgunit_id);
        // $orgunitObj->set("addresse", $this->getVal("adress")); 
        // $city_id = $this->getVal("city_id");
        // if ($city_id > 0) $city_name = $this->get("city_id")->getDisplay($lang);
        // else $city_name = "";
        // $orgunitObj->set("city_name", $city_name);
        // $orgunitObj->set("cp", $this->getVal("postal_code"));
        // $orgunitObj->set("quarter", $this->getVal("quarter"));
        $orgunitObj->commit();
        $this->set("orgunit_id", $orgunitObj->getId());
        $this->commit();
    }

    public function beforeDelete($id, $id_replace)
    {
        $server_db_prefix = AfwSession::config("db_prefix", "tvtc_");

        if (!$id) {
            $id = $this->getId();
            $simul = true;
        } else {
            $simul = false;
        }

        if ($id) {
            if ($id_replace == 0) {
                // FK part of me - not deletable 


                // FK part of me - deletable 


                // FK not part of me - replaceable 



                // MFK

            } else {
                // FK on me 


                // MFK


            }
            return true;
        }
    }
}



// errors 
