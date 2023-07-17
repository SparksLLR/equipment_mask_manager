<?php

function get_equipment_types($connection)
{
    $query = "SELECT * FROM equipment_types";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        return $equipment_types = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
