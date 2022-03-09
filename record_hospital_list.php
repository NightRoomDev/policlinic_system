<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_doctor.php';

    $queryHospitalListOne = $database->query("SELECT `patient`.`fio`, `date_open`, `date_close`, `recording` FROM `visit`, `ticket`, `medical_card`, `patient`, `hospital_list` WHERE `visit`.`ID_ticket` = `ticket`.`ID_ticket` AND `medical_card`.`ID_medical_card` = `ticket`.`ID_medical_card` AND `medical_card`.`ID_patient` = `patient`.`ID_patient` AND `visit`.`ID_visit` = `hospital_list`.`ID_visit` AND `hospital_list`.`ID_hospital_list` = ".$_GET['id']."");
    $item = $queryHospitalListOne->fetch_assoc();

    if (!empty($_POST)) {
        $database->query("UPDATE `hospital_list` SET `recording` = '".$_POST['recording']."' WHERE `ID_hospital_list` = ".$_GET['id']."");
        header('Location: medical_lists.php');
    }

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">БОЛЬНИЧНЫЕ ЛИСТЫ <i class="fas fa-arrow-right ml-1 mr-1"></i> ЗАПИСЬ</h4>
            <div class="description border-bottom border-left border-right p-4">
                <h5 class="d-flex justify-content-between"><span>Больничный лист от <?=$item['date_open']?></span> <span><?=$item['fio']?></span></h5>
                <hr>
                <form action="" class="row" method="POST">
                    <div class="col-12"></div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea name="recording" placeholder="Введите текст записи" class="form-control" id="recording" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="col-12"></div>
                    <div class="col-3 mt-3 offset-9">
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success form-control"><i class="fas fa-pencil-alt mr-2"></i>Оставить запись</button>
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