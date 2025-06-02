<?php
if(!class_exists("AfwSession")) die("Denied access");

$server_db_prefix = AfwSession::config("db_prefix", "default_db_");

$migration_info .= " " . Atable::generateTablePrevileges($moduleId, 'invoice', 202, "+t", "qsearch", null);


AfwDatabase::db_query("INSERT INTO ".$server_db_prefix."crm.`crm_customer` (`id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `validated_by`, `validated_at`, `active`, `version`, `update_groups_mfk`, `delete_groups_mfk`, `display_groups_mfk`, `sci_id`, `gender_id`, `mobile`, `email`, `idn_type_id`, `idn`, `customer_type_id`, `customer_orgunit_id`, `ref_num`, `first_name_ar`, `father_name_ar`, `last_name_ar`, `phone`, `first_name_en`, `father_name_en`, `last_name_en`, `region_id`, `city_id`, `other_city`, `lang_id`, `hijri`, `last_request_date`, `service_satisfied`, `pb_resolved`) VALUES ('1', '1', '2025-05-07 14:14:25.000000', '1', '2025-05-07 14:14:25.000000', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, '1', '0500000001', 'transient@company.com', '1', '1000000001', '8', NULL, '11111', 'عابر', NULL, 'سبيل', NULL, NULL, NULL, 'transient', NULL, NULL, NULL, NULL, NULL, NULL, 'Y', 'Y');");

AfwDatabase::db_query("INSERT INTO ".$server_db_prefix."crm.`customer_type` (`id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `validated_by`, `validated_at`, `active`, `version`, `update_groups_mfk`, `delete_groups_mfk`, `display_groups_mfk`, `sci_id`, `lookup_code`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `internal`, `org_ar`, `org_en`, `ref_ar`, `ref_en`, `module_mfk`) VALUES
(7, 1, '2025-05-04 15:08:36', 1, '2025-05-04 15:10:31', 0, NULL, 'Y', 3, '', '', '', NULL, 'PROV', 'مزود', 'Provider', '', '', 'N', 'مزود', 'Provider', 'مزود', 'Provider', ',1285,'),
(8, 1, '2025-05-04 15:11:56', 1, '2025-05-04 15:11:56', 0, NULL, 'Y', 1, ',', ',', ',', NULL, 'BUYER', 'مشتري', 'Buyer', 'مشتري', 'Buyer', 'Y', 'مشتري', 'Buyer', 'مشتري', 'Buyer', ',1285,'),
(9, 1, '2025-05-04 15:11:56', 1, '2025-05-04 15:11:56', 0, NULL, 'Y', 1, ',', ',', ',', NULL, 'NONE', 'لا يوجد عميل', 'No customer', 'لا يوجد عميل', 'No customer', 'Y', 'لا يوجد عميل', 'No customer', 'لا يوجد عميل', 'No customer', ',1285,');");