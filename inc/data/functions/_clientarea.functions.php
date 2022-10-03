<?php

    function all_settings($con, $extrasql, $type) {
        $response = "";
        $ratings = "";
        $AllSettingsResult = mysqli_query($con, "SELECT * FROM `fta_settings` $extrasql");
        if ($type === "manageTableSettings") {
            if ($AllSettingsResult->num_rows > 0) {
                foreach ($AllSettingsResult as $AllSettings_Key => $AllSettings_Value) {
                    $response = $response . '
                        <tr>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-settings&id=' . $AllSettings_Value['Settings_ID'] . '">' . $AllSettings_Key + 1 . '</a></td>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-settings&id=' . $AllSettings_Value['Settings_ID'] . '">' . $AllSettings_Value['Settings_Label'] . '</a></td>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-settings&id=' . $AllSettings_Value['Settings_ID'] . '">' . htmlspecialchars($AllSettings_Value['Settings_Value']) . '</a></td>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-settings&id=' . $AllSettings_Value['Settings_ID'] . '">' . Date('d-m-Y', strtotime($AllSettings_Value['Settings_Timestamp'])) . '</a></td>
                            <td class="p-1 text-end">
                                <button type="button" class="btn btn-danger rounded-1 btn-sm py-0 px-2" data-bs-toggle="modal" data-bs-target="#settings' . $AllSettings_Key . '">
                                    Slet
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="settings' . $AllSettings_Key . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Sletning - ' . $AllSettings_Value['Settings_Label'] . '</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Er du sikker på at du ville slette: ' . $AllSettings_Value['Settings_Label'] . '
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST">
                                            <input type="hidden" name="type" value="settings">
                                            <button type="submit" class="btn btn-danger" name="delete_this" value="' . $AllSettings_Value['Settings_ID'] . '">Ja</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nej</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
            }
        }
        if ($type === "manageSettingsByID") {
            return $AllSettingsFetch = mysqli_fetch_assoc($AllSettingsResult);
        }
        echo $response;
    }

    function all_users($con, $extrasql, $type) {
        $response = "";
        $ratings = "";
        $AllUsersResult = mysqli_query($con, "SELECT * FROM `fta_users` $extrasql");
        if ($type === "manageTableUsers") {
            if ($AllUsersResult->num_rows > 0) {
                foreach ($AllUsersResult as $AllUsers_Key => $AllUsers_Value) {
                    $response = $response . '
                        <tr>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-users&id=' . $AllUsers_Value['Users_ID'] . '">' . $AllUsers_Key + 1 . '</a></td>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-users&id=' . $AllUsers_Value['Users_ID'] . '">' . $AllUsers_Value['Users_Name'] . '</a></td>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-users&id=' . $AllUsers_Value['Users_ID'] . '">' . htmlspecialchars($AllUsers_Value['Users_Email']) . '</a></td>
                            <td class="p-0"><a class="p-1 d-block text-dark" href="./?page=manage-users&id=' . $AllUsers_Value['Users_ID'] . '">' . Date('d-m-Y', strtotime($AllUsers_Value['Users_Timestamp'])) . '</a></td>
                            <td class="p-1 text-end">
                                <button type="button" class="btn btn-danger rounded-1 btn-sm py-0 px-2" data-bs-toggle="modal" data-bs-target="#users' . $AllUsers_Key . '">
                                    Slet
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="users' . $AllUsers_Key . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Sletning - ' . $AllUsers_Value['Users_Name'] . '</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Er du sikker på at du ville slette: ' . $AllUsers_Value['Users_Name'] . '
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST">
                                            <input type="hidden" name="type" value="users">
                                            <button type="submit" class="btn btn-danger" name="delete_this" value="' . $AllUsers_Value['Users_ID'] . '">Ja</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nej</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
            }
        }
        if ($type === "manageUsersByID") {
            return $AllUsersFetch = mysqli_fetch_assoc($AllUsersResult);
        }
        echo $response;
    }

    function compress_image($source, $destination, $quality) {
        $info = getimagesize($source);
        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($source);
        } elseif ($info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($source);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($source);
        }
        imagejpeg($image, $destination, $quality);
        return $destination;
    }
    
?>