$(document).ready(function () {
//     //LogIn del paciente                                                                                                        
    //Botones LogOut
    $("#LO_M").click(function () {
        window.location.replace('../php/logout.php');
    });
    //finaliza aca los LogOut
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
    $("#MisMedicos").click(function () {
        window.location.replace('../php/MisMedicos.php'); //redirigimos a una pagina en la que esten todos los medicos asignados.
    });

    //botones pantallaprincipal_doc.html
    $("#NosotrosM").click(function () {
        window.location.replace('../php/pantallanosotros_doc.php'); //mostramos info sobre nosotros
    });
    $("#CrearRec").click(function () {
        window.location.replace('../php/CrearReceta.php'); //redirigimos al smartcontract.
    });
    $("#MisPacientes").click(function () {
        window.location.replace('../php/MisPacientesOK.php');
    });
});
