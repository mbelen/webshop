/*
function limpiarSelect(idselect) {
    $('#' + idselect + ' option').each(function(index, option) {
        if (index !== '' && index !== 0) {
            $(option).remove();
        }
    });
}

$(document).ready(function() {

$("#backend_adminbundle_articulo_marca").change(function() {
    var option = $("#backend_adminbundle_articulo_marca option:selected").val();
    //eliminar todas las opciones de la zona
    limpiarSelect("backend_adminbundle_articulo_modelo");
  
    if (option !== '')
    {
        var dataString = 'marca=' + option;
        var path = $(this).data('url');
        $.ajax({
            type: "POST",
            url: path,
            dataType: 'json',
            data: dataString,
            success: function(data) {
                $.each(data, function(i) {
                    $('#backend_adminbundle_articulo_modelo')
                            .append($('<option>', {value: data[i].id})
                            .text(data[i].name));
                });
            }
        });
    }
});
});
*/

$(document).ready(function() {
	
		var validator = $("#tab").validate({
		
			rules: {                 
				"backend_adminbundle_ordenIngreso[documento]": {
					required:true,
					minlength:2,
				},
				"backend_adminbundle_ordenIngreso[operador]": {
					required:true
				},
				"backend_adminbundle_ordenIngreso[cliente]": {
					required:true
				},
				"backend_adminbundle_ordenIngreso[observaciones]": {
					required:false,
					minlength:2,					
				}        
			},
			
			 messages: {
						"backend_adminbundle_ordenIngreso[documento]": {
						minlength: jQuery.format("Mínimo {0} carácteres!")
            },
						"backend_adminbundle_articulo[observacion]": {
						minlength: jQuery.format("Mínimo {0} carácteres!")
			},
      },
      
      errorPlacement: function(error, element) {
             
            	error.appendTo( element.next() );
        }
			
		});
		
	});
