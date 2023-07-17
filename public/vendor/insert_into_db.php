<?php

require_once 'connect.php';
require_once 'get_equipment_type_mask.php';
require_once 'check_mask_to_regex.php';

$serial_numbers = $_POST['serial_numbers'];
$equipment_type = $_POST['equipment_type'];

$serial_numbers = explode("\n", str_replace("\r", "", $serial_numbers));
$equipment_type_mask = get_equipment_type_mask($equipment_type, $connection);

$feedback = array();
$alerts = array('Серийный номер уже существует в базе данных.',
    'Серийный номер успешно добавлен.',
    'Ошибка при добавлении серийного номера.',
    'Серийный номер '); //Не соответствует маске

foreach ($serial_numbers as $serial_number) {
    $query = "SELECT * FROM equipment WHERE serial_number = '$serial_number'";
    $result = mysqli_query($connection, $query);

    if (check_mask_to_regex($equipment_type_mask, $serial_number)) {
        if (mysqli_num_rows($result) > 0) {
            $feedback[] = $alerts[0] . ' ' . $serial_number;
        } else {
            $query = "INSERT INTO equipment (equipment_type_id, serial_number) VALUES ('$equipment_type', '$serial_number')";
            if (mysqli_query($connection, $query)) {
                $feedback[] = $alerts[1] . ' ' . $serial_number;
            } else {
                $feedback[] = $alerts[2] . ' ' . $serial_number;
            }
        }
    } else {
        $feedback[] = $alerts[3] . $serial_number . ' не соответствует маске: ' . $equipment_type_mask;
    }
}

foreach ($feedback as $str) {
    echo "<pre>\n" . $str;
}

unset($feedback);
