<html>
<head>
    <style type="text/css">
        html, body {
            height: 100%;
            width: 100%;
        }

        body {
            background-color: #c0c0c0;
            background-image: linear-gradient(335deg, #864735 23px, transparent 23px),
            linear-gradient(155deg, #864735 23px, transparent 23px),
            linear-gradient(335deg, #864735 23px, transparent 23px),
            linear-gradient(155deg, #864735 23px, transparent 23px);
            background-size: 58px 58px;
            background-position: 0 2px, 4px 35px, 29px 31px, 34px 6px;
            margin: 0;
        }

        .mess {
            display: inline-block;
            margin-right: 0;
            margin-left: 15px;
            float: left;
            margin-top: 15px;
            margin-bottom: 5px;
            box-shadow: 0 0 4px black;
            background: lightgray;
            color: black;
            width: 65%;
            min-height: 7%;
            height: auto;
            padding-left: 15px;
            padding-right: 15px;
            text-align: left;
            word-wrap: break-word;
            font-size: 14pt;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <?php //mess 2.0
    if(isset($_GET['login']) && $_GET['pass']){
        $login = $_GET['login'];
        $pass = $_GET['pass'];
        $ourData = file_get_contents('src/users.json');
        $object = json_decode($ourData);
        foreach ($object->users as $user) {
            if($user->login === $login)
                break;
        }
        if(($user->login === $login) && ($user->pass === $pass)) {
            if (isset($_GET['text'])) {
                $text = $_GET['text'];
                $copy = $object->messend[0];
                $copy->login = $login;
                $copy->text = $text;
                $copy->time = date('l jS \of F Y h:i:s A');
                array_push($object->messend, $copy);
                file_put_contents('src/users.json', json_encode($object));
            }
        }
    }
    $ourData = file_get_contents('src/users.json');
    $object = json_decode($ourData);
    foreach ($object->messend as $mess){
        echo '<div class="mess"><b>Пользователь:</b> ';
        echo $mess->login;
        echo '<br/><b>Сообщение:</b> ';
        echo $mess->text;
        echo '<br/><b>Время:</b> ';
        echo $mess->time;
        echo '<br/></div>';
    }
    ?>
</body>
</html>

