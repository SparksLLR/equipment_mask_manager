<?php

function get_equipment_type_mask($equipment_type_id, $connection)
{
    $query = "SELECT `mask` FROM `equipment_types` WHERE `id` = $equipment_type_id";

    $result = $connection->query($query);
    $row = mysqli_fetch_assoc($result);
    $mask = $row['mask'];

    return $mask;
}
