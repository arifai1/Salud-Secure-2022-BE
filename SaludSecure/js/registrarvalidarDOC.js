$(document).ready(function () {
    //LogIn del Medico
    $("#divi").hide();
    $("#LogInMed").click(function () {
        $("#LogInMed").removeClass("minibutton");
        $("#LogInMed").addClass("minibuttonClick");
        $(".boton").css("cursor", "pointer");
        //hacemos que el que intenta ingresar este obligado a llenar todos los inputs.
        if ($("#q").val() == '' && $("#c").val() == '') {
            $("#divi").html("Debe agregar Usuario y Contrase&ntildea");
            $("#divi").show();
            $("#q").removeClass("ingresar");
            $("#q").addClass("noIngresado");
            $("#c").removeClass("ingresar");
            $("#c").addClass("noIngresado");
        } else if ($("#q").val() == '' && $("#c").val() != "") {
            $("#divi").html("Debe agregar Usuario");
            $("#divi").show();
            $("#q").removeClass("ingresar");
            $("#q").addClass("noIngresado");
        } else if ($("#q").val() != '' && $("#c").val() == "") {
            $("#divi").html("Debe agregar Contrase&ntildea");
            $("#divi").show();
            $("#c").removeClass("ingresar");
            $("#c").addClass("noIngresado");
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
        $("#RegistrarMed").removeClass("minibutton");
        $("#RegistrarMed").addClass("minibuttonClick");
    });

    $("#RegistrarMed").mouseover(function () {
        $(".boton").css("cursor", "pointer");
    });
})
    //finaliza aca