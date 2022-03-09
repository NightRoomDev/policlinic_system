<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_doctor.php';

    $queryPersonalInfoDoctor = $database->query("CALL personalInfoDoctor(".$_SESSION['userdata']['id'].")");

?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">ПРОФИЛЬ</h4>
            <div class="border-bottom border-left border-right p-4">
                <div class="row">
                    <div class="col-3">
                        <img src="https://stihi.ru/pics/2018/02/08/11668.jpg" class="img-fluid shadow-sm border" alt="Изображение пользователя">
                    </div>
                    <div class="col-9">
                        <ul class="list-group list-group-flush">
                            <?php while ($item = $queryPersonalInfoDoctor->fetch_assoc()) : ?>
                                <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold">ФИО</span> <span><?=$item['fio']?></span></li>
                                <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold">Дата рождения</span> <span><?=$item['date_birth']?></span></li>
                                <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold">Адрес</span><span> <?=$item['address']?></span></li>
                                <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold">Телефон</span><span><?=$item['phone']?></span></li>
                                <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold">Пол</span><span><?=$item['gender']?></span></li>
                                <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold">Специализация</span><span><?=$item['name_specialization']?></span></li>
                                <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold">Должность</span><span><?=$item['name_position']?></span></li>
                                <li class="list-group-item d-flex justify-content-between"><span class="font-weight-bold">Серия и номер паспорта</span><span><?=$item['passport_data']?></span></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'templates/footer.php';
?>