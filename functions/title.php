<?php

$requestName = explode('/', $_SERVER['REQUEST_URI']);
switch ($requestName[1]) {
    case '':
        $title = 'Вход в систему';
        break;
    case 'doctor.php':
        $title = 'Записи на сегодня';
        break;
    case 'medical_lists.php':
        $title = 'Больничные';
        break;
    case 'diagnoses_list.php':
        $title = 'Справочник диагнозов';
        break;
    case 'receptions.php':
        $title = 'Приемы';
        break;
    case 'profile_doctor.php';
        $title = 'Профиль';
        break;
    case 'patient.php';
        $title = 'Система записи на прием';
        break;
    case 'recording_doctor.php';
        $title = 'Запись на прием';
        break;
    case 'schedule_doctor.php';
        $title = 'Расписание врачей';
        break;
    case 'profile_patient.php';
        $title = 'Профиль';
        break;
    case 'registry.php';
        $title = 'Регистратура';
        break;
    case 'new_medical_cart.php';
        $title = 'Медицинские карты';
        break;
    case 'patients.php';
        $title = 'Список пациентов';
        break;
    case 'schedule_doctor_registry.php';
        $title = 'Расписание врачей';
        break;
    case 'search.php';
        $title = 'Результаты поиска';
        break;
    case 'profile_patient_edit.php';
        $title = 'Редактирование личных данных';
        break;
    case 'admin.php';
        $title = 'Панель управления';
        break;
}
