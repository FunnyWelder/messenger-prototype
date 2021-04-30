<html lang="ru">
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
    <title></title>
</head>
<body>
<?php //mess 2.1
$config = require_once 'src/config.php';
$MYSQL_log = $config['MYSQL_LOG'];
$MYSQL_user = $config['MYSQL_USER'];
$MYSQL_bd = $config['MYSQL_BD'];
$MYSQL_pass = $config['MYSQL_PASS'];


try {
    $db = new PDO("mysql:host=$MYSQL_log;dbname=$MYSQL_bd", $MYSQL_user, "$MYSQL_pass");
    $db->exec("set names utf8");

    require_once 'src/add_mess.php';
    require_once 'src/read_mess.php';

    add($db);
    read($db);

} catch (PDOException $err) {
    print "Ошибка!: " . $err->getMessage() . "<br/>";
}

?>
</body>
</html>