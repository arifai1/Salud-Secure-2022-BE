$(document).ready(function () {

    $("#RegresarSB").click(function () {
        window.location.replace('../html/SobreBesmo.html');
    });
    $("#LogInComoPac").click(function () {
        window.location.replace('../html/iniciarsesion.html');
    });
    $("#RegistrarseComoPac").click(function () {
        window.location.replace('../html/registrar.html');
    });
    $("#LogInComoMedico").click(function () {
        window.location.replace('../html/iniciarsesion_med.html');
    });
    $("#RegistrarseComoMedico").click(function () {
        window.location.replace('../html/registrar_doc.html');
    });
    $("#GoToDecide").click(function () {
        window.location.replace('../html/pantallainicio.html');
    });
    $("#RegresarM").click(function () {
        window.location.replace('../php/pantallaprincipal_doc.php');
    });
    $("#IconregresarM").click(function () {
        window.location.replace('../php/pantallaprincipal_doc.php');
    });
    $("#RegresarP").click(function () {
        window.location.replace('../php/pantallaprincipal.php');
    });
    $("#IconregresarP").click(function () {
        window.location.replace('../php/pantallaprincipal.php');
    });
    $("#NosotrosP").click(function () {
        window.location.replace('../php/pantallanosotros.php');
    });

    //LogIn del paciente                                                                                                        
    $("#divt").hide();
    $("#LogIn").mouseover(function () {
        $(".boton").css("cursor", "pointer");


        if ($("#u").val() == '' && $("#p").val() == '') {
            $("#divt").html("Debe agregar Usuario y Contrase&ntildea");
            $("#divt").show();
        } else if ($("#u").val() == '' && $("#p").val() != "") {
            $("#divt").html("Debe agregar Usuario");
            $("#divt").show();
        } else if ($("#u").val() != '' && $("#p").val() == "") {
            $("#divt").html("Debe agregar Contrase&ntildea");
            $("#divt").show();
        }
    });

    $("#u").focus(function () {
        $("#divt").html("");
        $("#divt").hide();
    });

    $("#p").focus(function () {
        $("#divt").html("");
        $("#divt").hide();
    });

    $("#LogIn").click(function (event) {
        event.preventDefault();                     //evitamos que se refresque la pagina asi podemos ver por mas tiempo el mensaje de Usuario no encontrado

        if ($("#u").val() != '' && $("#p").val() != '') {
            $.ajax({                                                                                                                                                                                                               //Y luego vuelve igual.
                type: 'POST',
                url: '../php/validar.php',
                dataType: "json",
                data: 'usu=' + $("#u").val() + '&pass=' + $("#p").val() + '&que=L',
                success: function (data) {
                    if (data == "") {
                        mensaje = "Ocurrio un error";
                    }
                    else if (data.status == 'ok') {
                        mensaje = "Bienvenido: " + data.result['nombre'] + " " + data.result['apellido'] + "";
                        $("#divt").html(mensaje);
                        console.log(data.result);
                        window.location.replace('../php/pantallaprincipal.php');
                        $("#divt").show();

                    }
                    else {
                        mensaje = "Usuario no encontrado, por favor registrarse";                                               //sintaxis de link en html. Etiqueta a me indica link. Href me indica destino.
                        $("#divt").html(mensaje);
                        $("#divt").show();
                    }
                },
                error: function (error) {
                    ;
                },
            });
        } else {
            mensaje = "Debe completar el usuario y la contrase&ntildea";                                               //sintaxis de link en html. Etiqueta a me indica link. Href me indica destino.
            $("#divt").html(mensaje);
            $("#divt").show();
        }
    });
    //finaliza aca



    //Registrar del paciente
    $("#RegistrarPac").click(function () {
        $.ajax({
            type: 'POST',
            url: '../php/registrar.php',
            dataType: "json",
            data: 'usu=' + $("#u").val() + '&pass=' + $("#p").val() + '&nom=' + $("#n").val() + '&ape=' + $("#a").val() + '&Credencial=' + $("#c").val() + '&FechadeNacimiento=' + $("#f").val(), //'&DNI='+$("#d").val()+
            success: function (data) {
                if (data.status == 'ok') {
                    window.location.replace('../php/pantallaprincipal.php');
                    
                    //$(location).attr('href', 'pantallaprincipal.php');
                    alert("Se registro el usuario");
                }
                else if (data.status == 'err') {
                    mensaje = ("El usuario que intento ingresar ya existe")
                    $("#divt").html(mensaje);
                    $("divt").show();
                }
                else {
                    alert("Ocurrio un error");
                    $("#divt").html(mensaje);
                    $("divt").show();
                }
            },
            error: function (error) {
                ;
            },
        });
    });

    $("#RegistrarPac").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });
    //finaliza aca


    //LogIn del Medico
    $("#divt").hide();
    $("#LogInMed").mouseover(function () {
        $(".boton").css("cursor", "pointer");


        if ($("#q").val() == '' && $("#c").val() == '') {
            $("#divt").html("Debe agregar Usuario y Contrase&ntildea");
            $("#divt").show();
        } else if ($("#q").val() == '' && $("#c").val() != "") {
            $("#divt").html("Debe agregar Usuario");
            $("#divt").show();
        } else if ($("#q").val() != '' && $("#c").val() == "") {
            $("#divt").html("Debe agregar Contrase&ntildea");
            $("#divt").show();
        }
    });

    $("#q").focus(function () {
        $("#divt").html("");
        $("#divt").hide();
    });

    $("#c").focus(function () {
        $("#divt").html("");
        $("#divt").hide();
    });

    $("#LogInMed").click(function (event) {
        event.preventDefault();
        if ($("#q").val() != '' && $("#c").val() != '') {
            $.ajax({
                type: 'POST',
                url: '../php/validar_doc.php',
                dataType: "json",
                data: 'usum=' + $("#q").val() + '&passm=' + $("#c").val() + '&que=L',
                success: function (data) {
                    console.log(data);
                    if (data == "") {
                        mensaje = "Ocurrio un error";
                    }
                    else if (data.status == 'ok') {
                        mensaje = "Bienvenido: " + data.result['nombre'] + " " + data.result['apellido'] + "";
                        $("#divt").html(mensaje);
                        window.location.replace('../php/pantallaprincipal_doc.php');
                        $("#divt").show();

                    }
                    else {
                        mensaje = "Usuario no encontrado, si desea registrarse haga click ";
                        mensaje += "<a href='../html/registrar_doc.html' /a>aqui.";
                        $("#divt").html(mensaje);
                        $("#divt").show();
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            });
        } else {
            mensaje = "Debe completar el usuario y la contrase&ntildea";
            $("#divt").html(mensaje);
            $("#divt").show();
        }
    });
    //finaliza aca



    //Registrar del medico
    $("#RegistrarMed").click(function () {
        //alert ('usum=' + $("#UsuMed").val() + '&passm=' + $("#PassMed").val() + '&nom='+$("#NomMed").val()+'&ape='+$("#ApeMed").val()+'&DNI='+$("#DNIMed").val()+'&Aream='+$("#AreaMed").val());
        $.ajax({
            type: 'POST',
            url: '../php/registrar_doc.php',
            dataType: "json",
            data: 'usum=' + $("#UsuMed").val() + '&passm=' + $("#PassMed").val() + '&nom=' + $("#NomMed").val() + '&ape=' + $("#ApeMed").val() + '&Aream=' + $("#AreaMed").val() + '&telefonoMed=' + $("#teleMed").val(), //'&DNI='+$("#DNIMed").val()+
            success: function (data) {
                if (data.status == 'ok') {
                    mensaje = "Se registro el usuario";
                    window.location.replace('../php/pantallaprincipal_doc.php');
                    //$(location).attr('href', "pantallaprincipal_doc.php");
                    alert("Se registro el usuario");
                }
                else if (data.status == 'err') {
                    mensaje = "El usuario que intento ingresar ya existe";
                    //alert("El usuario que intento ingresar ya existe");
                    $("#divt").html(mensaje);
                    $("#divt").show();
                }
                else {
                    mensaje = "Ocurrio un error";
                    //alert("Ocurrio un error");
                    $("#divt").html(mensaje);
                    $("#divt").show();
                }
            },
            error: function (error) {
                ;
            },
        });
    });

    $("#RegistrarMed").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });
    //finaliza aca




    $("#EnviarSC").click(function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../php/CrearReceta_asignacion.php',
            dataType: "json",
            data: { "usuario": $("#dnidelpacCrearRec").value },
            success: function (data) {
                //mostramos la $data en una pantalla
                console.log(data);
                alert("La asignacion fue exitosa");
            },
            error: function (error) {
                console.log(error);
            },
        });




    });


    //al apretar el boton de Log Out, redirigimos a la pantalla de inicio
    $("#LO_M").click(function () {
        //window.location.replace('../html/pantallainicio.html');
        window.location.replace('../php/logout.php');
    });
    $("#LO_M").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });

    $("#LO").click(function () {
        window.location.replace('../php/logout.php');
    });
    $("#LO").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });



    $("#Recetas").click(function () {
        window.location.replace('../php/recetas.php'); //redirigimos a donde estan todos las recetas.
    });
    $("#Recetas").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });


    $("#Buscar").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });



    //botones pantallaprincipal.html
    $("#Nosotros").click(function () {
        window.location.replace('../php/pantallanosotros.php'); //mostramos info sobre nosotros
    });
    $("#Nosotros").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });


    $("#MisRecetas").click(function () {
        window.location.replace('../php/recetas.php'); //redirigimos a una pagina en la que luego de poner una contraseña, nos lleve a una pagina donde esten todas las recetas.
    });
    $("#MisRecetas").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });


    $("#MisMedicos").click(function () {
        window.location.replace('../php/MisMedicos.php'); //redirigimos a una pagina en la que esten todos los medicos asignados.
    });
    $("#MisMedicos").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });

    //botones pantallaprincipal_doc.html
    $("#NosotrosM").click(function () {
        window.location.replace('../php/pantallanosotros_doc.php'); //mostramos info sobre nosotros
    });
    $("#NosotrosM").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });


    $("#CrearRec").click(function () {
        window.location.replace('../php/CrearReceta.php'); //redirigimos al smartcontract.
    });
    $("#CrearRec").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });


    $("#MisPacientes").click(function () {
        window.location.replace('../php/MisPacientes.php');
    });
    $("#MisPacientes").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });
});
