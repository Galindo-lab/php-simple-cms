
<?php
require_once __DIR__ . '/../app/managers.php';

foreach (UserManager::all() as $user) {
    echo $user['username'] . " | " . $user['email'] . "<br>";
}
