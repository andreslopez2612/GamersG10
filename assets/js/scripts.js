$(document).ready(function() {

    $("#addNew").on('click',function (){
        $("#tableManager").modal('show');
    });

    getExistingData(0,10);

    
} );

function edit(rowId){
    $.ajax({
        url: '../includes/productos.php',
        dataType: 'JSON',
        method: 'POST',
        data: {
            key: 'editData',
            rowId: rowId
        }, success: function (response) {
            $("#editRowId").val(rowId);
            $("#productName").val(response.nombre);
            $("#category").val(response.categoria_id);
            $("#Description").val(response.descripcion);
            $("#productPrice").val(response.precio);
            $("#productCount").val(response.stock);
            $("#tableManager").modal('show');
            $("#manageBtn").attr('value','Guardar Cambios').attr('onclick','manageData("updateRow")');
        }
    })
}

function getExistingData(start, limit){
    $.ajax({
        url: '../includes/productos.php',
        method: 'POST',
        dataType: 'text',
        data: {
            key: "get",
            start: start,
            limit: limit
        }, success: function (response) {
            if(response != "reachedMax"){
                $('tbody').append(response);
                start += limit;
                getExistingData(start, limit);
                $('#example').DataTable();
            }
            
        }
    });
}

function deleteRow(rowId){
    if(confirm("Eliminar producto?")){
        $.ajax({
            url: '../includes/productos.php',
            method: 'POST',
            dataType: 'text',
            data: {
                key: 'deleteRow',
                rowId: rowId
            },success: function (response) {
                $("#nombre_"+ rowId).parent().remove();
                alert("Producto eliminado");
            }
        });
    }
}

function manageData(key){      
        
    var name = $("#productName");
    var category = $("#category");
    var Description = $("#Description");
    var Price = $("#productPrice");
    var Count = $("#productCount");
    var editRowId = $("#editRowId");
    
    if(isNotEmpty(name) && isNotEmpty(category) && isNotEmpty(Description) && isNotEmpty(Price) && isNotEmpty(Count)){
        $.ajax({
            url: '../includes/productos.php',
            method: 'POST',
            dataType: 'text',
            data: {
                key: key,
                name: name.val(),
                cat: category.val(),
                des: Description.val(),
                price: Price.val(),
                count: Count.val(),
                rowId: editRowId.val()
            }, success: function (response) {
                if(response != 'Success'){
                    alert(response);
                }else{
                    $("#tableManager").modal('hide');
                    $("#nombre_"+ editRowId.val()).html(name.val());
                    $("#descripcion_"+ editRowId.val()).html(category.val());
                    $("#precio_"+ editRowId.val()).html(Price.val());
                    $("#stock_"+ editRowId.val()).html(Count.val());
                    $("#manageBtn").attr('value','Guardar').attr('onclick','manageData("addNew")');
                }
                
            }
        })
    }else{
        
    }
}
function isNotEmpty(caller){
    if(caller.val() == ''){
        caller.css('border','1px solid red');
        return false;
    }else{
        caller.css('border','');
    } 
    return true;
}