<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_doctor.php';

    $queryDiagnosisListMore = $database->query("SELECT * FROM `diagnosis` WHERE ID_diagnosis = ".$_GET['id']." ");

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <?php while ($item = $queryDiagnosisListMore->fetch_assoc()) : ?>
                <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">СПРАВОЧНИК ДИАГНОЗОВ <i class="fas fa-arrow-right ml-1 mr-2"></i> <?= $item['name_diagnosis'] ?></h4>
                <div class="description border-bottom border-left border-right p-4">
                    <p><strong>Код</strong></p>
                    <p><?= $item['code_diagnosis'] ?></p>
                    <hr>  
                    <p><strong>Описание</strong></p> 
                    <p><?= $item['description'] ?></p> 
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php

    require_once 'templates/footer.php';

?>