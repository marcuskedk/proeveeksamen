    <nav class="fta-navbar-first navbar navbar-expand-lg navbar-light bg-light">
        <div class="d-flex flex-column h-100 navbar-fta-menu">
            <a href="<?=$URL_E;?>/#top" class="nav-brand py-2 px-3 d-inline-block">
                <img src="<?=$URL_E;?>/assets/files/img/<?=$Settings_Logo_Bottom;?>" alt="<?=$Settings_Title;?>" title="<?=$Settings_Title;?>" width="150px" />
            </a>
            <ul class="navbar-nav mx-auto align-items-center">
                <li class="nav-item">
                    <a href="<?=$URL_E;?>/#events" class="nav-link nav-link-top">Events</a>
                </li>
                <li class="nav-item">
                    <a href="<?=$URL_E;?>/#top" class="nav-link"><img src="<?=$URL_E;?>/assets/files/img/<?=$Settings_Logo_Top;?>" alt="<?=$Settings_Title;?>" title="<?=$Settings_Title;?>" width="200px" /></a>
                </li>
                <li class="nav-item">
                    <a href="<?=$URL_E;?>/#travels" class="nav-link nav-link-top">Travels</a>
                </li>
            </ul>
            <div class="w-100 text-center">
                <a href="#about">
                    <svg class="bi bounce-2" width="80" height="80" fill="#000">
                        <use xlink:href="<?=$URL_E;?>/assets/files/icons/bootstrap-icons.svg#arrow-down"/>
                    </svg>
                </a>
            </div>
        </div>
    </nav>
    <nav class="fta-navbar-second navbar navbar-expand-lg navbar-dark bg-dark position-sticky top-0" id="fta-navbar">
        <div class="container">
            <a href="<?=$URL_E;?>/" class="nav-brand">
                <img src="<?=$URL_E;?>/assets/files/img/<?=$Settings_Logo_Bottom;?>" alt="<?=$Settings_Title;?>" title="<?=$Settings_Title;?>" width="200px" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form class="d-flex d-flex d-lg-none" role="search" method="POST">
                <input class="form-control rounded-1 me-2" type="search" name="search" value="<?=(isset($_GET['search'])) ? $_GET['search'] : '';?>" placeholder="Søg..." aria-label="Søg" required>
                <button class="btn btn-outline-secondary rounded-1" type="submit" name="searchnow" title="Søg">Søg</button>
            </form>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?=$URL_E;?>/#about" class="nav-link" title="Om os">Om os</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=$URL_E;?>/#travels" class="nav-link" title="Produkter">Rejsemål</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=$URL_E;?>/#contact" class="nav-link" title="Kontakt">Kontakt</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <form class="d-flex d-none d-lg-flex ms-auto mb-0" role="search" method="POST">
                        <input class="form-control rounded-1 me-2" type="search" name="search" value="<?=(isset($_GET['search'])) ? $_GET['search'] : '';?>" placeholder="Søg..." aria-label="Søg" required>
                        <button class="btn btn-outline-secondary rounded-1 me-2" type="submit" name="searchnow" title="Søg">Søg</button>
                    </form>
                    <?php if (isset($_SESSION['loggedin']) === false) { ?>
                        <li class="nav-item">
                            <a href="<?=$URL_E;?>/clientarea/?type=login" class="btn btn-danger rounded-1 me-2 mb-2 mb-lg-0" title="Log ind">Log ind</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=$URL_E;?>/clientarea/?type=register" class="btn btn-danger rounded-1" title="Opret konto">Opret konto</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="<?=$URL_E;?>/clientarea/?page=dashboard" class="btn btn-danger rounded-1 me-2 mb-2 mb-lg-0" title="Kundeside">Kundeside</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=$URL_E;?>/clientarea/?type=logout" class="btn btn-danger rounded-1" title="Log ud">Log ud</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>