
	
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

   
        

 });



