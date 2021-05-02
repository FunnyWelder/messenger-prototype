<?php
function read($db) {

    $query= $db->query('SELECT Ms.text, Ms.time, Pr.name FROM Mess as Ms, Profile as Pr 
            WHERE Ms.login = Pr.login ORDER BY Ms.time');

    $name = [];
    $text = [];
    $time = [];
    $i = 0;

    while($row = $query->fetch()) {
        $name[$i] = $row['name'];
        $text[$i] = $row['text'];
        $time[$i] = $row['time'];
        $i++;
    }

    $mass = [
        'name' => $name,
        'text' => $text,
        'time' => $time
    ];

    return $mass;
}