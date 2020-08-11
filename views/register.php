<?php

require_once "../includes/header.php";

$message = "";
 
if(!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password'])){
    $sql = "INSERT INTO usuarios (id, nombre, apellidos, email, contraseña, role, img) VALUES(NULL, :name , :lastname, :email, :password, '', NULL)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name',$_POST['name']);
    $stmt->bindParam(':lastname',$_POST['lastname']);
    $stmt->bindParam(':email',$_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password',$password);

    if($stmt->execute()){
        $message ="success";
    }else{
        $message ="Wrong";
    }
}


?>

    <?php if(!empty($message)): ?>
    <p><?=$message ?></p>
    <?php endif; ?>

    <div class="container">
    <div class="text-center" style="margin-top:20px">
        <h1>REGISTRAR</h1>
    </div>
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Apellido:</label>
                        <input type="text" class="form-control" name="lastname">
                    </div>
                    <div class="form-group">
                        <label for="emailreg">Correo:</label>
                        <input type="email" class="form-control" id="email" name="email">           
                    </div>
                    <div class="form-group">
                        <label for="passreg">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>                        
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>   
</body>
</html>