<?php
// dati
$db_path = __DIR__ . '/../database/tasks.json';

$json_data = file_get_contents($db_path);

// converto in PHP
$tasks = json_decode($json_data, true);

// prendo dal POST
$new_task = $_POST['task'] ?? null;
if ($new_task) {
    // calcolo l'id da dare alla task che aggiungerò
    $highest_id = $tasks[count($tasks) - 1]["id"] + 1;

    // aggiungo la task
    $tasks[] = [
        "id" => $highest_id,
        "task" => $new_task,
        "completed" => false
    ];

    file_put_contents($db_path, json_encode($tasks));
}

// avviso
header('Content-Type: application/json');

// riconverto in Json
echo json_encode($tasks);
