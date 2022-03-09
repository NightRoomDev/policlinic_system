<?php 

    require_once 'templates/header.php';
    require_once 'templates/navbar_patient.php';

?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h4 class="bg-light p-4 border shadow-sm title-logo mb-0 text-secondary">СИСТЕМА ЗАПИСИ НА ПРИЁМ К ВРАЧУ</h4>
                <div class="description border-bottom border-left border-right">
                    <h4 class="p-4">Добро пожаловать, <?=$_SESSION['userdata']['fio']?>.</h4>
                    <p class="pl-4 pr-4">Вы вошли в личный кабинет.</p>
                    <p class="pl-4 pr-4">В личном кабинете вы можете <a href="/recording_doctor.php">записаться на приём</a> к необходимому вам врачу, просматривать <a href="/schedule_doctor.php">расписание врачей</a>, а так-же свои <a href="/profile_patient.php">личные данные.</a></p>
                </div>
            </div>
        </div>
    </div>

<?php 
    require_once 'templates/footer.php';
?>
