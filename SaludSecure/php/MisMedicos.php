<?php session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../html/pantallainicio.html');
    }?>
<!DOCTYPE html>

<head>

<body>
    <form id="form" role="search">
        <input type="search" id="query" name="q" placeholder="Search..." aria-label="Search through site content">
        <input type="submit" value="Buscar" id="Buscar" class="boton" />
    </form>
    <a href="./pantallaprincipal.php">Regresar</a>

</body>