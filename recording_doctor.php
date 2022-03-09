<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_patient.php';

    if (!empty($_POST)) {

        $database->query("INSERT INTO `ticket` (`day`, `time`, `ID_medical_card`, `ID_personnel`) VALUES ('".$_POST["date_recording"]."', '".$_POST["time_recording"]."', ".$_SESSION["userdata"]["ID_medical_card"].", ".$_POST['id_doctor'].")");
    
        // $queryLastIdTicket = $database->query("SELECT MAX(`ID_ticket`) FROM `ticket`");
        // $LastIdTicket = $queryLastIdTicket->fetch_row();
    
        // $database->query("INSERT INTO `visit` (`ID_personnel`, `ID_ticket`) VALUES (".$_POST['id_doctor'].", ".$LastIdTicket[0].")");
        
    }

    $queryPersonnelList = $database->query("SELECT `ID_personnel`, `fio` FROM `personnel`, `position` WHERE `personnel`.`ID_position` = `position`.`ID_position` AND (`position`.`ID_position` = 3 OR `position`.`ID_position` = 4 OR `position`.`ID_position` = 1)");
    // $queryRecordingDoctor = $database->query("SELECT `personnel`.`ID_personnel`, `personnel`.`fio`, `specialization`.`name_specialization`, `reception_schedule`.`office`, `ticket`.`day`, `ticket`.`time` FROM `personnel`, `specialization`, `reception_schedule`, `ticket`, `visit`, `patient`, `medical_card` WHERE `personnel`.`ID_specialization` = `specialization`.`ID_specialization` AND `reception_schedule`.`ID_personnel` = `personnel`.`ID_personnel` AND `ticket`.`ID_ticket` = `visit`.`ID_ticket` AND `visit`.`ID_personnel` = `personnel`.`ID_personnel` AND `medical_card`.`ID_patient` = `patient`.`ID_patient` AND `ticket`.`ID_medical_card` = `medical_card`.`ID_medical_card` AND `ticket`.`ID_ticket` AND `patient`.`ID_patient` = ".$_SESSION['userdata']['id']."");
    $queryRecordingDoctor = $database->query("SELECT `ticket`.`ID_ticket`, `personnel`.`fio`, `specialization`.`name_specialization`, `ticket`.`day`, `ticket`.`time` FROM `ticket`, `personnel`, `specialization`, `patient`, `medical_card` WHERE `personnel`.`ID_specialization` = `specialization`.`ID_specialization` AND `personnel`.`ID_personnel` = `ticket`.`ID_personnel` AND `ticket`.`ID_medical_card` = `medical_card`.`ID_medical_card` AND `medical_card`.`ID_patient` = `patient`.`ID_patient` AND `patient`.`ID_patient` = ".$_SESSION['userdata']['id']."");

?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">ЗАПИСЬ НА ПРИЕМ</h4>
            <form action="" method="POST" class="border-bottom border-left border-right p-4">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="id_doctor">Врач</label>
                            <select name="id_doctor" class="form-control" id="id_doctor">
                                <option value="">-</option>
                                <?php while ($item = $queryPersonnelList->fetch_assoc()) : ?>
                                    <option value="<?= $item['ID_personnel'] ?>"><?= $item['fio'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="time_recording">Время</label>
                            <input type="time" class="form-control" name="time_recording" id="time_recording">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="date_recording">Дата</label>
                            <input type="date" class="form-control" name="date_recording" id="date_recording">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for=""></label>
                            <button type="submit" class="btn btn-outline-primary form-control"><i class="fas fa-pencil-alt mr-2"></i>Записаться</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="border-bottom border-left border-right p-4">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col">Врач</th>
                                    <th scope="col">Специализация</th>
                                    <th scope="col">Дата</th>
                                    <th scope="col">Время</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($item = $queryRecordingDoctor->fetch_assoc()) : ?>
                                    <tr class="align-middle">
                                        <td class="text-center"><?=$item['ID_ticket']?></td>
                                        <td class="text-center"><?=$item['fio']?></td>
                                        <td class="text-center"><?=$item['name_specialization']?></td>
                                        <td class="text-center"><?=$item['day']?></td>
                                        <td class="text-center"><?=$item['time']?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'templates/footer.php';
?>