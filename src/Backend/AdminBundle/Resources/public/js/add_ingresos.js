var j = 0;

var ordenId;

function guardarArticulo(){
	
	

	
	
}

function agregarOtro(){
	
  $('#productos').show();
 
  var nuevoBlock = $('<div class="prods" id="prods_' + j +'"></div>');
  //var lblCant = document.createElement('label')
  //lblCant.innerHTML = "Cantidad";
  
  var nuevoArticulo = $('<div class="producto_nuevo"></div>');
  
  var lblCant = $('<div class="label_producto">Cantidad</div>');
  
  var cantidad = $('<input type="text" class= "input_producto"  id= "cantidad_'+j+'" name="cantidad_'+j+'">');
 
/* 
  var lblMarca = document.createElement('label')
  lblMarca.innerHTML = "Marca"; 
*/ 
  
  var lblMarca = $('<div class="label_producto">Marca</div>');
      
  var nuevaMarca = $('<div><select class="marca_select" id="marca_'+j+'" name="marca_'+j+'"><option value="0">Seleccione marca</option><option value="1">Alcatel</option><option value="2">Huawei</option></select></div>');
    
/*    
  var lblModelo = document.createElement('label')
  lblModelo.innerHTML = "Modelo"; 
*/  
  var lblModelo = $('<div class="label_producto">Modelo</div>');
  	
  var nuevoModelo = $('<div class="modelo_select"><select id="modelo_'+j+'"><option value="0">Seleccione modelo</option></select></div>');
	
  
  var nuevoBoton = $('<div><input type="button" class="btn_agregar" id= "'+j+'" name="agregar" value="agregar"></div>');

  var nuevoEliminar = $('<div><input type="button" class="btn_eliminar" id= "'+j+'" name="eliminar" value="eliminar"></div>');
	

  
  nuevoArticulo.append(lblCant);
  
  nuevoArticulo.append(cantidad);  
    
  nuevoArticulo.append(lblMarca);
  
  nuevoArticulo.append(nuevaMarca);
  
  nuevoArticulo.append(lblModelo);
  
  nuevoArticulo.append(nuevoModelo);  
  
  nuevoArticulo.append(nuevoBoton);  
  
  nuevoArticulo.append(nuevoEliminar); 
    
  $('#productos').append(nuevoArticulo);  	

  j++;
  console.log(j);
  
  $('.marca_select').change(function () {
  
      var id = $(this).attr('id');
	
	  console.log("id:"+id+"value:"+$(this).val());
	  
	  var modeloId = id.replace('marca_','modelo_')
		  	 		   
	  var path = "/prexey2/web/app_dev.php/panel/ordenIngreso/togeneratecombo";
				
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
							 //console.log("id:"+value.id+" nombre:"+value.nombre);
						   });
					    }					
				
				
				});            
         })
  
  
  
  
$('.btn_agregar').click(function(){
	
	//var base_path = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
	$("#sucess").html("");
		
	var path = "/prexey2/web/app_dev.php/panel/ordenIngreso/toprocesadoingresos";
	
	var id = $(this).attr('id');
	
	console.log(id);
	
	console.log("valor: "+$('#cantidad_'+id).val());
	
	if($('#cantidad_'+id).val() == ""){ 
		
		$('#errores').html("Debe ingresar una cantidad");
		
	
	}else{		 
	
	    $('#errores').html("");
	
		var params = {
			
			'orden': ordenId,
			'cantidad':	$('#cantidad_'+id).val(),
			'marca': 	$('#marca_'+id).val(),	
			'modelo': 	$('#modelo_'+id).val()
		};
		
		console.log(params);
		
		$.ajax({
					dataType: 'json',
					data:  params,
					url:   path,
					type:  'post',
					})
					.done(function (data) {
								
						  if(data.resultado){						  
																
							$("#sucess").html("Se agrego correctamente");	                  
						  
							agregarOtro();
						  
						  }
					})
					.always(function(){
						
						//agregarOtro();
						  
						$('#crear').show();							
						
					});	
			
	 } 	

	});
}


$(document).ready(function(){


	$('#productos').hide();
	$('#crear').hide();
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

  console.log(path);	
  
  if($('#backend_adminbundle_ordenIngreso_documento').val().length <= 1){
	
	$('#backend_adminbundle_ordenIngreso_documento_errorloc').html("Es un campo obligatorio");  
	 
  }else{  
	  
	  $('#backend_adminbundle_ordenIngreso_documento_errorloc').html("");

	  var parametros = {
					"cliente" : $('#backend_adminbundle_ordenIngreso_cliente').val(),
					"documento" : $('#backend_adminbundle_ordenIngreso_documento').val(),
					"operador" : $('#backend_adminbundle_ordenIngreso_operador').val(),
					"observaciones" : $('#backend_adminbundle_ordenIngreso_observaciones').val()
		  };
		  
		  $.ajax({
					dataType: 'json',
					data:  parametros,
					url:   path,
					type:  'post',
					})
					.done(function (data) {
						
						console.log(data.resultado);
											
						 if(!data.resultado){				  					
						  
							alert("Se ha generado un error al cargar la orden de ingreso");
							$("#respuesta").html("Se ha generado un error al cargar la orden de ingreso"); 
						 
						 }else{
							 
							console.log("ID:"+data.id); 
							ordenId = data.id;
							console.log("orden"+ordenId); 
							alert("Se ha generado la orden de ingreso");
							$("#agregar").hide();
						 
						 }                  
						  
					})
					.always(function(){					
							
						//$("#agregar").hide();
						
				});
				
		
	  agregarOtro();
}
             
});
