var j = 0;

function agregarProducto(){
	
	$('#productos').show();
 
  var nuevoBlock = $('<div class="prods" id="prods_' + j +'"></div>');
  var lblCant = document.createElement('label')
  lblCant.innerHTML = "Cantidad";
  var cantidad = $('<input type="text" class= "input-large"  id= "cantidad_'+j+'" name="cantidad_'+j+'">');
  var lblMarca = document.createElement('label')
  lblMarca.innerHTML = "Marca"; 
  
  var nuevoBoton = $('<input type="button" class="btn_agregar" id= "agregar_'+j+'" name="agregar" value="agregar">');
    
  $('#productos').append(lblCant);

  $('#productos').append(cantidad);
  
  $('#productos').append(lblMarca);
  
  $('#productos').append(nuevoBoton);
  	

  j++;
  console.log(j);
  
  $('.btn_agregar').click(function(){
	
	var id = $(this).attr('id'); 
	
	console.log('id boton'+id);
	
	agregarProducto();
 
  });	

}


$(document).ready(function(){


	$('#productos').hide();
	/*
	$('#backend_adminbundle_ordenIngreso_cantidad').hide();
	$('#cantidad_label').hide();
	$('#backend_adminbundle_ordenIngreso_marca').hide();
	$('#marca_label').hide();	
	$('#backend_adminbundle_ordenIngreso_modelo').hide();
	$('#modelo_label').hide();	
	*/
	
});
	
$("#agregar").click(function() {
	
  var path=$("#agregar").data("url");	
	
  var parametros = {
                "cliente" : $('#backend_adminbundle_ordenIngreso_cliente').val(),
                "documento" : $('#backend_adminbundle_ordenIngreso_documento').val()
      };
	  
	  $.ajax({
				dataType: 'json',
				data:  parametros,
	            url:   'path',
	            type:  'post',
	            })
	            .done(function (data) {
										  					
	                  $("#respuesta").html("Se agrego la orden de ingreso");
	            })
	            .always(function(){
					
					alert(data.resultado);	
					
					$("#agregar").hide();
            });
	  		
	
  agregarProducto();

/*
 var path=$("#agregar").data("url");
 
          var dataString = "imeiNuevo="+$("#backend_adminbundle_canje_imeiNuevo").val();
                   
          $.ajax({
              type: "GET",
              url: path,
              dataType: 'json',
              data: dataString,
            })
            .done(function(data){
                if(!data.modelo){
					$('#backend_adminbundle_imeiNuevo_errorloc').html("El imei no corresponde a un equipo disponible");					
                }
                else{
					console.log(data.id);
					console.log(data.modelo);
					$('#crear').removeAttr("disabled");	
					$('#backend_adminbundle_canje_modeloNuevo').html(data.modelo);
					$('#backend_adminbundle_canje_productoNuevo').val(data.id);
				}       
                 
            })
            .always(function(){
                $("#validar").removeAttr('disabled');
            });
 */                       
});
