<?php
// dati
$db_path = __DIR__ . '/../database/tasks.json';

$json_data = file_get_contents($db_path);

// converto in PHP
$tasks = json_decode($json_data, true);

// POST per new task
$new_task = $_POST['text'] ?? null;
if ($new_task) {
    // calcolo l'id da dare alla task che aggiungerò
    $highest_id = $tasks[count($tasks) - 1]["id"] + 1;

    // aggiungo la task
    $tasks[] = [
        "id" => $highest_id,
        "text" => $new_task,
        "completed" => false
    ];

    file_put_contents($db_path, json_encode($tasks));
}

// POST per cambio di flag
$selected_id = $_POST['id'] ?? null;
if ($selected_id) {
    foreach ($tasks as &$task) {
        if ($task["id"] == $selected_id) {
            $task["completed"] = !$task["completed"];
        }
    }

    file_put_contents($db_path, json_encode($tasks));
}

// POST per cancellare la task
$selected_id = $_POST['delId'] ?? null;
if ($selected_id) {

    $filtered_tasks = array_filter($tasks, fn ($task) => $task["id"] != $selected_id);

    $tasks = $filtered_tasks;

    file_put_contents($db_path, json_encode($tasks));
}

// avviso
header('Content-Type: application/json');

// riconverto in Json
echo json_encode($tasks);
