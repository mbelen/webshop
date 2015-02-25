$('.marca_select').change(function () {
  
    var id = $(this).attr('id');
	  var modeloId = id.replace('marca_','modelo_')
	  var path = $(this).data("url");
				
				$.ajax({
					dataType: 'json',
					data:  {'marca':$(this).val()},
					url:   path,
					type:  'post',
					})
					.done(function (data) {
						
						if(data.items!=null){
							
							$('#'+modeloId)
							.empty()
							.append('<option value="0">Seleccione modelo</option>')
							.find('option:first')
							.attr("selected","selected");
							
         					 $.each(data.items, function(i, value) {
						     $('#'+modeloId).append('<option value='+value.id+'>'+value.nombre+'</option>');
							 
						   });
					    }					
				
				
				});            
});

$(".save_imei").click(function(){
     var id=$(this).data("id");
     
     if ( $("#imei_"+id).val().length != 15){
       alert("El IMEI debe tener 15 carácteres"); 
       return false;
     }
     if ($("#marca_"+id).val() == 0 ){
        alert("Debe indicar una Marca");
        return false;
     }
     if ($("#modelo_"+id).val() == 0 ){
        alert("Debe indicar un Modelo");
        return false;
     }
     if ($("#estado_"+id).val() == 0 ){
        alert("Debe indicar un Estado");
        return false;
     }
     
     
     var path = $(this).data("url");
     $(this).prop("disabled",true);
		 var garantia=0;
     if ($("#garantia_"+id).is(":checked"))
    		   garantia=1;
     var orden= $(this).data("orden");      
     var dataString= {'marca':$("#marca_"+id).val(),'modelo':$("#modelo_"+id).val(),'imei':$("#imei_"+id).val(),'estado':$("#estado_"+id).val(),'garantia':garantia,'orden':orden};
     var self=$(this);
     
		$.ajax({
					dataType: 'json',
					data:  dataString,
					url:   path,
					type:  'post',
					})
					.done(function (data) {
					  if (data.mensaje != ''){
              alert(data.mensaje);
              self.prop("disabled",false);
            }else{
              self.hide();
              $("#marca_"+id).prop("disabled",true);
              $("#modelo_"+id).prop("disabled",true);
              $("#estado_"+id).prop("disabled",true);
              $("#imei_"+id).prop("disabled",true);
              $("#garantia_"+id).prop("disabled",true);
            }
            	
				
				});   

});

$("#finished").click(function(){
   window.location.href=$(this).data("url");

});         