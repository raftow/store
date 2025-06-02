function stock_sens_enum_onchange() 
{
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

}


function newold_enum_onchange()
{
    $("#header_group_old_customer").addClass("hide");
    $("#body_group_old_customer").addClass("hide");
    $("#header_group_new_customer").addClass("hide");
    $("#body_group_new_customer").addClass("hide");


    if($("#newold_enum").val()==1) // جديد
    {
        $("#header_group_new_customer").removeClass("hide");
        $("#body_group_new_customer").removeClass("hide");
    }
    
    if($("#newold_enum").val()==2) // سابق
    {
        $("#header_group_old_customer").removeClass("hide");
        $("#body_group_old_customer").removeClass("hide");
    }

    if($("#newold_enum").val()==3) // لا يوجد
    {
        alert('لهذا النوع من الفواتير اخيار عميل سابق أو جديد إلزامي')
    }

    if($("#newold_enum").val()==4) // عابر
    {
        $("#header_group_old_customer").removeClass("hide");
        $("#body_group_old_customer").removeClass("hide");

        $("#customer_id_atc").val("عابر");
        $("#customer_id").val("عابر");
    }

    
}