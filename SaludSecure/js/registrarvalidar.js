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
            $("#p").removeClass( "ingresar" );
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
                data: 'usu=' + $("#u").val() + '&pass=' + $("#p").val(),
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
        if ($("#u").val() == '' || $("#p").val() ==''|| $("#n").val() ==''|| $("#a").val() ==''|| $("#c").val() ==''|| $("#f").val() =='') {
            $("#divAgregardatos").html("Hay campos vacios");
            $("#divAgregardatos").show();
            $( "#u" ).removeClass( "ingresar" );
            $( "#u" ).addClass( "noIngresado");
            $( "#p" ).removeClass( "ingresar" );
            $( "#p" ).addClass( "noIngresado");
        }else{ 
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
    }
    });

    $("#RegistrarPac").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });
    //finaliza aca
})