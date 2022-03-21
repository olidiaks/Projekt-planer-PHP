<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-primary ">
    <div class="container">
        <a class="navbar-brand" href="https://github.com/olidiaks/Projekt-planer-PHP">Planer</a>

        <button class="navbar-toggler" data-bs-target="#navbar" data-bs-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse " id="navbar">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="main.php" id="mainPHP">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add%20event.php">Dodaj wydarzenie do kalendarza</a>
                </li>
                <li>
                    <div class="nav-item">
                        <a href="logout.php" class="nav-link">Wyloguj się.</a>
                    </div>
                </li>
            </ul>
            <div class="dropdown ">
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="sortOption"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    Rodzaj sortowania.
                </button>
                <ul class="dropdown-menu" aria-labelledby="sortOption">
                    <li><a class="dropdown-item" id="dataSort" href="main.php?dataSort=1">Sortowanie po dacie</a></li>
                    <li>
                        <a class="dropdown-item" id="isDoneSort" href="main.php?dataSort=0">
                            Sortowanie po tym, czy zadanie zostało wykonane.
                        </a>
                    </li>
                </ul>
            </div>
            <form class="d-flex mt-1 mt-lg-0 me-auto ms-lg-1" action="main.php" method="post">
                <input class="form-control me-2" type="search" name="search" placeholder="Wpisz czego chcesz szukać"
                       aria-label="Search">
                <button class="btn btn-success" type="submit">Poszukaj</button>
            </form>
            <div class="navbar-text">
                Witaj
                <?php
                $sql = "select userName from Users where idUser = '" . $_SESSION['idUser'] . "'";
                $query = mysqli_query($con, $sql);
                echo mysqli_fetch_array($query)['userName'];
                ?>!
            </div>
        </div>
    </div>
</nav>