
	
	$(document).ready(function (){
   
    $(".delete").confirm({
            text: "Are you sure you want to delete that comment?",
            title: "Confirmation required",
            content: "Esta seguro que desea continuar ?",
            confirm: function() {
               
            },
            cancel: function() {
                
            },
            animation: 'top',
            closeAnimation: 'top',
            confirmButton: "Yes I am",
            cancelButton: "No",
            post: true,
            confirmButtonClass: "btn-danger",
            cancelButtonClass: "btn-info",
            dialogClass: "modal-dialog modal-lg" // Bootstrap classes for large modal
        });
            

          $("select[name=typeTransaction]").on("change", function() {
               console.log($(this).val());
                todo();
          });

            function todo(){
                if($('select[name=typeTransaction]').val()=="Egreso") {
                 if (parseInt($("#NewTypeMounts").val())<=parseInt($("#amounts").val())) {
                   
                             console.log("Valido");
                        }else{
                            console.log("Invalido");
                        }
                }else{

                }
            } 
         
            $("#NewTypeMounts").on("keyup", function() {

                todo();
                 console.log($("#amounts").val());
            });

             $("#amounts").on("keydown", function() {
                 console.log($(this).val());

            });


            
      
      
     

      
        

 });





