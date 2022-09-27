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
            }
        }
        echo $response;
    }

    function all_travels($con, $extrasql, $type) {
        $response = "";
        $ratings = "";
        $AllTravelsResult = mysqli_query($con, "SELECT * FROM `fta_travels` $extrasql");
        if ($AllTravelsResult->num_rows > 0) {
            if ($type === "travels") {
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
                                                    <span class="visually-hidden">Next</span>
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
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Luk</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
            }
        }
        echo $response;
    }

?>