<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-primary ">
    <div class="container">
        <a class="navbar-brand" href="main.php">Planer</a>

        <button class="navbar-toggler" data-bs-target="#navbar" data-bs-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse " id="navbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="main.php">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add%20event.php">Dodaj wydarzenie do kalendarza</a>
                </li>
            </ul>
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