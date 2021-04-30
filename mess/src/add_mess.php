<?php
function add ($db) {

    if(isset($_GET['login']) && $_GET['pass']){

        $sql = 'SELECT login, password FROM Profile WHERE login=:login AND password=:pass';
        $params = [
            ':login' => $_GET['login'],
            ':pass' => $_GET['pass']
        ];

        $query= $db->prepare($sql);
        $query->execute($params);
        $empty = $query->rowCount() === 0;

        if (!$empty) {
            if (isset($_GET['text'])) {

                $sql = 'INSERT INTO Mess (login, text, time) values (:login, :text, :time)';
                $text = [
                    ':login' =>  $params[':login'],
                    ':text' =>  $_GET['text'],
                    ':time' => date('Y-m-d h:i:s')
                ];

                $query= $db->prepare($sql);
                $query->execute($text);

            }
        }
    }

    return 'Сообщение добавлено...';
}