$(document).ready(function() {
  

 
 
 
  $("#MoverRecetas").css({transition: ".2s all ease"})
   let izq = 600;
   let der = 0;
   $("#Der").click(()=>{
     izq -= 600;
     $("#MoverRecetas").css({"position": "relative", top: "5%", left: izq-der })
     
   
   })
   $("#Izq").click(()=>{
     der -= 600;
     $("#MoverRecetas").css({"position": "relative", top: "5%", left: izq-der})
   })



    // $(function() {








   


         $( "#EnviarSC" ).click(function() {
            // envia a la funcion de giro
           $( "#EnviarSC" ).addClass( "onclic", 250, validate());

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
           
           
             $( "#receta" ).addClass( "recetaIzq");
          });
     
 });   
