<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_admin.php';

    $queryListSpecialization = $database->query("SELECT * FROM `specialization`");

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">ПАНЕЛЬ УПРАВЛЕНИЯ <i class="fas fa-arrow-right"></i> СПЕЦИАЛИЗАЦИЯ</h4>
            <div class="description border-bottom border-left border-right p-4">
                <form action="./functions/new_specialization.php"method="POST" class="row mb-4">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="name_specialization">Название</label>
                            <input type="text" class="form-control" id="name_specialization" name="name_specialization" placeholder="Введите специализацию">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="" style="visibility: hidden">ГГГ</label>
                            <button type="submit" class="form-control btn btn-outline-primary"><i class="fas fa-plus mr-2"></i>Добавить</button>
                        </div>
                    </div>
                </form> 
                <hr>
                <table class="table table-hover table-bordered mt-4">
                    <thead class="bg-light">
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Спеиализация</th>
                            <th scope="col">Операции</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($item = $queryListSpecialization->fetch_assoc()) : ?>
                            <tr class="align-middle text-center">
                                <th scope="row"><?= $item['ID_specialization'] ?></th>
                                <td><?= $item['name_specialization'] ?></td>
                                <td>
                                    <a href="./edit_specialization_page.php?id=<?= $item['ID_specialization'] ?>" class="btn btn-outline-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="./functions/delete_specialization.php?id=<?= $item['ID_specialization'] ?>" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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