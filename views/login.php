<?php

require_once "../includes/header.php";

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: ../views/productos.php");
  exit;
};

 
if(!empty($_POST['email']) && !empty($_POST['password'])){
    $records = $pdo->prepare('SELECT id, email, contraseña FROM usuarios WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if(count($results) > 0 && password_verify($_POST['password'], $results['contraseña'])){
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $results['id'];
        header('location: productos.php');
    }else{
        $message = "Las credenciales no coincides";
    }
}

?>  

    <?php 
    if(!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>
    <div class="container">
    <div class="text-center" style="margin-top:20px">
        <h1>INGRESAR</h1>
    </div>
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="emailreg">Correo:</label>
                        <input type="email" class="form-control" id="email" name="email">           
                    </div>
                    <div class="form-group">
                        <label for="passreg">Contraseña:</label>
                        <input type="password" class="form-control"  name="password">
                    </div>                        
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </form> 
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>

      
</body>
</html>