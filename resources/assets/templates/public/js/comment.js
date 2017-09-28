      // $(document).ready(function(){
      //   $('#post-comment').click(function(){
      //     alert(1);
      //     var name = $('name').val();
      //     var email = $('email').val();
      //     var content = $('content').val();
      //     $.post('comment',{ name:name,email:email,content:content},function(data){
      //       console.log(data);
      //       // $('#postcomment').html(data);
      //     });
 $('#post-comment').submit(function() {
        alert("entro");
        alert($(this).attr('action'));

        // Enviamos el formulario usando AJAX
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {
                $('#result').html(//????????????);
            }
        });        
        return false;
    }); 