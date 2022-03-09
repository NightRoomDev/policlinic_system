<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_doctor.php';

    $sql = "SELECT * FROM `diagnosis`";

    if (!empty($_POST)) {
        $sql = "SELECT * FROM `diagnosis` WHERE `name_diagnosis` LIKE '%".$_POST['diagnosisFilter']."%' ";
    }
    $queryDiagnosisList = $database->query($sql);
    
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">СПРАВОЧНИК ДИАГНОЗОВ</h4>
            <div class="description border-bottom border-left border-right p-4">
                <form action="" method="POST" class="row mb-3">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Название</label>
                            <input type="text" name="diagnosisFilter" class="form-control">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for=""></label>
                            <button type="submit" class="btn form-control btn-outline-primary"><i class="fas fa-filter"></i>Фильтровать</button>
                        </div>
                    </div>
                </form>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Код</th>
                            <th scope="col" class="text-center">Подробнее</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($item = $queryDiagnosisList->fetch_assoc()) : ?>
                            <tr class="align-middle">
                                <th scope="row"><?= $item['ID_diagnosis'] ?></th>
                                <td><?= $item['name_diagnosis'] ?></td>
                                <td><?= $item['code_diagnosis'] ?></td>
                                <td class="text-center">
                                    <a href="/diagnoses_list_more.php/?id=<?=$item['ID_diagnosis']?>" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></a>
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