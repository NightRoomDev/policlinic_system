<?php

    require_once 'templates/header.php';

    if (!empty($_POST)) {

        switch ($_POST['role']) {
            case 'Врач':
                $sqlAuthInSystem = "SELECT * FROM `personnel` WHERE `login` = '".$_POST["login"]."' AND `password` = '".$_POST["password"]."'";
                $redirectTo = 'receptions.php';
                break;
            case 'Регистратор':
                $sqlAuthInSystem = "SELECT * FROM `personnel` WHERE `login` = '".$_POST["login"]."' AND `password` = '".$_POST["password"]."'";
                $redirectTo = 'registry.php';
                break;
            case 'Пациент':
                $sqlAuthInSystem = "SELECT `patient`.`ID_patient`, `fio`, `ID_medical_card` FROM `patient`, `medical_card` WHERE `patient`.`ID_patient` = `medical_card`.`ID_patient` AND `login` = '".$_POST["login"]."' AND `password` = '".$_POST["password"]."'";
                $redirectTo = 'patient.php';
                break;
        }
        
        $queryAuthInSystem = $database->query($sqlAuthInSystem);
        $user = $queryAuthInSystem->fetch_row();

        if (!empty($user)) {
            $_SESSION['userdata'] = [
                'id' => $user[0],
                'fio' => $user[1],
                'ID_medical_card' => $user[2]
            ];
            header('Location: /'.$redirectTo);
        }


    }

?>

<div class="container" style="height: 100vh">
    <div class="row d-flex justify-content-center h-100 align-items-center">
        <div class="col-5 border p-4 bg-white shadow-lg rounded">
            <form class="" action="" method="POST">
                <div class="p-3 border-bottom mb-3">
                    <h4 class="text-uppercase title-logo"><i class="fas fa-heartbeat text-danger"></i> Вход в систему</h4>
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Логин</label>
                    <input type="text" class="form-control" name="login" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите ваш логин">
                </div>
                <div class="mb-2">
                    <label for="exampleInputPassword2" class="form-label">Пароль</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword2" placeholder="Введите ваш пароль">
                </div>
                <div class="mb-2">
                    <label for="exampleInputPassword3" class="form-label">Пользователь</label>
                    <select name="role" class="form-control" id="exampleInputPassword3">
                        <option value="-">-</option>
                        <option value="Врач">Врач</option>
                        <option value="Регистратор">Регистратор</option>
                        <option value="Пациент">Пациент</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-sign-in-alt mr-2"></i>Войти</button>
            </form>
        </div>
    </div>
</div>

<?php
    require_once 'templates/footer.php';
?>