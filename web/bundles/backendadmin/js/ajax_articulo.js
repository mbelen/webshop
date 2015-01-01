$('#backend_adminbundle_articulo_marca').on('change', function() {
 
 var path=$("#backend_adminbundle_articulo_marca").data("url");
 
          var dataString = "marca="+$("#backend_adminbundle_articulo_marca").val();
                   
          $.ajax({
              type: "GET",
              url: path,
              dataType: 'json',
              data: dataString,
            })
            .done(function(data){
                if(!data.modelo){
					$('#backend_adminbundle_articulo_modelo').html("No hay modelos para esa marca");					
                }
                else{
					console.log(data.id);
					console.log(data.modelos);
					//('#crear').removeAttr("disabled");	
					$('#backend_adminbundle_articulo_modelo').html(data.modelo);
					//$('#backend_adminbundle_canje_productoNuevo').val(data.id);
				}       
                 
            })
            .always(function(){
                //$("#validar").removeAttr('disabled');
                //$('#backend_adminbundle_articulo_modelo').html("hola");
                //$('#backend_adminbundle_articulo_modelo').html(data.modelo);
            });
                        
});

