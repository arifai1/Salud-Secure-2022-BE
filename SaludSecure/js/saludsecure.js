$(document).ready(function(){                                                                                               //todo lo escrito abajo se va a cargar en el navegador cuando todo se cargue a la memoria. El . atrapa un metodo
							                                                                                                //$("#div"). //hago referencia a un id $(".caja"). //hago referencia a una clase
							                                                                                                //$(document ). //hago referencia a todo el archivo. Sobre este elemento, ejecuta la siguiente funcion(). funcion
                                                                                                                            //lo que hace todo lo de abajo es modificar lo html luego de que el navegador haya leido ese index.html para desp modificarlo.
$("#divt").hide();                                                                                                          //# hago referencia al id. .Hago referencia a la clase de ese objeto.
    $("#E").mouseover(function(){                                                                                           //hago referencia a la clase boton.
    	//alert("Hola");    		                                                                                        //si hay un alert se corta todo el proceso debajo.
    	$(".boton").css("cursor","pointer");                                                                                //cambio la forma del cursor a una mano cuando el mouse se apoya sobre el objeto, en este caso sobre el Log In que seria boton
                                                                                                                            //si la linea de arriba la pongo al principio de todo, la forma del mouse va a quedar con esa forma todo el tiempo.
                                                                                                                            //los eventos que hace el usuario sobre la pantalla son de js
        if($("#u").val()=='' && $("#p").val()==''){
        	$("#divt").html("Debe agregar Usuario y Contraseña");
        	$("#divt").show();
        }else if($("#u").val()=='' && $("#p").val()!=""){
        	$("#divt").html("Debe agregar Usuario");
        	$("#divt").show();
        }else if($("#u").val()=='' && $("#p").val()==""){
        	$("#divt").html("Debe agregar Contraseña");
        	$("#divt").show();
        }
    });
		
        $("#u").focus(function(){
    		$("#divt").html("");
    		$("#divt").hide();
        });
        
        $("#p").focus(function(){                                                                                           //identifico el objeto html por el ID. "El ID cuyo objeto es U, levanta lo siguiente"
                $("#divt").html("");
                $("#divt").hide();
        });

    $("#E").click(function(){
        if ($("#u").val()!='' && $("#p").val()!=''){
        $.ajax({                                                                                                          //funcion de js para tomar valores de la pantalla como variables y enviarlas al servidor interactua con la pantalla y envia datos                                                                                                     //Y luego vuelve igual.
        type:'POST',
        url: '../php/validar.php',
        dataType: "json",                                                                                                   //los datos que van a volver estan codificados en json
        data: 'usu=' + $("#u").val() + '&pass=' + $("#p").val() + '&que=L',                                                 //le mando los datos al servidor
        success: function (data){ 
                    if(data == ""){
                        mensaje="Ocurrio un error";
                    }                                                                                          //la informacion que le llega al ajax esta en este data que es distitno al de arriba.          
                    else if(data.status == 'ok'){
                        //alert("Bienvenido");
                        mensaje="Bienvenido: "+data.result['nombre']+" "+data.result['apellido']+"";
                        $("#divt").html(mensaje);
                        $("#divt").show();
                    }
                    else{
                        mensaje="Usuario no encontrado, si desea registrarse haga click ";
                        mensaje+="<a href='../html/registrar.html' /a>aqui.";                                               //sintaxis de link en html. Etiqueta a me indica link. Href me indica destino.
                        $("#divt").html(mensaje);
                        $("#divt").show();
                    }
            },
            error: function(error){
                ;
            },
        });
        }else{
            mensaje="Debe completar el usuario y la contraseña";                                               //sintaxis de link en html. Etiqueta a me indica link. Href me indica destino.
            $("#divt").html(mensaje);
            $("#divt").show();
        }
    });


$("#R").click(function(){
    
        $.ajax({                        
        type:'POST',
        url: '../php/registrar.php',
        dataType: "json",               
        data: 'usu=' + $("#u").val() + '&pass=' + $("#p").val() + '&nom='+$("#n").val()+'&ape='+$("#a").val()+'&DNI='+$("#d").val()+'&Credencial='+$("#c").val()+'&FechadeNacimiento='+$("#f").val(), 
        success: function (data){   
                    if(data.status == 'ok'){
                        //mensaje="Bienvenido mi estimado: "+data.result['Nombre']+" "+data.result['Apellido']+"";
                        //$("#divt").html(mensaje);
                        //$("divt").show();
                        alert("Se registro el usuario")
                        $(location).attr('href',"index.html")                                                               //con esta linea de codigo hacemos la redireccion
                   }
                    else if(data.status=='err'){
                        //mensaje="Usuario y contraseña existente";
                        alert("El usuario que intento ingresar ya existe")
                        $("#divt").html(mensaje);
                        $("divt").show();
                    }
                    else{
                        alert("Ocurrio un error");
                        $("#divt").html(mensaje);
                        $("divt").show();
                    }
            },
            error: function(error){
                ;
            },
        });
});

    $("#R").mouseover(function(){                                                                                           //hago referencia a la clase boton.
        //alert("Hola");                                                                                                    //si hay un alert se corta todo el proceso debajo.
        $(".boton").css("cursor","pointer");                                                                                //cambio la forma del cursor a una mano cuando el mouse se apoya sobre el objeto, en este caso sobre el Log In que seria boton
         
    });
    
});
