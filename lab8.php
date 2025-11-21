<?php
// 1. Отримання JSON
$url = "http://lab.vntu.org/api-server/lab8.php?user=student&pass=p@ssw0rd";
$json = file_get_contents($url);

if (!$json) {
    die("Помилка отримання JSON");
}

// 2. Декодування
$data = json_decode($json, true);
if (!$data) {
    die("Помилка декодування");
}

// 3. Об'єднання всіх людей в один масив
$allPeople = [];
foreach ($data as $group) {
    foreach ($group as $person) {
        $allPeople[] = $person;
    }
}

// 4. Виведення таблиці з правильними стовпцями
echo "<table border='1' cellpadding='8'>";
echo "<tr>
        <th>Ім'я</th>
        <th>Фракція</th>
        <th>Звання</th>
        <th>Локація</th>
      </tr>";

foreach ($allPeople as $p) {
    echo "<tr>";
    echo "<td>" . $p['name'] . "</td>";
    echo "<td>" . $p['affiliation'] . "</td>";
    echo "<td>" . $p['rank'] . "</td>";
    echo "<td>" . $p['location'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
