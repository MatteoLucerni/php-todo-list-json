<?php

// dati
$tasks = [
    "Andare al parco e fare una passeggiata",
    "Preparare una deliziosa colazione",
    "Leggere un libro interessante",
    "Guardare un film o una serie TV",
    "Fare esercizio fisico o yoga",
    "Imparare una nuova ricetta e cucinare qualcosa di speciale",
    "Fare una chiamata video con un amico o un familiare",
    "Esplorare un nuovo hobby o attività creativa",
    "Fare volontariato per una causa che ti sta a cuore",
    "Fare una lista dei tuoi obiettivi e pianificare come raggiungerli",
    "Fare una pausa e meditare o praticare la mindfulness",
    "Ascoltare la tua musica preferita o scoprirne di nuove",
    "Esplorare la natura e fare un pic-nic all'aperto",
    "Partecipare a un evento o una lezione online"
];

// avviso
header('Content-Type: application/json');

// converto in Json
echo json_encode($tasks);
