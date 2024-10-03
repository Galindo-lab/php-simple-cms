
<?php
require_once __DIR__ . '/../manager/managers.php';

$rows = UserManager::all();

for($i = 0; $i < count($rows); $i++) {
    echo $rows[$i]['username'] . " | " . $rows[$i]['email'] . "<br>";
}

