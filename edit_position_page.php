<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_admin.php';

    $queryListPosition = $database->query("SELECT * FROM `position` WHERE `ID_position` = ".$_GET['id']."");
    $item = $queryListPosition->fetch_assoc();

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">ПАНЕЛЬ УПРАВЛЕНИЯ <i class="fas fa-arrow-right ml-2 mr-2"></i> ДОЛЖНОСТИ <i class="fas fa-arrow-right ml-2 mr-2"></i> РЕДАКТИРОВАНИЕ</h4>
            <div class="description border-bottom border-left border-right p-4">
                <form action="./functions/edit_position.php"method="POST" class="row mb-4">
                    <input type="hidden" name="ID_position" value="<?=$item['ID_position']?>">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="name_position">Название</label>
                            <input type="text" class="form-control" id="name_position" name="name_position" value="<?=$item['name_position']?>" placeholder="Введите должность">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" style="visibility: hidden">ГГГ</label>
                            <button type="submit" class="form-control btn btn-outline-success"><i class="fas fa-pencil-alt mr-2"></i>Редактировать</button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
<?php

    require_once 'templates/footer.php';
    
?>