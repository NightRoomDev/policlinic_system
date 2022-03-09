<?php

require_once 'templates/header.php';
require_once 'templates/navbar_doctor.php';

$queryPatientToHospitalListToSelect = $database->query("SELECT `patient`.`ID_patient`, `patient`.`fio` FROM `patient`, `ticket`, `medical_card` WHERE `patient`.`ID_patient` = `medical_card`.`ID_patient` and `medical_card`.`ID_medical_card` = `ticket`.`ID_medical_card` AND `ticket`.`visit` = 1");
$queryPatientHospitalListToTable = $database->query("SELECT `hospital_list`.`ID_hospital_list`, `patient`.`fio`, `hospital_list`.`date_open`, `hospital_list`.`date_close` FROM `hospital_list`, `patient` WHERE `patient`.`ID_hospital_list` = `hospital_list`.`ID_hospital_list`");
// $queryPatientToMedicalSelect = $database->query("SELECT `visit`.`ID_visit`, `patient`.`fio` FROM `visit`, `ticket`, `medical_card`, `patient`, `personnel` WHERE `visit`.`ID_ticket` = `ticket`.`ID_ticket` AND `medical_card`.`ID_medical_card` = `ticket`.`ID_medical_card` AND `medical_card`.`ID_patient` = `patient`.`ID_patient` AND `personnel`.`ID_personnel` = `visit`.`ID_personnel` AND `visit`.`ID_personnel` = ".$_SESSION['userdata']['id']."");

if (isset($_POST['openHospitalList'])) {

    $date = date('Y-m-d');
    $queryOpenHospitalList = $database->query("INSERT INTO `hospital_list` (`date_open`) VALUES ('" . $date . "')");

    $queryLastOpenHospitalList = $database->query("SELECT MAX(`ID_hospital_list`) AS `ID_hospital_list` FROM `hospital_list`");
    $lastOpenHospitalList = $queryLastOpenHospitalList->fetch_assoc();
    // var_dump($lastOpenHospitalList['ID_hospital_list']);
    $database->query("UPDATE `patient` SET `patient`.`ID_hospital_list` = ".$lastOpenHospitalList['ID_hospital_list']." WHERE `patient`.`ID_patient` = ".$_POST['ID_visit']."");

}


// $queryPatientToMedicalList = $database->query($sql);

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">БОЛЬНИЧНЫЕ ЛИСТЫ</h4>
            <div class="description border-bottom border-left border-right p-4">
                <h5>Открыть больничный</h5>
                <hr>
                <form action="medical_lists.php" class="row" method="POST">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="ID_visit">Пациент</label>
                            <select name="ID_visit" class="form-control" id="ID_visit">
                                <option value="">-</option>
                                <?php while ($item = $queryPatientToHospitalListToSelect->fetch_assoc()) : ?>
                                    <option value="<?= $item['ID_patient'] ?>"><?= $item['fio'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for=""></label>
                            <button type="submit" name="openHospitalList" class="btn form-control btn-outline-primary"><i class="fas fa-check mr-2"></i>Открыть</button>
                        </div>
                    </div>
                </form>
                <table class="table mt-3">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">Дата открытия</th>
                            <th scope="col">Дата закрытия</th>
                            <th scope="col">Закрыть</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($item = $queryPatientHospitalListToTable->fetch_assoc()): ?>
                        <tr class="align-middle text-center">
                            <td><?=$item['ID_hospital_list'];?></td>
                            <td><?=$item['fio'];?></td>
                            <td><?=$item['date_open'];?></td>
                            <td><?=$item['date_close'];?></td>
                            <td>
                                <a href="./functions/close_hospital_list.php?ID_hospital_list=<?=$item['ID_hospital_list']?>" class="btn btn-outline-success btn-sm"><i class="fa fa-check"></i></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'templates/footer.php';
?>