$(document).ready(function(){
    $('#guardar-registro').on('submit', function(e){
        e.preventDefault();

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                var resultado = data;
                console.log(data);
                if(resultado.respuesta == 'exito'){
                    swal(
                        'Correcto',
                        'Se guardó correctamente',
                        'success'
                      )
                } else {
                    swal(
                        'Error!',
                        'Algo estuvo mal',
                        'error'
                      )
                }
            }
        })
    });

    //Eliminar registro

    $('.borrar_registro').on('click', function(e){
        e.preventDefault();

        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');

        swal({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede revertir",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText : 'Cancelar'
          }).then((result) => {
            $.ajax({
                type: 'post',
                data: {
                    'id': id,
                    'registro': 'eliminar'
                },
                url: 'modelo-'+tipo+'.php',
                success: function (data) {
                    var resultado = JSON.parse(data);
                    if(resultado.respuesta == 'exito'){
                        swal(
                            'Eliminado',
                            'El registro ha sido eliminado',
                            'success'
                          )
                        jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
                    } else{
                        swal(
                            '¡Error!',
                            'Algo salió mal',
                            'error'
                          )
                    }
                }
            })
          })
    });


});