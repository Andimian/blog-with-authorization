<br>
<br>

<!--Тип содержимого multipart/form-data — это составной тип содержимого, чаще всего использующийся для отправки
HTML-форм с бинарными (не-ASCII) данными методом POST протокола HTTP. Сообщение multipart/form-data содержит несколько
частей, по одной на каждый задействованный в форме элемент управления. По простому это
специальный вид форм для загрузки файлов-->
<form enctype="multipart/form-data" action="sendPost.php" method="post">
    Message:<br>
    <textarea name="message" style="width: 250px; height: 100px;"></textarea><br>
    Прикрепить картинку:<br>
    <input name="userfile" type="file" /><br><br>
    <input type="submit" value="Отправить">
</form>