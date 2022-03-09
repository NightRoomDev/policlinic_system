<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_patient.php';

    $queryPersonalInfoPatient = $database->query("CALL personalInfoPatient(".$_SESSION['userdata']['id'].")");

?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">ПРОФИЛЬ</h4>
            <div class="border-bottom border-left border-right p-4">
                <div class="row">
                    <?php while ($item = $queryPersonalInfoPatient->fetch_assoc()) : ?>
                    <div class="col-3">
                        <img src="https://stihi.ru/pics/2018/02/08/11668.jpg" class="img-fluid shadow-sm border" alt="Изображение пользователя">
                    </div>
                    <div class="col-9">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold">ФИО</span> <span><?=$item['fio']?></span></li>
                            <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold">Возраст</span> <span><?=$item['age']?></span></li>
                            <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold">Телефон</span><span><?=$item['phone']?></span></li>
                            <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold">Серия и номер паспорта</span><span><?=$item['passport_data']?></span></li>
                            <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold">Номер страхового полиса</span><span><?=$item['insurance_policy']?></span></li>
                        </ul>
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