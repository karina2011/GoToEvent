$(document).ready(function() {


    var ajaxurl = 'http://localhost/gotoevent/GoToEvent/';
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
    $('#event').change(function(e){
      e.preventDefault;
      var id = $(this).val();
      $.ajax({
        url : ajaxurl + 'calendar/readDateByIdEvent',
        type : 'POST',
        data : { 'id' : id},
      })
      .done(function(e){
        $('#date').html(e)
        console.log(e)
      })
      .fail(function(){
        alert("Ocurrio un error maltido puto de mierda")
      })
    })

    $('#date'),change(function(e){
      e.preventDefault();
      var id = $(this).val();
      $.ajax({
        url : ajaxurl + 'calendar/read'
      })
    })


});
