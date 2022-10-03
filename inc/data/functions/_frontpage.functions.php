<?php

    function all_contacts($con, $extrasql, $type) {
        $response = "";
        $AllContactsResult = mysqli_query($con, "SELECT * FROM `fta_contacts` $extrasql");
        if ($AllContactsResult->num_rows > 0) {
            if ($type === "contacts") {
                foreach ($AllContactsResult as $AllContacts_Key => $AllContacts_Value) {
                    $response = $response . '
                        <p class="mb-0">' . $AllContacts_Value['Contacts_Content'] . '</p>
                    ';
                }
            } else if ($type === "manageTableContacts") {
                foreach ($AllContactsResult as $AllContacts_Key => $AllContacts_Value) {
                    $response = $response . '
                        <tr>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-contacts&id=' . $AllContacts_Value['Contacts_ID'] . '">' . $AllContacts_Key + 1 . '</a></td>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-contacts&id=' . $AllContacts_Value['Contacts_ID'] . '">' . $AllContacts_Value['Contacts_Content'] . '</a></td>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-contacts&id=' . $AllContacts_Value['Contacts_ID'] . '">' . Date('d-m-Y', strtotime($AllContacts_Value['Contacts_Timestamp'])) . '</a></td>
                            <td class="p-1 text-end">
                                <button type="button" class="btn btn-danger rounded-1 btn-sm py-0 px-2" data-bs-toggle="modal" data-bs-target="#contacts' . $AllContacts_Key . '">
                                    Slet
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="contacts' . $AllContacts_Key . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Sletning - ' . $AllContacts_Value['Contacts_Content'] . '</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Er du sikker på at du ville slette: ' . $AllContacts_Value['Contacts_Content'] . '
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST">
                                            <input type="hidden" name="type" value="contacts">
                                            <button type="submit" class="btn btn-danger" name="delete_this" value="' . $AllContacts_Value['Contacts_ID'] . '">Ja</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nej</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
            } else if ($type === "manageContactsByID") {
                return $AllContactsFetch = mysqli_fetch_assoc($AllContactsResult);
            }
        }
        echo $response;
    }

    function all_abouts($con, $extrasql, $type) {
        $response = "";
        $AllAboutsResult = mysqli_query($con, "SELECT * FROM `fta_abouts` $extrasql");
        if ($AllAboutsResult->num_rows > 0) {
            if ($type === "abouts") {
                foreach ($AllAboutsResult as $AllAbouts_Key => $AllAbouts_Value) {
                    $response = $response . '
                        <div class="col-lg-8">
                            <h5>' . $AllAbouts_Value['Abouts_Title'] . '</h5>
                            <p>' . $AllAbouts_Value['Abouts_Content'] . '</p>
                        </div>
                        <div class="col-lg-4">
                            <img src="./assets/files/img/abouts/' . $AllAbouts_Value['Abouts_IMG'] . '" width="100%" title="' . $AllAbouts_Value['Abouts_Title'] . '" alt="' . $AllAbouts_Value['Abouts_Title'] . '">
                        </div>
                    ';
                }
            } else if ($type === "manageTableAbouts") {
                foreach ($AllAboutsResult as $AllAbouts_Key => $AllAbouts_Value) {
                    $response = $response . '
                        <tr>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-abouts&id=' . $AllAbouts_Value['Abouts_ID'] . '">' . $AllAbouts_Key + 1 . '</a></td>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-abouts&id=' . $AllAbouts_Value['Abouts_ID'] . '">' . $AllAbouts_Value['Abouts_Title'] . '</a></td>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-abouts&id=' . $AllAbouts_Value['Abouts_ID'] . '">' . Date('d-m-Y', strtotime($AllAbouts_Value['Abouts_Timestamp'])) . '</a></td>
                            <td class="p-1 text-end">
                                <button type="button" class="btn btn-danger rounded-1 btn-sm py-0 px-2" data-bs-toggle="modal" data-bs-target="#abouts' . $AllAbouts_Key . '">
                                    Slet
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="abouts' . $AllAbouts_Key . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Sletning - ' . $AllAbouts_Value['Abouts_Title'] . '</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Er du sikker på at du ville slette: ' . $AllAbouts_Value['Abouts_Title'] . '
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST">
                                            <input type="hidden" name="type" value="abouts">
                                            <button type="submit" class="btn btn-danger" name="delete_this" value="' . $AllAbouts_Value['Abouts_ID'] . '">Ja</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nej</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
            } else if ($type === "manageAboutsByID") {
                return $AllAboutsFetch = mysqli_fetch_assoc($AllAboutsResult);
            }
        }
        echo $response;
    }

    function all_travels($con, $extrasql, $type) {
        $response = "";
        $ratings = "";
        $AllTravelsResult = mysqli_query($con, "SELECT * FROM `fta_travels` $extrasql");
        if ($type === "manageTableTravels") {
            if ($AllTravelsResult->num_rows > 0) {
                foreach ($AllTravelsResult as $AllTravels_Key => $AllTravels_Value) {
                    $response = $response . '
                        <tr>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-travels&id=' . $AllTravels_Value['Travels_ID'] . '">' . $AllTravels_Key + 1 . '</a></td>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-travels&id=' . $AllTravels_Value['Travels_ID'] . '">' . $AllTravels_Value['Travels_Title'] . '</a></td>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-travels&id=' . $AllTravels_Value['Travels_ID'] . '">' . Date('d-m-Y', strtotime($AllTravels_Value['Travels_Timestamp'])) . '</a></td>
                            <td class="p-1 text-end">
                                <button type="button" class="btn btn-danger rounded-1 btn-sm py-0 px-2" data-bs-toggle="modal" data-bs-target="#travels' . $AllTravels_Key . '">
                                    Slet
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="travels' . $AllTravels_Key . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Sletning - ' . $AllTravels_Value['Travels_Title'] . '</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Er du sikker på at du ville slette: ' . $AllTravels_Value['Travels_Title'] . '
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST"><input type="hidden" name="type" value="travels"><button type="submit" class="btn btn-danger" name="delete_this" value="' . $AllTravels_Value['Travels_ID'] . '">Ja</button></form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nej</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
            }
        }
        if ($type === "manageTravelsByID") {
            return $AllTravelsFetch = mysqli_fetch_assoc($AllTravelsResult);
        }
        if ($type === "travels" || $type === "searchTravels") {
            if ($AllTravelsResult->num_rows > 0) {
                foreach ($AllTravelsResult as $AllTravels_Key => $AllTravels_Value) {
                    $response = $response . '
                        <div class="col-lg-4">
                            <div class="card rounded-1">
                                <img src="./assets/files/img/travels/' . $AllTravels_Value['Travels_Country'] . '/' . $AllTravels_Value['Travels_IMG'] . '" title="' . $AllTravels_Value['Travels_Title'] . '" alt="' . $AllTravels_Value['Travels_Title'] . '" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        ' . $AllTravels_Value['Travels_Title'] . '
                                        <span class="float-end">';
                                        for ($i=1; $i <= $AllTravels_Value['Travels_Ratings']; $i++) {
                                            $response = $response . '
                                                <svg class="bi" width="15" height="15" fill="#be1313">
                                                    <use xlink:href="./assets/files/icons/bootstrap-icons.svg#star-fill"/>
                                                </svg>
                                            ';
                                        }
                                        $response = $response . '</span>
                                    </h5>
                                    <p class="card-subtitle mb-2 text-muted">' . Date('d. M Y', strtotime($AllTravels_Value['Travels_Date'])) . '</p>
                                    <p>' . $AllTravels_Value['Travels_Subtitle'] . '</p>
                                    <button type="button" class="btn btn-danger rounded-1" data-bs-toggle="modal" data-bs-target="#travels' . $AllTravels_Key . '">
                                        Læs mere
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="travels' . $AllTravels_Key . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">' . $AllTravels_Value['Travels_Country'] . '</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="./assets/files/img/travels/' . $AllTravels_Value['Travels_Country'] . '/' . $AllTravels_Value['Travels_IMG'] . '" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="./assets/files/img/travels/' . $AllTravels_Value['Travels_Country'] . '/' . $AllTravels_Value['Travels_IMG'] . '" class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="./assets/files/img/travels/' . $AllTravels_Value['Travels_Country'] . '/' . $AllTravels_Value['Travels_IMG'] . '" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Næste</span>
                                                </button>
                                            </div>
                                            <h2>' . $AllTravels_Value['Travels_Title'] . '</h2>
                                            <div class="">
                                                <h5>Du får:</h5>
                                                ' . $AllTravels_Value['Travels_Content'] . '
                                            </div>
                                            <div class="">
                                                <h5>Værelsestype:</h5>
                                                ' . $AllTravels_Value['Travels_RoomType'] . '
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <div class="d-flex align-items-center">';
                                            for ($i=1; $i <= $AllTravels_Value['Travels_Ratings']; $i++) {
                                                $response = $response . '
                                                    <svg class="bi me-1" width="15" height="15" fill="#be1313">
                                                        <use xlink:href="./assets/files/icons/bootstrap-icons.svg#star-fill"/>
                                                    </svg>
                                                ';
                                            }
                                            if (isset($_SESSION['loggedin']) === false) {
                                                $response = $response . '<a class="ms-2" data-bs-toggle="modal" href="#login' . $AllTravels_Key . '" role="button">Ville du gerne anmelde denne rejse?</a>';
                                            } else {
                                                $response = $response . '<a class="ms-2" data-bs-toggle="modal" href="#rating' . $AllTravels_Key . '" role="button">Lav en anmeldelse</a>';
                                            }
                                            $response = $response . '</div>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Luk</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="login' . $AllTravels_Key . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <form class="modal-content" method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Log ind før du kan anmelde</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body row g-3">';
                                            if (isset($_SESSION['loggedin']) === false) {
                                                $response = $response . '
                                                    <div class="col-12">
                                                        <label for="email-validate' . $AllTravels_Key . '" class="form-label">Email</label>
                                                        <input type="email" name="email" id="email-validate' . $AllTravels_Key . '" placeholder="Email" class="form-control rounded-1" value="' . ((isset($_POST['email'])) ? $_POST['email'] : '') . '" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="password-validate' . $AllTravels_Key . '" class="form-label">Adgangskode</label>
                                                        <input type="password" name="password" id="password-validate' . $AllTravels_Key . '" placeholder="Adgangskode" class="form-control rounded-1" value="' . ((isset($_POST['password'])) ? $_POST['password'] : '') . '" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="hidden" name="type" value="rating">
                                                        <input type="hidden" name="id" value="' . $AllTravels_Key . '">
                                                        <p class="mb-0">Har du ikke en konto? <a href="./clientarea/?type=register">Klik her</a></p>
                                                    </div>
                                                ';
                                            }
                                        $response = $response . '</div>
                                        <div class="modal-footer justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <a class="btn btn-secondary me-2" data-bs-toggle="modal" href="#travels' . $AllTravels_Key . '" role="button">Tilbage</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Luk</button>
                                            </div>
                                            <button type="submit" class="btn btn-danger" name="login">Log ind</button>
                                        </div>
                                    </form>
                                </div>
                            </div>';
                            if (isset($_GET['type']) == "rating" && isset($_GET['id']) == $AllTravels_Key) {
                                $response = $response . '
                                    <script>
                                        $(document).ready(function() {
                                            $("#rating' . $_GET['id'] . '").modal("show");
                                        });
                                    </script>
                                ';
                            }
                            $response = $response . '<div class="modal fade" id="rating' . $AllTravels_Key . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <form class="modal-content" method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hvor mange stjerner?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body row g-3">';
                                            if (isset($_SESSION['loggedin']) === true) {
                                                $response = $response . '
                                                    <div style="width: fit-content; margin: auto;">
                                                        <input class="star star-5" id="star-5" type="radio" name="star"/>
                                                        <label class="star star-5" for="star-5">
                                                            <svg class="bi me-1" width="35" height="35" fill="#000">
                                                                <use xlink:href="./assets/files/icons/bootstrap-icons.svg#star-fill"/>
                                                            </svg>
                                                        </label>
                                                        <input class="star star-4" id="star-4" type="radio" name="star"/>
                                                        <label class="star star-4" for="star-4">
                                                            <svg class="bi me-1" width="35" height="35" fill="#000">
                                                                <use xlink:href="./assets/files/icons/bootstrap-icons.svg#star-fill"/>
                                                            </svg>
                                                        </label>
                                                        <input class="star star-3" id="star-3" type="radio" name="star"/>
                                                        <label class="star star-3" for="star-3">
                                                            <svg class="bi me-1" width="35" height="35" fill="#000">
                                                                <use xlink:href="./assets/files/icons/bootstrap-icons.svg#star-fill"/>
                                                            </svg>
                                                        </label>
                                                        <input class="star star-2" id="star-2" type="radio" name="star"/>
                                                        <label class="star star-2" for="star-2">
                                                            <svg class="bi me-1" width="35" height="35" fill="#000">
                                                                <use xlink:href="./assets/files/icons/bootstrap-icons.svg#star-fill"/>
                                                            </svg>
                                                        </label>
                                                        <input class="star star-1" id="star-1" type="radio" name="star" checked/>
                                                        <label class="star star-1" for="star-1">
                                                            <svg class="bi me-1" width="35" height="35" fill="#000">
                                                                <use xlink:href="./assets/files/icons/bootstrap-icons.svg#star-fill"/>
                                                            </svg>
                                                        </label>
                                                    </div>
                                                ';
                                            }
                                        $response = $response . '</div>
                                        <div class="modal-footer justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <a class="btn btn-secondary me-2" data-bs-toggle="modal" href="#travels' . $AllTravels_Key . '" role="button">Tilbage</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Luk</button>
                                            </div>
                                            <button type="submit" class="btn btn-danger" name="rating">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                }
            }
        }
        if ($type === "searchTravels") {
            if (!$AllTravelsResult->num_rows > 0) {
                $response = $response . '
                    <div class="col-12">
                        <div class="alert alert-danger">Ingen resultater</div>
                    </div>
                ';
            }
        }
        echo $response;
    }

?>