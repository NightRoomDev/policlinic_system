<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_registry.php';

    $queryListPatient = $database->query("CALL listPatient");

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">ПАЦИЕНТЫ</h4>
            <div class="description border-bottom border-left border-right p-4">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center align-middle">
                            <th scope="col">#</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">Возраст</th>
                            <th scope="col">Телефон</th>
                            <th scope="col">Паспортные данные</th>
                            <th scope="col">Страховой полис</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($item = $queryListPatient->fetch_assoc()) : ?>
                            <tr class="text-center align-middle">
                                <th scope="row"><?= $item['ID_patient'] ?></th>
                                <td><?= $item['fio'] ?></td>
                                <td><?= $item['age'] ?></td>
                                <td><?= $item['phone'] ?></td>
                                <td><?= $item['passport_data'] ?></td>
                                <td><?= $item['insurance_policy'] ?></td>
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