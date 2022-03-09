<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_registry.php';
    
    if (!empty($_POST)) {
        $database->query("INSERT INTO `medical_card` (`date_establishment`, `ID_patient`) VALUES ('".$_POST['date_establishment']."', '".$_POST['ID_patient']."')");
    }

    $queryPatientToSelect = $database->query("SELECT `ID_patient`, `fio` FROM `patient`");
    $queryPatientList = $database->query("SELECT `ID_medical_card`, `fio`, `date_establishment`, `insurance_policy` FROM `patient`, `medical_card` WHERE `medical_card`.`ID_patient` = `patient`.`ID_patient`");

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">МЕДИЦИНСКИЕ КАРТЫ</h4>
            <div class="description border-bottom border-left border-right p-4">
                <form action="" method="POST" class="row mb-4">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="date_establishment">Дата заведения</label>
                            <input type="date" id="date_establishment" name="date_establishment" class="form-control">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="ID_patient">Пациент</label>
                            <select name="ID_patient" id="ID_patient" class="form-control" id="">
                                <option value="">-</option>
                                <?php while ($item = $queryPatientToSelect->fetch_assoc()) : ?>
                                    <option value="<?= $item['ID_patient'] ?>"><?= $item['fio'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for=""></label>
                            <button type="submit" class="btn btn-outline-primary form-control"><i class="fas fa-plus mr-2"></i>Завести</button>
                        </div>
                    </div>
                </form>
                <hr>
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">Дата заведения</th>
                            <th scope="col">Страховой полис</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($item = $queryPatientList->fetch_assoc()) : ?>
                            <tr class="text-center align-middle">
                                <th scope="row"><?= $item['ID_medical_card'] ?></th>
                                <td><?= $item['fio'] ?></td>
                                <td><?= $item['date_establishment'] ?></td>
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