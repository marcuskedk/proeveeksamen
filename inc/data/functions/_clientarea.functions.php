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
                                <form method="POST">
                                    <button type="submit" name="delete_settings" value="' . $AllSettings_Value['Settings_ID'] . '" class="btn btn-danger rounded-1 btn-sm py-0 px-2">Slet</button>
                                </form>
                            </td>
                        </tr>
                    ';
                }
            }
        }
        if ($type === "manageSettingsByID") {
            return $AllSettingsFetch = mysqli_fetch_assoc($AllSettingsResult);
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