<?php
function read($db) {

    $query= $db->query('SELECT Ms.text, Ms.time, Pr.name FROM Mess as Ms, Profile as Pr 
            WHERE Ms.login = Pr.login ORDER BY Ms.time');

    while($row = $query->fetch()) {
        $name = $row['name'];
        $text = $row['text'];
        $time = $row['time'];
        echo '<div class="mess"><b>Пользователь:</b> ';
        echo $name;
        echo '<br/><b>Сообщение:</b> ';
        echo $text;
        echo '<br/><b>Время:</b> ';
        echo $time;
        echo '<br/></div>';
    }

    return 'Сообщения выведены...';
}