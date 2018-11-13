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
    $('#createUser').on('click',function(){
      alert("Hola");
      $('#formcreateuser').removeClass('d-none');
    })
    $('#event').change(function(e){
      e.preventDefault;
      var id = $(this).val();
      $.ajax({
        url : ajaxurl + 'calendar/readDateByIdEvent',
        type : 'POST',
        data : { 'id' : id},
      })
      .done(function(e){
        $('#dateLabel').removeClass('d-none')
        $('#date').removeClass('d-none')
        $('#date').html(e)
        console.log(e)
      })
      .fail(function(){
        alert("Ocurrio un error maltido puto de mierda")
      })
    })

    $('#date').change(function(e){
      e.preventDefault();
      var id = $(this).val();
      $.ajax({
        url : ajaxurl + 'calendar/readEventSquareAjax',
        type : 'POST',
        data : {'id' : id},
      })
      .done(function(e){
        event_square_label
        $('#event_square_label').removeClass('d-none')
        $('#event_square').removeClass('d-none')
        $('#event_square').html(e)
        $('#cantidad_label').removeClass('d-none')
        $('#cantidad_input').removeClass('d-none')
        console.log(e)
      })
      .fail(function(){
        alert("Ocurrio un error")
      })
    })

    $('#addEventSquare').click(function(e){
      e.preventDefault;
      $('#createeventsquare').removeClass('d-none');

      /*var typeSqaure = function() {
        $('#typeSqaure').change(function(e){
          e.preventDefault;
          var typeSqaure = $(this).val();

        })
      }

      $('#typeSqaure').change(function(e){
        e.preventDefault;
        var typeSqaure = $(this).val();
        console.log(typeSqaure);
      })

      $('#price').change(function(e){
        e.preventDefault;
        var price = $('#price').val();
        console.log(price);
      })

      $('#remainder').change(function(e){
        e.preventDefault;
        var remainder = $('#remainder').val();
        console.log(remainder);
      })

      $('#available_quantity').change(function(e){
        e.preventDefault;
        var available_quantity = $('#available_quantity').val();
        console.log(available_quantity);
      })
      console.log(typeSqaure);*/
      //console.log(typeSquare,price,remainder,available_quantity);

    })



});
