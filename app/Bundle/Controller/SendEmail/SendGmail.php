<?php
namespace app\Bundle\Controller\SendEmail;

require '../Libraries/phpmailer/PHPMailerAutoload.php';

class SendGmail
{
    public function send($addressEmail, $addressUsername, $title, $msg, $routerOrigin, $routerAfter)
    {
        $userful = $this->constructorUsefull();

        $mail = new \PHPMailer();
        try {
            $mail->SetLanguage('br'); // Traduzir para pt-BR

            $mail->isSMTP(); // Seta para usar SMTP
            $mail->SMTPAuth = true; // Libera a autenticação
            $mail->SMTPDebug = 0; // Debug

            $mail->SMTPSecure = 'tls'; // Acesso com TLS exigido pelo Gmail
            $mail->Host = 'smtp.gmail.com'; // SMTP Server
            $mail->Username = 'robodazueria@gmail.com'; // Usuário SMTP
            $mail->Password = 'Uu123456'; // Senha do usuário
            $mail->Port = 587; // Porta do SMTP

            $mail->setFrom('robodazueria@gmail.com', 'Mauro'); // Email e nome de quem enviara o e-mail
            $mail->addReplyTo($addressEmail, $addressUsername); // E-mail e nome de quem responderá o e-mail

            $mail->addAddress($addressEmail, $addressUsername); // Email e nome do destino

            $mail->isHTML(true); // Seta o envio em HTML
            $mail->CharSet = 'UTF-8'; // Charset da mensagem
            $mail->Subject = $title; // Título da mensagem
            $mail->Body = $msg; // Mensagem



            $send = $mail->send(); // Envia e-mail

            if($send):
                $msgResult = 'Mensagem enviada com sucesso!';
                $userful->alert($msgResult, $routerAfter);
            else:
                $msgResult = 'Erro ao enviar mensagem! ' . $msg;
                $userful->alert($msgResult, $routerOrigin);
            endif;
        } catch(Exception $e) {
            // echo 'Erro ao enviar mensagem!';
            // echo 'Erro: '.$mail->ErrorInfo;
            $msgResult = 'Erro ao enviar mensagem! ' . $msg;
            $userful->alert($msgResult, $routerOrigin);
        }
    }

    public function constructorUsefull()
    {
        $userful = new \app\Bundle\Controller\Useful();
        return $userful;
    }
}
