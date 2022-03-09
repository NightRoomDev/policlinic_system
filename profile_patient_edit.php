<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_patient.php';


    if (!empty($_POST)) {

        $sql = "UPDATE `patient` SET `patient`.`fio` = '".$_POST['fio']."', `patient`.`age` = '".$_POST['age']."', `patient`.`phone` = '".$_POST['phone']."', `patient`.`passport_data` = '".$_POST['passport_data']."', `patient`.`insurance_policy` = '".$_POST['insurance_policy']."' WHERE `patient`.`ID_patient` = ".$_SESSION['userdata']['id']."";
        $database->query($sql);
        header('Location: profile_patient.php');
        
    }

    $queryPersonalInfoPatient = $database->query("CALL personalInfoPatient(".$_SESSION['userdata']['id'].")");


?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">ПРОФИЛЬ <i class="fas fa-arrow-right ml-1 mr-1"></i> РЕДАКТИРОВАНИЕ ЛИЧНЫХ ДАННЫХ</h4>
            <div class="border-bottom border-left border-right p-4">
                <div class="row">
                    <?php while ($item = $queryPersonalInfoPatient->fetch_assoc()) : ?>
                    <div class="col-3">
                        <img src="https://stihi.ru/pics/2018/02/08/11668.jpg" class="img-fluid shadow-sm border" alt="Изображение пользователя">
                    </div>
                    <div class="col-9">
                        <form action="profile_patient_edit.php" method="POST">
                            <ul class="list-group list-group-flush align-middle">
                                <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold mt-2">ФИО</span> <span><input type="text" class="form-control" name="fio" value="<?=$item['fio']?>"></span></li>
                                <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold mt-2">Возраст</span> <span><input type="number" class="form-control" name="age" value="<?=$item['age']?>"></span></li>
                                <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold mt-2">Телефон</span><span><input type="text" class="form-control" name="phone" value="<?=$item['phone']?>"></span></li>
                                <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold mt-2">Серия и номер паспорта</span><span><input type="text" class="form-control" name="passport_data" value="<?=$item['passport_data']?>"></span></li>
                                <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold mt-2">Номер страхового полиса</span><span><input type="text" class="form-control" name="insurance_policy" value="<?=$item['insurance_policy']?>"></span></li>
                                <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold mt-2 pt-1">Действие</span><span class="mt-2"><button type="submit" class="btn btn-outline-primary"><i class="fas fa-pencil-alt mr-2"></i>Редактировать</button> </span></li>
                            </ul>
                        </form>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div class="row mt-4 border-top pt-4">
                    <div class="col-3 offset-7">
                        <a href="/profile_patient_edit.php" class="btn btn-outline-primary">Редактировать личные данные</a>
                    </div>
                    <div class="col-2">
                        <a href="/hospital_list_patient.php" class="btn btn-outline-primary">Больничные листы</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'templates/footer.php';
?>