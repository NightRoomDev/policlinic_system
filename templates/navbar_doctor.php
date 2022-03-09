<nav class="navbar navbar-expand-lg navbar-light shadow-sm border-bottom">
    <div class="container">
        <a class="navbar-brand text-danger border-right pr-4 title-logo" href="#"><i class="fas fa-heartbeat"></i> ВРАЧ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../receptions.php"><i class="fas fa-clock mr-2"></i>Приемы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../medical_lists.php"><i class="fas fa-book mr-2"></i>Больничные</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../diagnoses_list.php" aria-current="page"><i class="fas fa-list-alt mr-2"></i>Справочник диагнозов</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control mr-2" type="search" placeholder="Введите запрос..." aria-label="Search">
                <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search d-inline mr-2"></i>Поиск</button>
            </form>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../profile_doctor.php"><i class="fas fa-id-badge mr-2"></i>Профиль</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./functions/exit.php"><i class="fas fa-door-open mr-2"></i>Выйти</a>
                </li>
            </ul>
        </div>
    </div>
</nav>