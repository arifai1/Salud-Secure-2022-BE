$(document).ready(function () {
//asignacion paciente-medico por el dni ingresado en el input del Smart Contract.
$("#EnviarSC").click(function (e) {
    e.preventDefault();
    //console.log(document.querySelector("#dnidelpacCrearRec").value.toString());
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
        url: '../php/CrearReceta.php',
        dataType: "json",
        data: {"tratamiento": document.querySelector("#tratamiento").value.toString() },
        success: function (data) {
            console.log(data);
        },
        // error: function (error) {
        //     console.log(error);
        // },
    });
    // $.ajax({
    //     type: 'POST',
    //     url: '../php/CrearReceta.php',
    //     dataType: "json",
    //     data: { "indicaciones": document.querySelector("#indicaciones").value.toString() },
    //     success: function (data) {
    //         console.log(data);
    //     },
    //     // error: function (error) {
    //     //     console.log(error);
    //     // },
    // });
})
});