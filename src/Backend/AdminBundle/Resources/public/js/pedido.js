$('.detail').on('click',function(){
	
	$('#pedido_detalle').toggle();
	//$('#table_pedido_detalle').toggle();
	
	var path = $(this).data('url');	
	var pedido = $(this).data('id');
	console.log(path);
	console.log("pedido:"+pedido);
	
	var params = { 'pedidoId': pedido };
	
	$.ajax({
                      type: "POST",
                      url: path,
                      dataType: 'json',
                      data: params,
                    })
                    .done(function(data){
																	
                        if(!data.resultados){
                    					$('#table_pedido_detalle').html(" ");
                    					alert("error");			
                    					//$('#pacientes').show();					
                    					$('#error').html("No hay pacientes con esos parametros");					
                        }
                        else{
                    					$('#table_pedido_detalle').html(" ");
                    					$('#table_pedido_detalle').show();					
                    					$('#table_pedido_detalle').append('<tr><th>Codigo de Fabricante</th><th>Descripcion del Fabricante</th><th>Descripcion Interna</th><th>Cantidad Pedida</th><th>Estado</th></tr>');

										$.each(data.resultados, function(i, item) {
                    						
                    						//var check = '<input type="checkbox" id="item_'+item.id+'" class="check_item" value="'+item.id+'">';
						
                    						
                    						$('#table_pedido_detalle').append('<tr><td>'+item.codigo+'</td><td>'+item.nameManufactured+'</td><td>'+item.name+'</td><td>'+item.cantidad+'</td><td>'+item.cantidad+'</td></tr>');
                    
                    					});
                    	}
                  
                  });  					
	
	
});


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
