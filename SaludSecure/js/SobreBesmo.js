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







   async function conexionWeb3(){
        
    //import detectEthereumProvider from '@metamask/detect-provider';
     if (typeof window.ethereum !== "undefined") {
               ethereum.request({ method: "eth_requestAccounts" })
              //connectWallet()
                 //sendReceta();
                 await window.ethereum.enable()
                 
                 
             //     mensajeM = "Conectando con MetaMask";                                               //Href me indica destino.
             //   $("#divt").html(mensajeM);
             //   $("#divt").show();
              }
    else{
        alert("No tiene MetaMask instalado, por favor descarguelo");
               mensaje = "No tiene instalado MetaMask, por favor instalelo apretando el boton 'Conectar con MetaMask'";                                               //Href me indica destino.
               $("#divt").html(mensaje);
               $("#divt").show();
               await window.open("https://metamask.io/download/", "_blank")
     }
       }

        async function connectWallet() {
               const provider = new ethers.providers.JsonRpcProvider('https://rpc-mumbai.matic.today');
               await provider.send("eth_requestAccounts", []);
               const signer = provider.getSigner()
               alert("Conectado");
        }
   

         $( "#EnviarSC" ).click(function() {
            // envia a la funcion de giro
           $( "#EnviarSC" ).addClass( "onclic", 250, validate());


         $( "#button" ).click(function() {
            // Agrega la clase de giro y llama la funcion validar
           $( "#button" ).addClass( "onclic", 250, validate());

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
});