<?php
    // session_unset();
    session_start();

    require_once "../includes/db.php";

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        $records = $pdo->prepare('SELECT id, email, nombre, apellidos FROM usuarios WHERE id = :id');
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);        
        

        $user = null;
      
        if(count($results) > 0){
          $user = $results;
        }
    }

    ?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamers G10</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>/assets/css/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url?>/assets/css/style.css"/>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/datatables.min.js"></script>
    <script type="text/javascript" src="../assets/js/scripts.js"></script>

    <!--HEADER-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <a class="navbar-brand" href="../">Gamers G10</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productos.php">Productos</a>
                    </li>
                    <?php if(isset($_SESSION['loggedin'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="usuarios.php">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ventas.php">Resumen ventas</a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="../includes/logout.php">Cerrar Sesion<span class="sr-only">(current)</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if(!isset($_SESSION['loggedin'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Ingresar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Registrarse</a>
                        </li>
                    <?php else: ?>

                    <?php endif; ?>
                </ul>                
            </div>
        </nav>
    </header>