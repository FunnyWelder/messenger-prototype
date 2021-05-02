<?php //mess 2.1
require_once 'vendor/autoload.php';
$config = require_once 'src/config.php';
$MYSQL_log = $config['MYSQL_LOG'];
$MYSQL_user = $config['MYSQL_USER'];
$MYSQL_bd = $config['MYSQL_BD'];
$MYSQL_pass = $config['MYSQL_PASS'];

$loader = new Twig\Loader\FilesystemLoader('templates');
$twig = new Twig\Environment($loader, [
    'cache' => 'compilation_cache'
]);


try {
    $db = new PDO("mysql:host=$MYSQL_log;dbname=$MYSQL_bd", $MYSQL_user, "$MYSQL_pass");
    $db->exec("set names utf8");

    require_once 'src/add_mess.php';
    require_once 'src/read_mess.php';

    add($db);
    $mass = read($db);

    $name = $mass['name'];
    $text = $mass['text'];
    $time = $mass['time'];

    echo $twig->render('index.twig');

    for ($i=0; $i < count($name);$i++){
        echo '<div class="mess"><b>Пользователь:</b> ';
        echo $name[$i];
        echo '<br/><b>Сообщение:</b> ';
        echo $text[$i];
        echo '<br/><b>Время:</b> ';
        echo $time[$i];
        echo '<br/></div>';
    }

} catch (PDOException $err) {
    print "Ошибка!: " . $err->getMessage() . "<br/>";
}