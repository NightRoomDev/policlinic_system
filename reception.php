<?php

require_once 'templates/header.php';
require_once 'templates/navbar_doctor.php';

$queryFioVisitPatient = $database->query("SELECT `patient`.`ID_patient`, `patient`.`fio` FROM `ticket`, `personnel`, `specialization`, `patient`, `medical_card` WHERE `personnel`.`ID_specialization` = `specialization`.`ID_specialization` AND `personnel`.`ID_personnel` = `ticket`.`ID_personnel` AND `ticket`.`ID_medical_card` = `medical_card`.`ID_medical_card` AND `medical_card`.`ID_patient` = `patient`.`ID_patient` AND `ticket`.`ID_ticket` = " . $_GET['id'] . "");
$patient = $queryFioVisitPatient->fetch_assoc();

$queryResultTreatmentPatient = $database->query("SELECT `medical_card`.`ID_medical_card`, `medical_card`.`treatment`, `diagnosis`.`name_diagnosis`, `ticket`.`day`, `ticket`.`time` FROM `diagnosis`, `ticket`, `personnel`, `specialization`, `patient`, `medical_card` WHERE `diagnosis`.`ID_diagnosis` = `medical_card`.`ID_diagnosis` AND `personnel`.`ID_specialization` = `specialization`.`ID_specialization` AND `personnel`.`ID_personnel` = `ticket`.`ID_personnel` AND `ticket`.`ID_medical_card` = `medical_card`.`ID_medical_card` AND `medical_card`.`ID_patient` = `patient`.`ID_patient` AND `ticket`.`ID_ticket` = " . $_GET['id'] . "");
$resultTreatmentPatient = $queryResultTreatmentPatient->fetch_assoc();

$queryListDiagnosis = $database->query("SELECT * FROM `diagnosis`");

if (!empty($_POST)) {
    $database->query("UPDATE `medical_card` SET `medical_card`.`treatment` = '" . $_POST['treatment'] . "', `medical_card`.`ID_diagnosis` = " . $_POST['ID_diagnosis'] . " WHERE `medical_card`.`ID_patient` = " . $patient['ID_patient'] . "");
    $database->query("UPDATE `ticket` SET `ticket`.`visit` = 1 WHERE `ticket`.`ID_medical_card` = ".$resultTreatmentPatient['ID_medical_card']."");
    // $database->query("UPDATE `visit` SET `ID_diagnosis` = " . $_POST['ID_diagnosis'] . ", `complaints` = '" . $_POST['complaints'] . "', `prescribed_medications` = '" . $_POST['prescribed_medications'] . "', `assigned_procedures` = '" . $_POST['assigned_procedures'] . "' WHERE `ID_visit` = " . $_GET['id'] . "");
    // if ($_POST['day_repeat_visit'] != "") {
    //     $database->query("UPDATE `ticket` SET `ticket`.`day` = '" . $_POST['day_repeat_visit'] . "', `time` = '" . $_POST['time_repeat_visit'] . "' WHERE `ID_Ticket` = " . $_GET['idT'] . "");
    // }
}

// $queryRecordingVisitPatient = $database->query("SELECT `name_diagnosis`, `complaints`, `prescribed_medications`, `assigned_procedures`, `time` FROM `visit`, `diagnosis`, `ticket` WHERE `visit`.`ID_diagnosis` = `diagnosis`.`ID_diagnosis` AND `ticket`.`ID_ticket` = `visit`.`ID_ticket` AND `visit`.`ID_visit` = ".$_GET['id']."");

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">ПРИЕМ</h4>
            <div class="description border-bottom border-left border-right p-4">
                <form action="" method="POST" class="row">
                    <div class="col-12 mb-3">
                        <h5 class="border-bottom pb-3">ПАЦИЕНТ: <?= $patient['fio'] ?></h5>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label for="treatment">Лечение</label>
                            <textarea name="treatment" class="form-control" id="treatment" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="ID_diagnosis">Диагноз</label>
                            <select name="ID_diagnosis" class="form-control" id="ID_diagnosis">
                                <option value="">-</option>
                                <?php while ($item = $queryListDiagnosis->fetch_assoc()) : ?>
                                    <option value="<?= $item['ID_diagnosis'] ?>"><?= $item['name_diagnosis'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="complaints"></label>
                            <button type="submit" class="btn btn-outline-primary form-control"><i class="fas fa-pencil-alt mr-2"></i>Записать</button>
                        </div>
                    </div>
                </form>
                <h5 class="mt-4 border-top pt-3 font-weight-bold">Диагноз</h5>
                <p><?= $resultTreatmentPatient['name_diagnosis'] ?></p>
                <h5 class="font-weight-bold">Назначенное лечение</h5>
                <p><?= $resultTreatmentPatient['treatment'] ?></p>
                <h5 class="font-weight-bold">Дата и время приёма:</h5>
                <p><?= $resultTreatmentPatient['day'] ?> <?= $resultTreatmentPatient['time'] ?></p>
                <?php
                require_once 'templates/footer.php';

                ?>