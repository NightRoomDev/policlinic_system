<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_doctor.php';

    $queryRecordingToMeToday = $database->query("CALL recordingToMePatientsToday(".$_SESSION['userdata']['id'].")");

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">ЗАПИСИ НА СЕГОДНЯ</h4>
            <div class="description border-bottom border-left border-right p-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">Время</th>
                            <th scope="col" class="text-center">Прием</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($item = $queryRecordingToMeToday->fetch_assoc()) : ?>
                            <tr class="align-middle">
                                <th scope="row"><?=$item['ID_visit']?></th>
                                <td><?=$item['fio']?></td>
                                <td><?=substr($item['time'], 0, 5)?></td>
                                <td class="text-center">
                                    <a href="reception.php?id=<?=$item['ID_visit']?>&idT=<?=$item['ID_ticket']?>" class="btn btn-outline-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
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