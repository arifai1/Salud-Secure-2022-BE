$(document).ready(function() {
  
 
 
 
 
 
 
  $(".receta").css({transition: ".2s all ease"})
   let izq = 300;
   let der = 0;
   $("#Izq").click(()=>{
     izq -= 250;
     $(".receta").css({"position": "relative", top: "14%", left: izq-der})
   
   })
   $("#Der").click(()=>{
     der -= 250;
     $(".receta").css({"position": "relative", top: "14%", left: izq-der})
   })


    // $(function() {
<<<<<<< Updated upstream
         $( "#EnviarSC" ).click(function() {
            // alert ("hola");
           $( "#EnviarSC" ).addClass( "onclic", 250, validate());
=======
         $( "#button" ).click(function() {
            // Agrega la clase de giro y llama la funcion validar
           $( "#button" ).addClass( "onclic", 250, validate());
>>>>>>> Stashed changes
         });
       
         function validate() {
           setTimeout(function() {
             $( "#EnviarSC" ).removeClass( "onclic" );
             $( "#EnviarSC" ).addClass( "validate", 450, callback());
           }, 2250 );
         }
           function callback() {
             setTimeout(function() {
               $( "#EnviarSC" ).removeClass( "validate" );
             }, 1250 );
           }
 
 
 
           $( "#receta" ).click(function() {
           
             // alert ("hola");
             $( "#receta" ).addClass( "recetaIzq");
          });
     //    });
 });