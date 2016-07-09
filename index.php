<?php

$email = $_POST['email'];
$text = $_POST['text'];

if(isset($text) && isset($email)){

    require __DIR__ . '/vendor/autoload.php';

        //$transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');
        //$transport = Swift_MailTransport::newInstance();
        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
            ->setUsername('riffcamailer@gmail.com')
            ->setPassword('riffcamailer3286030');

        $mailer = Swift_Mailer::newInstance($transport);

        $message = Swift_Message::newInstance('Новая заявка')
            ->setFrom(['riffcamailer@gmail.com' => 'Pаявка'])
            ->setTo([$email, 'riffca@ya.ru'])
            ->setBody($text);

        $result = $mailer->send($message);

            if($result > 0) {
                echo 'Сообщение выслано';
            } else {
                echo 'Не вышло';
            }
}
?>
<style>
    label,input,textarea {
        width: 50%;
        display: block;
    }

    form {
        max-width: 30%;
        padding: 10px;
    }

</style>
<form method="POST" action="index.php">
<label>Введите email</label>
<input type="email" name="email" require>
<label>Введите текст</label>
<textarea type="text" name="text" require></textarea>
<input type="submit">
</form>


