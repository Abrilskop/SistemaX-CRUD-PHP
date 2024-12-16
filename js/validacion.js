
// Conversion a Mayusculas
function may(obj, id)
{
	obj=obj.toUpperCase();
	document.getElementById(id).value=obj;
}
//Llamar etiqueta select
$('select').material_select();
// validacion del nick de usuario
$('#nick').change(function() 
            {
                $.post('ajax_validacion_nick.php', 
                {
                    nick:$('#nick').val(),
                    beforeSend: function()
                                {
                                    $('.validacion').html("Espere un momento por fabor ...");
                                }
                }, 
                function(respuesta) 
                {
                    $('.validacion').html(respuesta);
                });
            });

// validacion del nombre del producto
$('#producto').change(function() 
                {
                    $.post('ajax_validacion_producto.php', 
                    {
                        producto:$('#producto').val(),
                        beforeSend: function()
                                    {
                                        $('.validacion').html("Espere un momento por favor ...");
                                    }
                    }, 
                    function(respuesta) 
                    {
                        $('.validacion').html(respuesta);
                    });
                });

// validacion del nombre del cliente
$('#nombre').change(function() 
{
    $.post('ajax_validacion_nombre.php', 
    {
        nombre:$('#nombre').val(),
        beforeSend: function()
                    {
                        $('.validacion').html("Espere un momento por favor ...");
                    }
    }, 
    function(respuesta) 
    {
        $('.validacion').html(respuesta);
    });
});


// validacion de la descripcion de la venta
$('#descripcion').change(function() 
{
    $.post('ajax_validacion_descripcion.php', 
    {
        descripcion:$('#descripcion').val(),
        beforeSend: function()
                    {
                        $('.validacion').html("Espere un momento por favor ...");
                    }
    }, 
    function(respuesta) 
    {
        $('.validacion').html(respuesta);
    });
});

// validacion del id del detalleventa
$('#detalleventa').change(function() 
{
    $.post('ajax_validacion_detalleventa.php', 
    {
        detalleventa:$('#detalleventa').val(),
        beforeSend: function()
                    {
                        $('.validacion').html("Espere un momento por favor ...");
                    }
    }, 
    function(respuesta) 
    {
        $('.validacion').html(respuesta);
    });
});

// Buscar el usuario
$('#buscar').keyup(function(event) {
    var contenido = new RegExp($(this).val(), 'i');
    $('tr').hide();
    $('tr').filter(function() {
        return contenido.test($(this).text());
    }).show();
});
