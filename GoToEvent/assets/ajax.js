$(document).ready(function() {
    alert("1234353545");

    //var ajaxurl = 'https://' + window.location.hostname + '/wp-admin/admin-ajax.php';
    var ajaxurl = 'calendar/readEventsByDate'; // aca va lo q ponemos en el action de los form 
    // fijarse los errores en consola de la web, Red .
    /**
    *
    */
    $('#create-calendar').change(function(e) { //#id-formulario
        e.preventDefault();
        alert("HOLA");
        $.ajax({
            url : ajaxurl,
            type : 'POST',
            data : $(this).val(),
            beforeSend : function(e) {
                $('#login-cliente-form .loader').removeClass('d-none');
                $('#login-cliente-form .alert-warning').addClass('d-none');
            },
            success : function(e) {
                $('#login-cliente-form .loader').addClass('d-none');

                if(e == 0) {
                    //console.log("http://" + window.location.hostname + "/admin-personas/datos-personales/");
                    window.location.assign("http://" + window.location.hostname + "/admin-personas/datos-personales/");
                } else {
                    $('#login-cliente-form .alert-warning').removeClass('d-none');
                }

            },
            error : function(e) {
                $('#login-cliente-form alert').removeClass('d-none').html('Error: ' + e);
            }
        });
    });

    /**
    *
    */
    $('#logout').click(function(e) {
        e.preventDefault();

        $.ajax({
            url : ajaxurl,
            type : 'POST',
            data : $(this).serialize() + '&action=logout_cliente',
            beforeSend : function() {
                window.location.assign("http://" + window.location.hostname + "/admin-personas/log-in-persona/");
            },
            success : function() {

            }
        });
    });

    /**
    *
    */
    $('#login-comercio-form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url : ajaxurl,
            type : 'POST',
            data : $(this).serialize() + '&action=login_comercio',
            beforeSend : function() {
                $('#login-comercio-form .loader').removeClass('d-none');
                $('#login-comercio-form .alert').addClass('d-none');

            },
            success : function(e) {
                $('#login-comercio-form .loader').addClass('d-none');

                if(e == 0) {
                    //console.log("http://" + window.location.hostname + "/admin-comercios/datos-del-comercio/");
                    window.location.assign("http://" + window.location.hostname + "/admin-comercios/datos-del-comercio/");
                } else {
                    $('#login-comercio-form .alert').removeClass('d-none');
                }

            },
            error : function(e) {
                $('#login-comercio-form alert').removeClass('d-none').html('Error: ' + e);
            }
        });
    });

    /**
    *
    */
    $('#recuperar-contrasenia-form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url : ajaxurl,
            type : 'POST',
            data : $(this).serialize() + '&action=solicitar_codigo_recuperacion',
            beforeSend : function() {
                $('#recuperar-contrasenia-form .loader').removeClass('d-none');
                $('#recuperar-contrasenia-form .alert').addClass('d-none');
                $('#recuperar-contrasenia-form .mje-success').addClass('d-none');
            },
            success : function(e) {
                console.log(e);
                if(e == 0) {
                    $('#recuperar-contrasenia-form .loader').addClass('d-none');
                    $('#recuperar-contrasenia-form .alert').addClass('d-none');
                    $('#recuperar-contrasenia-form .mje-success').removeClass('d-none');
                    $('#auto-email').val($('#user-email').val());
                    $('#recuperar-contrasenia').collapse('hide');
                    $('#codigo-recuperacion').collapse('show');
                } else {
                    $('#recuperar-contrasenia-form .loader').addClass('d-none');
                    $('#recuperar-contrasenia-form .alert').removeClass('d-none').html('No pudimos enviar el código.<br>Revisá tu correo electrónico, puede que ya lo hayas solicitado o verificá si el email que ingresaste es correcto.');
                    $('#recuperar-contrasenia-form .mje-success').addClass('d-none');
                    $('#codigo-recuperacion').collapse('hide');
                }

            },
            error : function() {
                $('#recuperar-contrasenia-form .loader').addClass('d-none');
                $('#recuperar-contrasenia-form .alert').removeClass('d-none');
                $('#recuperar-contrasenia-form .mje-success').addClass('d-none');
                $('#recuperar-contrasenia').collapse('hide');
                $('#codigo-recuperacion').collapse('hide');
            }
        });
    });

    /**
    *
    */
    $('#ingresar-codigo-form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url : ajaxurl,
            type : 'POST',
            data : $(this).serialize() + '&action=recuperar_contrasenia_por_codigo',
            beforeSend : function() {
                console.log('va');
                $('#ingresar-codigo-form .loader').removeClass('d-none');
                $('#ingresar-codigo-form .alert-warning').addClass('d-none');
            },
            success : function(e) {

                if(e == 0) {
                    $('#login-cliente-form .alert-success').removeClass('d-none').html('Ya podés ingresar a tu cuenta.');
                } else {
                    $('#ingresar-codigo-form .alert-warning').removeClass('d-none');
                }
                $('#ingresar-codigo-form .loader').addClass('d-none');

            },
            error : function() {
                $('#ingresar-codigo-form .alert-danger').addClass('d-none').html('Se produjo un error inesperado, intente de nuevo.');
            }
        });
    });

    /**
    *
    */
    $('#solicitar-tarjeta-form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url : ajaxurl,
            type : 'POST',
            data : $(this).serialize() + '&action=solicitar_tarjeta',
            beforeSend : function() {
                $('#solicitar-tarjeta-form .loader').removeClass('d-none');
            },
            success : function(e) {

                if(e == 0) {
                    $('#modal-registro-exitoso').modal('show');
                    $('#solicitar-tarjeta-form .loader').addClass('d-none');
                }
            },
            error : function() {

            }
        });

    });

    /**
    *
    */
    $('#bloqueo-tarjeta-form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url : ajaxurl,
            type : 'POST',
            data : $(this).serialize() + '&action=bloquear_tarjeta',
            beforeSend : function() {
                $('#bloqueo-tarjeta-form .loader').removeClass('d-none');
            },
            success : function(e) {
                if(e == 0) {
                    $('#bloqueo-tarjeta').find('.title').addClass('text-danger').html('Su tarjeta se bloqueó con éxito. Pongase en contacto con nosotros.');
                    $('#bloqueo-tarjeta-form .loader').addClass('d-none');
                    $('#bloqueo-tarjeta').find('.btn-bloquear').hide();
                    $('#bloqueo-tarjeta').find('.btn-cancelar').html('Cerrar');
                }
            },
            error : function() {

            }
        });
    });

    /**
    *
    */
    $('#cambiar-contrasenia-form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url : ajaxurl,
            type : 'POST',
            data : $(this).serialize() + '&action=cambiar_contrasenia',
            beforeSend : function() {
                // Oculto todas las alertas
                $('.alert').addClass('d-none');
                $('#cambiar-contrasenia-form .loader').removeClass('d-none');
            },
            success : function(e) {

                if(e == 0) {
                    $('.alert').removeClass('alert-danger').removeClass('d-none').addClass('alert-success').html('Cambio de contraseña exitoso.');
                } else if(e == 'error0') {
                    $('[name="pass2"]').addClass('is-invalid');
                    $('.alert').removeClass('alert-success').addClass('alert-danger').removeClass('d-none').html('la contraseña no coincide.');
                } else if(e == '3550') {
                    $('.alert').removeClass('alert-success').addClass('alert-danger').removeClass('d-none').html('La contraseña no puede tener menos de 6 caracteres.');
                } else {
                    $('.alert').removeClass('alert-success').addClass('alert-danger').removeClass('d-none').html('No se pudo realizar la operación');
                }

                $('#cambiar-contrasenia-form .loader').addClass('d-none');
            },
            error : function() {

            }
        });
    });
});
