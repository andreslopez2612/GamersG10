<?php
require_once "../includes/header.php";



// if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
//   header("location: login.php");
//   exit;
// }else{
  
  
// }
 

// $records = $pdo->prepare('SELECT id, email, nombre, apellidos FROM usuarios WHERE id = :id');
//   $records->bindParam(':id',$_SESSION['user_id']);
//   $records->execute();
//   $results = $records->fetch(PDO::FETCH_ASSOC);

  // $user = $results;
  // var_dump($user);

  // if(count($results) > 0){
  //   $user = $results;
  // }

?>

<div id="tableManager" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Descripción Producto</h2>
        </div>
        <div class="modal-body">
        <input type="text"  class="form-control" placeholder="Nombre" id="productName" name="productName"><br>
        <div class="form-group">
          <label for="category">Categoria</label>
          <select class="form-control" id="category" name="category">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
        </div>
        <div class="form-group">
          <label for="Description">Descripción</label>
          <textarea class="form-control" id="Description" name="Description" rows="3"></textarea>
        </div>
        <div>
          <label for="productPrice">Precio</label>
          <input type="text"  class="form-control" placeholder="Precio" id="productPrice" name="productPrice">
        </div>
        <div>
          <label for="productCount">Cantidad</label>
          <input type="text"  class="form-control" placeholder="Cantidad" id="productCount" name="productCount">
        </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="editRowId" value="0">
          <input type="button" id="manageBtn" value="Guardar" onclick="manageData('addNew')" class="btn btn-success">
        </div>
        </div>
      </div>      
    </div>

<div class="container">
  <div class="row">
    <div class="col-sm">
      <table id="example" class="display table table-hover table-responsive" style="width:100%">
          <thead class="thead-dark">
              <tr>
                  <th>Producto</th>
                  <th style="max-width: 30%">Descripción</th>
                  <th>Precio</th>
                  <th>Existencias</th>
                  <th>Opciones</th>
              </tr>
          </thead>
          <tbody>
          </tbody>
      </table>
    </div>
  </div>
</div>
<div class="container">
<div class="row">
  <div class="col-sm">
    <input type="button"  class="btn btn-success" id="addNew" value="Agregar">
  </div>
  </div>
</div>

