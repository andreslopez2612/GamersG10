<?php 
if(isset($_POST['key'])){

    require_once "db.php";

    if($_POST['key'] == 'editData'){
        $getData = $pdo->prepare('SELECT id, categoria_id, nombre, descripcion, precio, stock FROM productos WHERE id = :id');
        $getData->bindParam(':id', $_POST['rowId']);
        $getData->execute();        
        $jsonArray = $getData->fetch(PDO::FETCH_ASSOC);
        exit(json_encode($jsonArray));
    }

    if($_POST['key']=='get'){
        $records = $pdo->prepare('SELECT id, nombre, descripcion, precio, stock FROM productos LIMIT :start, :limit');
        $records->bindParam(':start', $_POST['start']);
        $records->bindParam(':limit', $_POST['limit']);
        
        if($records->execute()){   
            $response = "";
            while($data = $records->fetch(PDO::FETCH_ASSOC)){
                $response .= '
                    <tr>
                        <td id="nombre_'.$data['id'].'">'. $data['nombre'] . '</td>
                        <td id="descripcion_'.$data['id'].'">'. $data['descripcion'] . '</td>
                        <td id="precio_'.$data['id'].'">'. $data['precio'] . '</td>
                        <td id="stock_'.$data['id'].'">'. $data['stock'] . '</td>
                        <td> 
                            <input type="button" onclick="edit('.$data['id'].')" value="Editar" class="btn btn-primary">
                            <input type="button" onclick="deleteRow('.$data['id'].')" value="Borrar" class="btn btn-danger">
                        </td>
                    </tr>
                ';
            }
            exit($response);
        }else{
            exit("reachedMax");
        }
        
    }
    if($_POST['key']=='updateRow'){
        $update = "UPDATE productos SET categoria_id= :categoria, nombre = :nombre, descripcion = :descripcion, precio = :precio, stock= :stock WHERE id=:id";
        $upd = $pdo->prepare($update);
        $upd->bindParam(':nombre',$_POST['name']);
        $upd->bindParam(':categoria',$_POST['cat']);
        $upd->bindParam(':descripcion',$_POST['des']);
        $upd->bindParam(':precio',$_POST['price']);
        $upd->bindParam(':stock',$_POST['count']);
        $upd->bindParam(':id',$_POST['rowId']);
        if($upd->execute()){
            exit("Success");
        }else{
            exit("Error");
        }
    }
 
    if($_POST['key']=='addNew'){
        $sql = "INSERT INTO productos (id, categoria_id, nombre, descripcion, precio, stock, fecha_publicacion,imagen) VALUES(NULL,  :categoria, :name, :descripcion, :precio, :cantidad, '', NULL)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name',$_POST['name']);
        $stmt->bindParam(':categoria',$_POST['cat']);
        $stmt->bindParam(':descripcion',$_POST['des']);
        $stmt->bindParam(':precio',$_POST['price']);
        $stmt->bindParam(':cantidad',$_POST['count']);

    if($stmt->execute()){
        exit("Success");
    }else{
        exit("Error");
    }
    }
    if($_POST['key']=='addNew'){
        $delete = "DELETE FROM productos WHERE id=:id";
        $upd = $pdo->prepare($delete);
        $upd->bindParam(':id',$_POST['rowId']);
        if($upd->execute()){
            exit("Success");
        }else{
            exit("Error");
        }
    }
}