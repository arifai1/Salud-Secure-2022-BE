$(document).ready(function () {

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
            $.ajax({                                                                                                                                                                                                               
                type: 'POST',
                url: '../php/validar.php',                              //va a mandar la info a este archivo para validar si el suario es correcto  o no.
                dataType: "json",
                data: 'usu=' + $("#u").val() + '&pass=' + $("#p").val(),// + '&que=L',
                success: function (data) {
                    if (data == "") {
                        mensaje = "Ocurrio un error";
                    }
                    else if (data.status == 'ok') {
                        mensaje = "Bienvenido: " + data.result['nombre'] + " " + data.result['apellido'] + "";
                        $("#divt").html(mensaje);
                        console.log(data.result);                       //verificamos que nos manda en caso de error.
                        window.location.replace('../php/pantallaprincipal.php');
                        $("#divt").show();

                    }
                    else {
                        mensaje = "Usuario no encontrado, por favor registrarse";                                               
                        $("#divt").html(mensaje);
                        $("#divt").show();
                    }
                },
                error: function (error) {
                    ;
                },
            });
        } else {
            mensaje = "Debe completar el usuario y la contrase&ntildea";                                               //Href me indica destino.
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
            data: 'usu=' + $("#u").val() + '&pass=' + $("#p").val() + '&nom=' + $("#n").val() + '&ape=' + $("#a").val() + '&Credencial=' + $("#c").val() + '&FechadeNacimiento=' + $("#f").val(),       //mandamos toda la info para que se registre en nuestra bdd.
            success: function (data) {
                if (data.status == 'ok') {
                    mensaje = ("Se registro el usuario");
                    $("#divt").html(mensaje);
                    $("#divt").show();
                    window.location.replace('../php/pantallaprincipal.php');
                }
                else if (data.status == 'err') {
                    mensaje= ("El usuario que intento ingresar ya existe");
                    $("#divt").html(mensaje);
                    $("#divt").show();
                }
                else {
                    alert("Ocurrio un error");
                    $("#divt").html(mensaje);
                    $("#divt").show();
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
        //hacemos que el que intenta ingresar este obligado a llenar todos los inputs.
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
        event.preventDefault();                 //evitamos que se refresque la pagina.
        if ($("#q").val() != '' && $("#c").val() != '') {
            $.ajax({
                type: 'POST',
                url: '../php/validar_doc.php',
                dataType: "json",
                data: 'usum=' + $("#q").val() + '&passm=' + $("#c").val(),// + '&que=L',
                success: function (data) {
                    console.log(data);
                    if (data == "") {
                        mensaje = "Ocurrio un error";
                    }
                    else if (data.status == 'ok') {
                        mensaje = "Bienvenido: " + data.result['nombre'] + " " + data.result['apellido'] + "";
                        $("#divt").html(mensaje);
                        $("#divt").show();
                        window.location.replace('../php/pantallaprincipal_doc.php');
                        

                    }
                    else {
                        mensaje = "Usuario no encontrado, por favor registrarse";
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
        $.ajax({
            type: 'POST',
            url: '../php/registrar_doc.php',
            dataType: "json",
            data: 'usum=' + $("#UsuMed").val() + '&passm=' + $("#PassMed").val() + '&nom=' + $("#NomMed").val() + '&ape=' + $("#ApeMed").val() + '&Aream=' + $("#AreaMed").val() + '&telefonoMed=' + $("#teleMed").val(), //'&DNI='+$("#DNIMed").val()+
            success: function (data) {
                if (data.status == 'ok') {
                    mensaje = "Se registro el usuario";
                    $("#divt").html(mensaje);
                    $("#divt").show();
                    window.location.replace('../php/pantallaprincipal_doc.php');
                }
                else if (data.status == 'err') {
                    mensaje = "El usuario que intento ingresar ya existe";
                    $("#divt").html(mensaje);
                    $("#divt").show();
                }
                else {
                    mensaje = "Ocurrio un error";
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

    //asignacion paciente-medico por el dni ingresado en el input del Smart Contract.
    $("#EnviarSC").click(function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../php/CrearReceta_asignacion.php',
            dataType: "json",
            data: { "usuario": $("#dnidelpacCrearRec").value },
            success: function (data) {
        //         if (data.status == 'ok') {
        //             mensaje = "Se envio la receta correctamente";
        //             $("#divt").html(mensaje);
        //             $("#divt").show();
        //         }
        //         else{
        //             mensaje = "Ocurrio un error";
        //             $("#divt").html(mensaje);
        //             $("#divt").show();
        //         }
        //         //mostramos la $data en una pantalla
        //         console.log(data);
        //     },
        //     error: function (error) {
        //         console.log(error);
               },
            });
    });

    //Botones LogOut
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
    //finaliza aca los LogOut

    $("#Recetas").click(function () {
        window.location.replace('../php/misRecetas.php'); //redirigimos a donde estan todos las recetas.
    });
    $("#Recetas").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });
    $("#Buscar").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });

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
    $("#Iconregresar").click(function () {
        window.location.replace('../html/SobreBesmo.html');
    });
    $("#RegresarP").click(function () {
        window.location.replace('../php/pantallaprincipal.php');
    });
    $("#regresarP").click(function () {
        window.location.replace('../php/pantallaprincipal.php');
    });
    $("#IconregresarP").click(function () {
        window.location.replace('../php/pantallaprincipal.php');
    });
    $("#NosotrosP").click(function () {
        window.location.replace('../php/pantallanosotros.php');
    });

    //botones pantallaprincipal.html
    $("#Nosotros").click(function () {
        window.location.replace('../php/pantallanosotros.php'); //mostramos info sobre nosotros
    });
    $("#Nosotros").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });
    $("#MisRecetas").click(function () {
        window.location.replace('../php/misRecetas.php'); 
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
