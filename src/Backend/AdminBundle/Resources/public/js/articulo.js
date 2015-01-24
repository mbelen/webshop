$("#todos").on("click",function(){
    if($(this).is(':checked')) {
        $("#table_articulos").find("input:checkbox").prop('checked', 'checked');
    }else{
        $("#table_articulos").find("input:checkbox").removeAttr('checked');
    }

});

$("#cambiar").on("click",function(){
      if ($("#estado").val() != 0){
          var ids='';
          var path=$(this).data("url");
          var estado=$("#estado").val();
          var coma='';
        $("#table_articulos").find("input:checkbox").each(function(){
        
          if ($(this).is(":checked")){
            ids= ids + coma +$(this).val();
            coma=",";
           }
           
        
        });
        $.ajax({
					dataType: 'json',
					data:  {'ids':ids, 'estado':estado},
					url:   path,
					type:  'post',
					})
					.done(function (data) {
	             if (data.msg != ''){
                  alert(data.msg);
               }else{
                  alert("Se han actualizado los estados");
                  location.reload();
               }		      
               
  	     });
      }else{
        alert("Debe seleccionar un estado");
      }
});