<?php
namespace app\Bundle\Controller\SendEmail;

require '../Libraries/phpmailer/PHPMailerAutoload.php';

/**
 * Importante: Logue o no Gmail e entre no Link
 *
 * https://myaccount.google.com/u/1/security
 *
 * Vá em "Acesso a app menos seguro" e Ative a opção
 */

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
            $mail->Username = 'peace.social.suporte@gmail.com'; // Usuário SMTP
            $mail->Password = 'Uu123456'; // Senha do usuário
            $mail->Port = 587; // Porta do SMTP

            $mail->setFrom('peace.social.suporte@gmail.com', 'Peace Social Suporte'); // Email e nome de quem enviara o e-mail
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
                $msgResult = 'Erro ao enviar mensagem!';
                $userful->alert($msgResult, $routerOrigin);
            endif;
        } catch(Exception $e) {
            // echo 'Erro ao enviar mensagem!';
            // echo 'Erro: '.$mail->ErrorInfo;
            $msgResult = 'Erro ao enviar mensagem!';
            $userful->alert($msgResult, $routerOrigin);
        }
    }

    public function constructorUsefull()
    {
        $userful = new \app\Bundle\Controller\Useful();
        return $userful;
    }
}
