<?php
require_once 'vendor/connect.php';
require_once 'vendor/get_equipments_types.php'
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="vendor/insert_into_db.php" method="post">
    <label for="serial_numbers">Серийные номера:</label>
    <textarea id="serial_numbers" name="serial_numbers"></textarea>

    <label for="equipment_type">Тип оборудования:</label>
    <select id="equipment_type" name="equipment_type">
        <option>Выберите тип оборудования</option>
        <!-- Здесь будет список оборудования, полученные из базы данных -->
        <!-- vendor/functions.php get_equipment_types -->
        <?php
        $equipment_types = get_equipment_types($connection);
        foreach ($equipment_types as $type) {
            ?>
            <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
            <?php
        }
        ?>
    </select>

    <input type="submit" value="Добавить">
</form>

<table>
    <tbody>
    <tr>
        <th colspan="3">Тестовые значения</th>
    </tr>
    <tr>
        <th>TP-Link TL-WR74: XXAAAAAXAA</th>
        <th>D-Link DIR-300: NXXAAXZXaa</th>
        <th>D-Link DIR-300 S: NXXAAXZXXX</th>
    </tr>
    <tr>
        <td>YYRCZUP2SF</td>
        <td>746BFQ-5za</td>
        <td>4CLVXE-ASJ</td>
    </tr>
    <tr>
        <td>0XLDLBUILR</td>
        <td>3QUFUE@Exh</td>
        <td>9O2XUP_157</td>
    </tr>
    <tr>
        <td>16JFECQGEO</td>
        <td>9R6JLR_7rg</td>
        <td>94LTZI-739</td>
    </tr>
    </tbody>
</table>
</body>
</html>