<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_patient.php';

    $queryMyHospitalLists = $database->query("CALL myHospitalLists(".$_SESSION['userdata']['id'].")");

?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">ПРОФИЛЬ <i class="fas fa-arrow-right ml-1 mr-1"></i> БОЛЬНИЧНЫЕ ЛИСТЫ</h4>
            <div class="border-bottom border-left border-right p-4">
                <div class="row">
                    <div class="col-3">
                        <img src="https://stihi.ru/pics/2018/02/08/11668.jpg" class="img-fluid shadow-sm border" alt="Изображение пользователя">
                    </div>
                    <div class="col-9">
                        <div class="row">
                            <?php while ($item = $queryMyHospitalLists->fetch_assoc()) : ?>
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title mb-3 font-weight-bold ">Больничный лист от <?=$item['date_open']?></h6>
                                            <hr>
                                            <?php if ($item['date_close'] != "") : ?>
                                                <h6 class="card-subtitle mb-3 text-muted">
                                                    <b>Закрытие:</b> <?=$item['date_close']?>
                                                </h6>
                                                <h6 class="card-subtitle mb-3 text-muted">
                                                    <b>Статус:</b> Закрыт
                                                </h6>
                                            <?php else : ?>
                                                <h6 class="card-subtitle mb-3 text-muted">
                                                    <b>Закрытие:</b> -
                                                </h6>
                                                <h6 class="card-subtitle mb-3 text-muted">
                                                    <b>Статус:</b> Открыт
                                                </h6>
                                            <?php endif; ?>
                                            <h6 class="card-subtitle mb-3 text-muted">
                                                <b>Запись</b>
                                            </h6>
                                            <?php if ($item['recording'] != "") : ?>
                                                <p class="card-text"><?=$item['recording']?></p>
                                            <?php else : ?>
                                                <p class="card-text">Отсутствует.</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
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