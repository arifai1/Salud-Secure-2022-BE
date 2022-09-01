$(document).ready(function(){                                                                                               
							                                                                                                
							                                                                                                
//LogIn del paciente                                                                                                        
$("#divt").hide();                                                                                                          
    $("#LogIn").mouseover(function(){                                                                                       		                                                                                        
    	$(".boton").css("cursor","pointer");                                                                                
                                                                                                                            
                                                                                                                            
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
        
        $("#p").focus(function(){                                                                                           
                $("#divt").html("");
                $("#divt").hide();
        });

    $("#LogIn").click(function(){
        if ($("#u").val()!='' && $("#p").val()!=''){
        $.ajax({                                                                                                                                                                                                               //Y luego vuelve igual.
        type:'POST',
        url: '../php/validar.php',
        dataType: "json",                                                                                                   
        data: 'usu=' + $("#u").val() + '&pass=' + $("#p").val() + '&que=L',                                                 
        success: function (data){ 
                    if(data == ""){
                        mensaje="Ocurrio un error";
                    }                                                                                                    
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
$("#RegistrarPac").click(function(){
    
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

    $("#RegistrarPac").mouseover(function(){                                                   
        $(".boton").css("cursor","pointer");                                            
    });
//finaliza aca


//LogIn del Medico
$("#divt").hide();                                                                                                          
    $("#LogInMed").mouseover(function(){                                                                                    		                                                                                        
    	$(".boton").css("cursor","pointer");                                                                                
                                                                                                                            
                                                                                                                            
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
        
        $("#c").focus(function(){                                                                                           
                $("#divt").html("");
                $("#divt").hide();
        });

    $("#LogInMed").click(function(){
        if ($("#q").val()!='' && $("#c").val()!=''){
        $.ajax({                                                                                                                                                                                                               
        type:'POST',
        url: '../php/validar_doc.php',
        dataType: "json",                                                                                                   
        data: 'usum=' + $("#q").val() + '&passm=' + $("#c").val() + '&que=L',                                               
        success: function (data){ 
                    if(data == ""){
                        mensaje="Ocurrio un error";
                    }                                                                                                    
                    else if(data.status == 'ok'){
                        mensaje="Bienvenido: "+data.result['nombre']+" "+data.result['apellido']+"";
                        $("#divt").html(mensaje);
                        window.location.replace('../html/pantallaprincipal_doc.html');
                        $("#divt").show();
                        
                    }
                    else{
                        mensaje="Usuario no encontrado, si desea registrarse haga click ";
                        mensaje+="<a href='../html/registrar_doc.html' /a>aqui.";                                               
                        $("#divt").html(mensaje);
                        $("#divt").show();
                    }
            },
            error: function(error){
                ;
            },
        });
        }else{
            mensaje="Debe completar el usuario y la contrase&ntildea";                                               
            $("#divt").html(mensaje);
            $("#divt").show();
        }
    });
//finaliza aca



//Registrar del medico
$("#RegistrarMed").click(function(){
    //alert ('usum=' + $("#UsuMed").val() + '&passm=' + $("#PassMed").val() + '&nom='+$("#NomMed").val()+'&ape='+$("#ApeMed").val()+'&DNI='+$("#DNIMed").val()+'&Aream='+$("#AreaMed").val());
        $.ajax({                        
        type:'POST',
        url: '../php/registrar_doc.php',
        dataType: "json",               
        data: 'usum=' + $("#UsuMed").val() + '&passm=' + $("#PassMed").val() + '&nom='+$("#NomMed").val()+'&ape='+$("#ApeMed").val()+'&Aream='+$("#AreaMed").val()+'&telefonoMed='+$("#teleMed").val(), //'&DNI='+$("#DNIMed").val()+
        success: function (data){   
                    if(data.status == 'ok'){      
                        mensaje="Se registro el usuario";                
                        $(location).attr('href',"pantallaprincipal_doc.html");   
                        alert("Se registro el usuario");                                                            
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

    $("#RegistrarMed").mouseover(function(){                                                   
        $(".boton").css("cursor","pointer");                                            
    });
//finaliza aca
    



    


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
        window.location.replace('../html/recetas.html'); //redirigimos a donde estan todos las recetas.
    });
    $("#Recetas").mouseover(function(){                                                   
        $(".boton").css("cursor","pointer");                                            
    });


    $("#Buscar").mouseover(function(){                                                   
        $(".boton").css("cursor","pointer");                                            
    });



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
$("#NosotrosM").click(function(){
window.location.replace('../html/pantallanosotros_doc.html'); //mostramos info sobre nosotros
});
$("#NosotrosM").mouseover(function(){                                                   
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


});
