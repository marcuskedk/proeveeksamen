<?php

    function all_travels($con, $extrasql, $type) {
        $response = "";
        $AllTravelsResult = mysqli_query($con, "SELECT * FROM `fta_travels` $extrasql");
        if ($AllTravelsResult->num_rows > 0) {
            if ($type === "travels") {
                foreach ($AllTravelsResult as $AllTravels_Key => $AllTravels_Value) {
                    $response = $response . '
                        <div class="col-lg-4">
                            <div class="card">
                                <img src="./assets/files/img/travels/' . $AllTravels_Value['Travels_Country'] . '/' . $AllTravels_Value['Travels_IMG'] . '" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">' . $AllTravels_Value['Travels_Title'] . '</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">' . Date('d. M Y', strtotime($AllTravels_Value['Travels_Timestamp'])) . '</h6>
                                    <p>' . $AllTravels_Value['Travels_Description'] . '</p>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#travels' . $AllTravels_Key . '">
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
                                            <h5>' . $AllTravels_Value['Travels_Title'] . '</h5>
                                            <p>' . $AllTravels_Value['Travels_Description'] . '</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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