$(document).ready(function () {

    //Verificacion el nuevo monto
    $('#form-NewTypeMoun').change(function(){
        $("#im").fadeIn(400).html("<img src='view/img/loading.gif' alt='loading'/>");
        $('#form-NewTypeMount').each(function() {       
            var formNewTypeMount = $(this).val();
            var n = 1;
            $.post('../../../../controllers/transactionsController.php', { formNewTypeMount:formNewTypeMount, n : n}, function(data) { 
                $('#im').hide();
                if(data == 1){
                    $('#NewTypeMount').html( " El correo ya existe<input type='hidden' name='exi' id='exi' value='1' />");
                    $('#reg').attr('disabled','disabled');
                }else{
                    $('#NewTypeMount').html("<input type='hidden' name='exi' id='exi' value='0' />");
                    $('#reg').removeAttr('disabled');
                }
            },'html');
        });
    });
    //Fin verificacion

});

