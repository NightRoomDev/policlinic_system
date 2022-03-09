<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_admin.php';

    $queryListSpecialization = $database->query("SELECT * FROM `specialization` WHERE `ID_specialization` = ".$_GET['id']."");
    $item = $queryListSpecialization->fetch_assoc();

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">ПАНЕЛЬ УПРАВЛЕНИЯ <i class="fas fa-arrow-right ml-2 mr-2"></i> СПЕЦИАЛИЗАЦИЯ <i class="fas fa-arrow-right ml-2 mr-2"></i> РЕДАКТИРОВАНИЕ</h4>
            <div class="description border-bottom border-left border-right p-4">
                <form action="./functions/edit_specialization.php"method="POST" class="row mb-4">
                    <input type="hidden" name="ID_specialization" value="<?=$item['ID_specialization']?>">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="name_specialization">Название</label>
                            <input type="text" class="form-control" id="name_specialization" name="name_specialization" value="<?=$item['name_specialization']?>" placeholder="Введите специализацию">
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