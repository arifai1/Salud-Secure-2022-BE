$(document).ready(function(){                                                                                               //todo lo escrito abajo se va a cargar en el navegador cuando todo se cargue a la memoria. El . atrapa un metodo
							                                                                                                //$("#div"). //hago referencia a un id $(".caja"). //hago referencia a una clase
							                                                                                                //$(document ). //hago referencia a todo el archivo. Sobre este elemento, ejecuta la siguiente funcion(). funcion
//LogIn del paciente                                                                                                                        //lo que hace todo lo de abajo es modificar lo html luego de que el navegador haya leido ese index.html para desp modificarlo.
$("#divt").hide();                                                                                                          //# hago referencia al id. .Hago referencia a la clase de ese objeto.
    $("#E").mouseover(function(){                                                                                           //hago referencia a la clase boton		                                                                                        //si hay un alert se corta todo el proceso debajo.
    	$(".boton").css("cursor","pointer");                                                                                //cambio la forma del cursor a una mano cuando el mouse se apoya sobre el objeto, en este caso sobre el Log In que seria boton
                                                                                                                            //si la linea de arriba la pongo al principio de todo, la forma del mouse va a quedar con esa forma todo el tiempo.
                                                                                                                            //los eventos que hace el usuario sobre la pantalla son de js
        if($("#u").val()=='' && $("#p").val()==''){
        	$("#divt").html("Debe agregar Usuario y Contrase&ntildea");
        	$("#divt").show();
        }else if($("#u").val()=='' && $("#p").val()!=""){               
        	$("#divt").html("Debe agregar Usuario");
        	$("#divt").show();
        }else if($("#u").val()!='' && $("#p").val()==""){
        	$("#divt").html("Debe agregar Contrase&ntildea");
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
                        mensaje="Bienvenido: "+data.result['nombre']+" "+data.result['apellido']+"";
                        $("#divt").html(mensaje);
                        window.location.replace('../html/pantallaprincipal.html');
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
            mensaje="Debe completar el usuario y la contrase&ntildea";                                               //sintaxis de link en html. Etiqueta a me indica link. Href me indica destino.
            $("#divt").html(mensaje);
            $("#divt").show();
        }
    });
//finaliza aca



//Registrar del paciente
$("#R").click(function(){
    
        $.ajax({                        
        type:'POST',
        url: '../php/registrar.php',
        dataType: "json",               
        data: 'usu=' + $("#u").val() + '&pass=' + $("#p").val() + '&nom='+$("#n").val()+'&ape='+$("#a").val()+'&Credencial='+$("#c").val()+'&FechadeNacimiento='+$("#f").val(), //'&DNI='+$("#d").val()+
        success: function (data){   
                    if(data.status == 'ok'){                      
                        $(location).attr('href',"pantallaprincipal.html");   
                        alert("Se registro el usuario");                                                            
                   }
                    else if(data.status=='err'){
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

    $("#R").mouseover(function(){                                                   
        $(".boton").css("cursor","pointer");                                            
    });
//finaliza aca
        








//botones pantallaprincipal.html
    $("#Nosotros").click(function(){
        window.location.replace('../html/pantallanosotros.html'); //mostramos info sobre nosotros
    });
    $("#Nosotros").mouseover(function(){                                                   
        $(".boton").css("cursor","pointer");                                            
    });


    $("#Recetas").click(function(){
        window.location.replace('../html/recetas.html'); //redirigimos a una pagina en la que luego de poner una contraseña, nos lleve a una pagina donde esten todas las recetas.
    });
    $("#Recetas").mouseover(function(){                                                   
        $(".boton").css("cursor","pointer");                                            
    });


    $("#Medicos").click(function(){
        window.location.replace('../html/MisMedicos.html'); //redirigimos a una pagina en la que esten todos los medicos asignados.
    });
    $("#Medicos").mouseover(function(){                                                   
        $(".boton").css("cursor","pointer");                                            
    });








//botones pantallaprincipal_doc.html
$("#Nosotros").click(function(){
    window.location.replace('../html/pantallanosotros.html'); //mostramos info sobre nosotros
});
$("#Nosotros").mouseover(function(){                                                   
    $(".boton").css("cursor","pointer");                                            
});


$("#CrearRec").click(function(){
    window.location.replace('../html/.html'); //redirigimos al smartcontract.
});
$("#CrearRec").mouseover(function(){                                                   
    $(".boton").css("cursor","pointer");                                            
});


$("#MisPacientes").click(function(){
    window.location.replace('../html/MisPacientes.html'); //redirigimos a donde estan todos los pacientes asignados.
});
$("#MisPacientes").mouseover(function(){                                                   
    $(".boton").css("cursor","pointer");                                            
});

























    


//LogIn del Medico
$("#divt").hide();                                                                                                          //# hago referencia al id. .Hago referencia a la clase de ese objeto.
    $("#W").mouseover(function(){                                                                                           //hago referencia a la clase boton		                                                                                        //si hay un alert se corta todo el proceso debajo.
    	$(".boton").css("cursor","pointer");                                                                                //cambio la forma del cursor a una mano cuando el mouse se apoya sobre el objeto, en este caso sobre el Log In que seria boton
                                                                                                                            //si la linea de arriba la pongo al principio de todo, la forma del mouse va a quedar con esa forma todo el tiempo.
                                                                                                                            //los eventos que hace el usuario sobre la pantalla son de js
        if($("#q").val()=='' && $("#c").val()==''){
        	$("#divt").html("Debe agregar Usuario y Contrase&ntildea");
        	$("#divt").show();
        }else if($("#q").val()=='' && $("#c").val()!=""){               
        	$("#divt").html("Debe agregar Usuario");
        	$("#divt").show();
        }else if($("#q").val()!='' && $("#c").val()==""){
        	$("#divt").html("Debe agregar Contrase&ntildea");
        	$("#divt").show();
        }
    });
		
        $("#q").focus(function(){
    		$("#divt").html("");
    		$("#divt").hide();
        });
        
        $("#c").focus(function(){                                                                                           //identifico el objeto html por el ID. "El ID cuyo objeto es U, levanta lo siguiente"
                $("#divt").html("");
                $("#divt").hide();
        });

    $("#W").click(function(){
        if ($("#q").val()!='' && $("#c").val()!=''){
        $.ajax({                                                                                                          //funcion de js para tomar valores de la pantalla como variables y enviarlas al servidor interactua con la pantalla y envia datos                                                                                                     //Y luego vuelve igual.
        type:'POST',
        url: '../php/validar_doc.php',
        dataType: "json",                                                                                                   //los datos que van a volver estan codificados en json
        data: 'usum=' + $("#q").val() + '&passm=' + $("#c").val() + '&que=L',                                                 //le mando los datos al servidor
        success: function (data){ 
                    if(data == ""){
                        mensaje="Ocurrio un error";
                    }                                                                                          //la informacion que le llega al ajax esta en este data que es distitno al de arriba.          
                    else if(data.status == 'ok'){
                        mensaje="Bienvenido: "+data.result['nombre']+" "+data.result['apellido']+"";
                        $("#divt").html(mensaje);
                        window.location.replace('../html/pantallaprincipal_doc.html');
                        $("#divt").show();
                        
                    }
                    else{
                        mensaje="Usuario no encontrado, si desea registrarse haga click ";
                        mensaje+="<a href='../html/registrar_doc.html' /a>aqui.";                                               //sintaxis de link en html. Etiqueta a me indica link. Href me indica destino.
                        $("#divt").html(mensaje);
                        $("#divt").show();
                    }
            },
            error: function(error){
                ;
            },
        });
        }else{
            mensaje="Debe completar el usuario y la contrase&ntildea";                                               //sintaxis de link en html. Etiqueta a me indica link. Href me indica destino.
            $("#divt").html(mensaje);
            $("#divt").show();
        }
    });
//finaliza aca



//Registrar del medico
$("#Z").click(function(){
    //alert ('usum=' + $("#UsuMed").val() + '&passm=' + $("#PassMed").val() + '&nom='+$("#NomMed").val()+'&ape='+$("#ApeMed").val()+'&DNI='+$("#DNIMed").val()+'&Aream='+$("#AreaMed").val());
        $.ajax({                        
        type:'POST',
        url: '../php/registrar_doc.php',
        dataType: "json",               
        data: 'usum=' + $("#UsuMed").val() + '&passm=' + $("#PassMed").val() + '&nom='+$("#NomMed").val()+'&ape='+$("#ApeMed").val()+'&DNI='+$("#DNIMed").val()+'&Aream='+$("#AreaMed").val(), 
        success: function (data){   
                    if(data.status == 'ok'){      
                        mensaje="Se registro el usuario";                
                        $(location).attr('href',"pantallaprincipal_doc.html");   
                        //alert("Se registro el usuario");                                                            
                   }
                    else if(data.status=='err'){
                        mensaje="El usuario que intento ingresar ya existe";
                        //alert("El usuario que intento ingresar ya existe");
                        $("#divt").html(mensaje);
                        $("#divt").show();
                    }
                    else{
                        mensaje="Ocurrio un error";
                        //alert("Ocurrio un error");
                        $("#divt").html(mensaje);
                        $("#divt").show();
                    }
            },
            error: function(error){
                ;
            },
        });
});

    $("#Z").mouseover(function(){                                                   
        $(".boton").css("cursor","pointer");                                            
    });

    




    //al apretar el boton de Log Out, redirigimos a la pantalla de inicio
    $("#LO_M").click(function(){
        window.location.replace('../html/pantallainicio.html'); 
    });
    $("#LO_M").mouseover(function(){                                                   
        $(".boton").css("cursor","pointer");                                            
    });

    $("#LO").click(function(){
        window.location.replace('../html/pantallainicio.html'); 
    });
    $("#LO").mouseover(function(){                                                   
        $(".boton").css("cursor","pointer");                                            
    });








    $("#Recetas").click(function(){
/*        new QRious({
            element: document.querySelector("#qr"),
            value: "../html/recetas.html", // La URL o el texto
            size: 200,
            backgroundAlpha: 0, 
            foreground: "#8bc34a", 
            level: "H", // L,M,Q y H (L es el de menor nivel, H el mayor)
          });*/
        window.location.replace('../html/recetas.html'); //redirigimos a donde estan todos las recetas.
    });
    $("#Recetas").mouseover(function(){                                                   
        $(".boton").css("cursor","pointer");                                            
    });







    $("#Buscar").mouseover(function(){                                                   
        $(".boton").css("cursor","pointer");                                            
    });































});
