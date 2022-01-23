<?php

// Задаем список символов, используемых в капче 
$capletters = 'AaBbCcDdEeFfGgKkJjKkLMmNnPpQqRrSsTtUuVvWwXxYyZz123456789';  
// Длина капчи 7 знаков 
$captlen = 6;
// Задаем начальное значение капчи 
$capcha = ''; 
 
// Запускаем цикл заполнение изображения 
for ($i = 0; $i < $captlen; $i++){ 
 
// Из нашего списка берем «рендомный» символ и добавляем в капчу 
$capcha .= $capletters[rand(0, strlen($capletters)-1) ]; 


// Создаём пустое изображение и добавляем текст
$im = imagecreatetruecolor(130, 35);
// $background_color = imagecolorallocate($im, 0, 255, 0);
$text_color = imagecolorallocate($im, 0, 255, 0);
// imagestring($im, 10, 35, 8, $capcha, $text_color);

$font = 'Bold.ttf';
imagettftext($im, 14, 0, 10, 20, $text_color, $font, $capcha);
// Сохраняем изображение в 'simpletext.jpg'
}

 
session_start(); 
$_SESSION['capcha'] = $capcha; 
// var_dump($_SESSION['capcha']);
imagejpeg($im, 'kapcha.jpg');

// Освобождаем память
imagedestroy($im);




?>


<?php
// header("Content-type: image/png"); ВТОРОЙ ВАРИК ХОРОШИЙ
$img = imagecreate(130, 35);
$background_color = imagecolorallocate($img, 255, 255, 255);
$color = imagecolorallocate($img, 255, 116, 30);
for ($i=0;$i<20;$i++) {
	$x1=rand(0,130);
	$x2=rand(0,30);
	$y1=rand(0,130);
	$y2=rand(0,30);
	imageline($img, $x1, $x2, $y1, $y2, $color);
	}
$text_color = imagecolorallocate($img, 51, 51, 51);

$font = 'Bold.ttf';
imagettftext($img, 17, 4, 26, 25, $text_color, $font, $capcha);

imagejpeg($img, 'kapcha_2.jpg');
imagedestroy($img);



?>
  
<form action="/1/formcaptcha.php" method="post">
    <img src="kapcha.jpg" /><br />
    <img src="kapcha_2.jpg" /><br />
	
    Введите капчу: <input type="text" name="capcha" /><br />
    <input type="submit" value="Отправить" />
</form>