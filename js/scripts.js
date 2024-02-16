
// function that deletes an image
function borrar_imagen(id_imagen){

    var ajax_url = "./delete_imagen.php";
    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, es decir, si la llamada Ajax ha dado buen resultado, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
           
            window.location="admin.php";
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?id_imagen=" + id_imagen );
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send(); 

}

function filtrar_imagenes(){
    var filtro = document.getElementById("filtro").value;
    var ajax_url = "./filtrar_imagenes.php";

    var paginador = document.getElementById("paginador");

    if(filtro != ""){
        paginador.style.display = "none";

    }
    else{
        paginador.style.display = "block";
    }
 

  
    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("gallery_container").innerHTML = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?filtro=" + filtro );
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

}

$('.celda_editable').on('blur',function(){
    
    var that = $(this),
    categoria_id = that.attr('id'),
    content = that.html();

    var ajax_url = "./editar_categoria.php";

    var ajax_request = new XMLHttpRequest();

    
   ajax_request.onreadystatechange = function() {
        var response = ajax_request.responseText;
        window.location="edit_categorias.php";
     }
    
     ajax_request.open( "GET", ajax_url + "?id=" + categoria_id + "&nombre=" + content );
           
     ajax_request.send();

     
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })


  $(document).ready(function() {
    $('.video-link').click(function() {
      $('.myVideo').attr("src", $(this).attr("vidUrl"));
      $('.overlay').fadeIn(500, function(){
        $('.main-vid-box').fadeIn(500);
        $('.close').fadeIn(500);
      });
    });
    
    $('.close, .overlay').click(function() {
      $('.overlay').fadeOut(500);
      $('.myVideo').attr("src", $(this).attr("vidUrl"));
      $('.main-vid-box').fadeOut(500);
      $('.close').fadeOut(500);
    });
  });

