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
     var path = $(this).data("url");
     $(this).prop("disabled",true);
		 var garantia=0;
     if ($("#garantia_"+id).is(":checked"))
    		   garantia=1;
     var dataString= {'marca':$("#marca_"+id).val(),'modelo':$("#modelo_"+id).val(),'imei':$("#imei_"+id).val(),'estado':$("#estado_"+id).val(),'garantia':garantia};
     var self=$(this);
     
		$.ajax({
					dataType: 'json',
					data:  dataString,
					url:   path,
					type:  'post',
					})
					.done(function (data) {
					  if (data.mensaje != ''){
              alert("error no se grabo");
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