<?php
header('Content-type: text/html; charset=utf-8');
$wall_id = ""; // Положительное число: пользователь. Отрицательное: группа.
$count = ""; // Количество записей, которое необходимо получить. Максимальное значение: 100.
$access_token = "";
$api = file_get_contents("http://api.vk.com/method/wall.get?access_token={$access_token}&v=5.74&owner_id={$wall_id}&count={$count}");

$wall = json_decode($api, true);
foreach ($wall['response'] as $result) {
    for ($i = 0; $i < 5; $i++) {
        if (isset($result[$i]['text'])) {
            echo $result[$i]['text'];
            echo "<br><br>";

        }

        if (isset($result[$i]['attachments'])) {
            foreach ($result[$i]['attachments'] as $vk_g) {
                echo "<img style='width: 120px;' src='" . $vk_g['photo']['photo_1280'] . "'><br>";

            }
        }
    }
}

?>
