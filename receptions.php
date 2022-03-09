<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_doctor.php';

    $queryListReceptionsThisDoctor = $database->query("SELECT `ticket`.`ID_ticket`, `ticket`.`visit`, `patient`.`fio`, `ticket`.`day`, `ticket`.`time` FROM `ticket`, `personnel`, `specialization`, `patient`, `medical_card` WHERE `personnel`.`ID_specialization` = `specialization`.`ID_specialization` AND `personnel`.`ID_personnel` = `ticket`.`ID_personnel` AND `ticket`.`ID_medical_card` = `medical_card`.`ID_medical_card` AND `medical_card`.`ID_patient` = `patient`.`ID_patient` AND `personnel`.`ID_personnel` = " . $_SESSION['userdata']['id'] . "");

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">ПРИЕМЫ</h4>
            <div class="description border-bottom border-left border-right p-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Время</th>
                            <th scope="col">Статус</th>
                            <th scope="col" class="text-center">Продолжить</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($item = $queryListReceptionsThisDoctor->fetch_assoc()) : ?>
                            <tr style="vertical-align: middle;">
                                <td><?= $item['ID_ticket'] ?></td>
                                <td><?= $item['fio'] ?></td>
                                <td><?= $item['day'] ?></td>
                                <td><?= $item['time'] ?></td>
                                <?php if($item['visit'] == 0): ?>
                                    <td>Не проведен</td>
                                <?php else: ?>
                                    <td>Проведен</td>
                                <?php endif; ?>
                                <td class="text-center">
                                    <a href="reception.php?id=<?= $item['ID_ticket'] ?>" class="btn btn-outline-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
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