function limpiarSelect(idselect) {
    $('#' + idselect + ' option').each(function(index, option) {
        if (index !== '' && index !== 0) {
            $(option).remove();
        }
    });
}

$(document).ready(function() {

$("#backend_adminbundle_parte_marca").change(function() {
    var option = $("#backend_adminbundle_parte_marca option:selected").val();
    //eliminar todas las opciones de la zona
    limpiarSelect("backend_adminbundle_parte_modelo");
  
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
                    $('#backend_adminbundle_parte_modelo')
                            .append($('<option>', {value: data[i].id})
                            .text(data[i].name));
                });
            }
        });
    }
});
});

$(document).ready(function() {
		var validator = $("#tab").validate({
		
			rules: {                 
				"backend_adminbundle_parte[codigo]": {
					required:true,
				},
        "backend_adminbundle_parte[nombre_fabricante]": {
					required:true,
					minlength:2,
					
				},
        "backend_adminbundle_parte[nombre_interno]": {
					required:true,
					minlength:2,
				}
        
        
			},
			
			 messages: {
            "backend_adminbundle_parte[codigo]": {
            minlength: jQuery.format("Mínimo {0} carácteres!")
            },
            "backend_adminbundle_parte[nombre_fabricante]": {
            minlength: jQuery.format("Mínimo {0} carácteres!")
            },
            "backend_adminbundle_parte[nombre_interno]": {
            minlength: jQuery.format("Mínimo {0} carácteres!")
            },
      },
      
      errorPlacement: function(error, element) {
             
            	error.appendTo( element.next() );
        }
			
		});
		
	});





