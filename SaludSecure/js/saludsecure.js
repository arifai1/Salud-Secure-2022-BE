$(document).ready(function () {


    //LogIn del paciente                                                                                                        
    $("#divi").hide();
    $("#LogIn").click(function () {
        $( "#LogIn" ).removeClass( "minibutton" );
        $( "#LogIn" ).addClass( "minibuttonClick");
        $(".boton").css("cursor", "pointer");

        if ($("#u").val() == '' && $("#p").val() =='') {
            $("#divi").html("Debe agregar Usuario y Contrase&ntildea");
            $("#divi").show();
            $( "#u" ).removeClass( "ingresar" );
            $( "#u" ).addClass( "noIngresado");
            $( "#p" ).removeClass( "ingresar" );
            $( "#p" ).addClass( "noIngresado");
        } else if ($("#u").val() == '' && $("#p").val() != "") {
            $("#divi").html("Debe agregar Usuario");
            $("#divi").show();
            $( "#u" ).removeClass( "ingresar" );
            $( "#u" ).addClass( "noIngresado");
        } else if ($("#u").val() != '' && $("#p").val() == "") {
            $("#divi").html("Debe agregar Contrase&ntildea");
            $("#divi").show();
            $( "#p" ).removeClass( "ingresar" );
            $( "#p" ).addClass( "noIngresado");
        }
    });

    $("#u").focus(function () {
        $("#divi").html("");
        $("#divi").hide();
    });

    $("#p").focus(function () {
        $("#divi").html("");
        $("#divi").hide();
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
                        $("#divi").html(mensaje);
                        $("#divi").show();
                    }
                    else if (data.status == 'ok') {
                        mensaje = "Bienvenido: " + data.result['nombre'] + " " + data.result['apellido'] + "";
                        $("#divi").html(mensaje);
                        $("#divi").show();
                        console.log(data.result);                       //verificamos que nos manda en caso de error.
                        window.location.replace('../php/pantallaprincipal.php');
                    }
                    else {
                        mensaje = "Usuario no encontrado, por favor registrarse";
                        $("#divi").html(mensaje);
                        $("#divi").show();
                    }
                },
                error: function (error) {
                    ;
                },
            });
         } //else {
        //     mensaje = "Debe completar el usuario y la contrase&ntildea";                                               
        //     $("#divi").html(mensaje);
        //     $("#divi").show();
        // }
    });
    //finaliza aca



    //Registrar del paciente
    $("#RegistrarPac").click(function () {
        $( "#RegistrarPac" ).removeClass( "minibutton" );
        $( "#RegistrarPac" ).addClass( "minibuttonClick");
        $.ajax({
            type: 'POST',
            url: '../php/registrar.php',
            dataType: "json",
            data: 'usu=' + $("#u").val() + '&pass=' + $("#p").val() + '&nom=' + $("#n").val() + '&ape=' + $("#a").val() + '&Credencial=' + $("#c").val() + '&FechadeNacimiento=' + $("#f").val(),       //mandamos toda la info para que se registre en nuestra bdd.
            success: function (data) {
                if (data.status == 'ok') {
                    console.log("hola")
                    mensaje = "Se registro correctamente el usuario";
                    $("#divr").html(mensaje);
                    $("#divr").show();
                    window.location.replace('../php/pantallaprincipal.php');
                }
                else if (data.status == 'err') {
                    mensaje = ("El usuario que intento ingresar ya existe");
                    $("#divr").html(mensaje);
                    $("#divr").show();
                }
                else {
                    mensaje=("Ocurrio un error");
                    $("#divr").html(mensaje);
                    $("#divr").show();
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
    $("#divi").hide();
    $("#LogInMed").click(function () {
        $( "#LogInMed" ).removeClass( "minibutton" );
        $( "#LogInMed" ).addClass( "minibuttonClick");
        $(".boton").css("cursor", "pointer");
        //hacemos que el que intenta ingresar este obligado a llenar todos los inputs.
        if ($("#q").val() =='' && $("#c").val() =='') {
            $("#divi").html("Debe agregar Usuario y Contrase&ntildea");
            $("#divi").show();
            $( "#q" ).removeClass( "ingresar" );
            $( "#q" ).addClass( "noIngresado");
            $( "#c" ).removeClass( "ingresar" );
            $( "#c" ).addClass( "noIngresado");
        } else if ($("#q").val() == '' && $("#c").val() != "") {
            $("#divi").html("Debe agregar Usuario");
            $("#divi").show();
            $( "#q" ).removeClass( "ingresar" );
            $( "#q" ).addClass( "noIngresado");
        } else if ($("#q").val() != '' && $("#c").val() == "") {
            $("#divi").html("Debe agregar Contrase&ntildea");
            $("#divi").show();
            $( "#c" ).removeClass( "ingresar" );
            $( "#c" ).addClass( "noIngresado");
        }
    });

    $("#q").focus(function () {
        $("#divi").html("");
        $("#divi").hide();
    });

    $("#c").focus(function () {
        $("#divi").html("");
        $("#divi").hide();
    });

    $("#LogInMed").click(function (event) {
        event.preventDefault();                 //evitamos que se refresque la pagina.
        if ($("#q").val() != '' && $("#c").val() != '') {
            $.ajax({
                type: 'POST',
                url: '../php/validar_doc.php',
                dataType: "json",
                data: 'usum=' + $("#q").val() + '&passm=' + $("#c").val(),
                success: function (data) {
                    console.log(data);
                    if (data == "") {
                        mensaje = "Ocurrio un error";
                        $("divi#").html(mensaje);
                        $("#divi").show();
                    }
                    else if (data.status == 'ok') {
                        mensaje = "Bienvenido: " + data.result['nombre'] + " " + data.result['apellido'] + "";

                        $("#divi").html(mensaje);
                        $("#divi").show();
                        //alert(mensaje);

                        //alert(mensaje);


                        window.location.replace('../php/pantallaprincipal_doc.php');
                    }
                    else {
                        mensaje = "Usuario no encontrado, por favor registrarse";
                        $("#divi").html(mensaje);
                        $("#divi").show();
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            });
        } //else {
            //mensaje = "Debe completar el usuario y la contrase&ntildea";
            //$("#msgDoc").html(mensaje);
            //$("#msgDoc").show();
        //}
    });
    //finaliza aca



    //Registrar del medico
    $("#RegistrarMed").click(function () {
        $( "#RegistrarMed" ).removeClass( "minibutton" );
        $( "#RegistrarMed" ).addClass( "minibuttonClick");
        $.ajax({
            type: 'POST',
            url: '../php/registrar_doc.php',
            dataType: "json",
            data: 'usum=' + $("#UsuMed").val() + '&passm=' + $("#PassMed").val() + '&nom=' + $("#NomMed").val() + '&ape=' + $("#ApeMed").val() + '&Aream=' + $("#AreaMed").val() + '&telefonoMed=' + $("#teleMed").val(), //'&DNI='+$("#DNIMed").val()+
            success: function (data) {
                if (data.status == 'ok') {
                    mensaje = "Se registró correctamente el usuario";
                    $("#msgDoc").html(mensaje);
                    $("#msgDoc").show();
                    window.location.replace('../php/pantallaprincipal_doc.php');
                }
                else if (data.status == 'err') {
                    mensaje = "El usuario que intento ingresar ya existe";      //lo tira en cualquier lado
                    $("#msgDoc").html(mensaje);
                    $("#msgDoc").show();
                }
                else {
                    mensaje = "Ocurrio un error";
                    $("#msgDoc").html(mensaje);
                    $("#msgDoc").show();
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
        //console.log(document.querySelector("#dnidelpacCrearRec").value);
        $.ajax({
            type: 'POST',
            url: '../php/CrearReceta_asignacion.php',
            dataType: "json",
            data: { "usuario": document.querySelector("#dnidelpacCrearRec").value.toString() },
            success: function (data) {
                console.log(data);
                if (data.status == 'ok') {
                    mensaje = "Se envio la receta correctamente";
                    $("#divt").html(mensaje);
                    $("#divt").show();
                }
                else{
                    mensaje = "Ocurrio un error";
                    $("#divt").html(mensaje);
                    $("#divt").show();
                }
                //mostramos la $data en la consola para verificar que este todo en orden
                //   console.log("te muestro la data");
                console.log(data);
            },
            error: function (error) {
                console.log(error);
            },
        });

        $.ajax({
            type: 'POST',
            url: '../php/CrearReceta_asignacion.php',
            dataType: "json",
            data: {"tratamiento": document.querySelector("#tratamiento").value.toString() },
            success: function (data) {
                console.log(data);
            },
            // error: function (error) {
            //     console.log(error);
            // },
        });
        $.ajax({
            type: 'POST',
            url: '../php/CrearReceta_asignacion.php',
            dataType: "json",
            data: { "indicaciones": document.querySelector("#indicaciones").value.toString() },
            success: function (data) {
                console.log(data);
            },
            // error: function (error) {
            //     console.log(error);
            // },
        });

    });

    //Botones LogOut
    $("#LO_M").click(function () {
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
        window.location.replace('../php/MisPacientesOK.php');
    });
    $("#MisPacientes").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });
});
