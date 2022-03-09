<?php

    require_once 'templates/header.php';
    require_once 'templates/navbar_admin.php';

    $queryListPersonnel = $database->query("SELECT `ID_personnel`, `personnel`.`fio`, `personnel`.`date_birth`, `personnel`.`address`, `personnel`.`phone`, `personnel`.`gender`, `personnel`.`passport_data`, `position`.`name_position`, `specialization`.`name_specialization` FROM `personnel`, `position`, `specialization` WHERE `personnel`.`ID_position` = `position`.`ID_position` AND `specialization`.`ID_specialization` = `personnel`.`ID_specialization`");
    $queryListPositionToSelect = $database->query("SELECT * FROM `position`");
    $queryListSpecializationToSelect = $database->query("SELECT * FROM `specialization`");

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">ПАНЕЛЬ УПРАВЛЕНИЯ <i class="fas fa-arrow-right"></i> СОТРУДНИКИ</h4>
            <div class="description border-bottom border-left border-right p-4">
                <form action="./functions/new_personnel.php" method="POST" class="row mb-4">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="fio">ФИО</label>
                            <input type="text" class="form-control" name="fio" id="fio" placeholder="Введите фио">
                        </div>
                    </div>  
                    <div class="col-3">
                        <div class="form-group">
                            <label for="date_birth">Дата рождения</label>
                            <input type="date" class="form-control" name="date_birth" id="date_birth" placeholder="Введите ФИО">
                        </div>
                    </div>  
                    <div class="col-3">
                        <div class="form-group">
                            <label for="address">Адрес жительства</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Введите адрес">
                        </div>
                    </div>  
                    <div class="col-3">
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Введите телефон">
                        </div>
                    </div>  
                    <div class="col-1 mt-3">
                        <div class="form-group">
                            <label for="gender">Пол</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">-</option>
                                <option value="1">М</option>
                                <option value="0">Ж</option>
                            </select>
                        </div>
                    </div>  
                    <div class="col-3 mt-3">
                        <div class="form-group">
                            <label for="passport_data">Паспортные данные</label>
                            <input type="text" class="form-control" name="passport_data" id="passport_data" placeholder="Введите с/н паспорта">
                        </div>
                    </div>
                    <div class="col-3 mt-3">
                        <div class="form-group">
                            <label for="ID_position">Должность</label>
                            <select name="ID_position" class="form-control" id="ID_position">
                                <option value="-">-</option>
                                <?php while ($item = $queryListPositionToSelect->fetch_assoc()) : ?>
                                    <option value="<?=$item['ID_position']?>"><?=$item['name_position']?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 mt-3">
                        <div class="form-group">
                            <label for="ID_specialization">Специализация</label>
                            <select name="ID_specialization" class="form-control" id="ID_specialization">
                                <option value="-">-</option>
                                <?php while ($item = $queryListSpecializationToSelect->fetch_assoc()) : ?>
                                    <option value="<?=$item['ID_specialization']?>"><?=$item['name_specialization']?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-3 mt-3">
                        <div class="form-group">
                            <label for="login">Логин</label>
                            <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин">
                        </div>
                    </div> 
                    <hr class="mt-4">
                    <div class="col-3 mt-2 offset-9">
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary form-control"><i class="fas fa-plus mr-2"></i>Добавить</button>                                
                        </div>
                    </div>
                </form> 
                <hr>
                <table class="table table-hover table-bordered mt-4">
                    <thead class="bg-light">
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">Дата рождения</th>
                            <th scope="col">Адрес</th>
                            <th scope="col">Телефон</th>
                            <th scope="col">Пол</th>
                            <th scope="col">Паспортные данные</th>
                            <th scope="col">Должность</th>
                            <th scope="col">Специализация</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($item = $queryListPersonnel->fetch_assoc()) : ?>
                            <tr class="text-center align-middle">
                                <td><?=$item['ID_personnel']?></td>
                                <td><?=$item['fio']?></td>
                                <td><?=$item['date_birth']?></td>
                                <td><?=$item['address']?></td>
                                <td><?=$item['phone']?></td>
                                <?php if ($item['gender'] == '1'): ?>
                                    <td>М</td>
                                <?php else: ?>
                                    <td>Ж</td>
                                <?php endif; ?>
                                <td><?=$item['passport_data']?></td>
                                <td><?=$item['name_position']?></td>
                                <td><?=$item['name_specialization']?></td>
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