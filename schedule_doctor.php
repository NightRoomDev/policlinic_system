<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_patient.php';

    $queryScheduleList = $database->query("SELECT `ID_reception_schedule`, `start_reception`, `end_reception`, `date_reception`, `fio`, `name_position`, `name_specialization` FROM `specialization`, `position`, `personnel`, `reception_schedule` WHERE `reception_schedule`.`ID_personnel` = `personnel`.`ID_personnel` AND `position`.`ID_position` = `personnel`.`ID_position` AND `specialization`.`ID_specialization` = `personnel`.`ID_specialization`");

?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">РАСПИСАНИЕ ВРАЧЕЙ</h4>
            <div class="border-bottom border-left border-right p-4">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">Врач</th>
                                    <th scope="col" class="text-center">Специализация</th>
                                    <th scope="col" class="text-center">Должность</th>
                                    <th scope="col" class="text-center">Начало приёма</th>
                                    <th scope="col" class="text-center">Окончание приёма</th>
                                    <th scope="col" class="text-center">Дата приёма</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($item = $queryScheduleList->fetch_assoc()) : ?>
                                    <tr class="align-middle">
                                        <td class="text-center"><?=$item['ID_reception_schedule']?></td>
                                        <td class="text-center"><?=$item['fio']?></td>
                                        <td class="text-center"><?=$item['name_specialization']?></td>
                                        <td class="text-center"><?=$item['name_position']?></td>
                                        <td class="text-center"><?=$item['start_reception']?></td>
                                        <td class="text-center"><?=$item['end_reception']?></td>
                                        <td class="text-center"><?=$item['date_reception']?></td>
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