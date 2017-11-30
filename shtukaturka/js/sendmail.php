<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subject = 'Заявка с Hameleon Group';

    $title = !empty($_POST['email']) ? $_POST['email'] : '';
    $name = !empty($_POST['name']) ? $_POST['name'] : '';
    $phone = !empty($_POST['phone']) ? $_POST['phone'] : '';
    $comment = !empty($_POST['comment']) ? $_POST['comment'] : '';

	$mail = !empty($_POST['mail']) ? $_POST['mail'] : '';
	
    $body = $title ? "Тема: Заказ штукатурных работ" . "\n" : '';
    $body .= $name ? "Имя: " . $name . "\n" : '';
    $body .= $phone ? "Телефон: " . $phone . "\n\n" : '\n';
    $body .= $email ? "Обратный адрес: " . $mail . "\n\n" : '\n';
    $body .= $comment ? "Сообщение:\n" . $comment . "\n" : '';

    // Адреса для отправки форм
    $to = '7770161@mail.ru';
	//$to = 'maizerargvliani@gmail.com';
    $headers = 'Content-type: text/plain; charset=utf-8' . "\r\n";
    $success = mail($to, $subject, $body, $headers);

    if ($success) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    header('Location: index.html');
}
?>
