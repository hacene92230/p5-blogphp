<?php

namespace System\Coeur\Controllers;

use Exception;
use System\Coeur\Models\Model;
use System\Coeur\Views\View;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Controller
{
    /**
     *
     * Instancie un model
     * 
     * Si le parametre de la fonction est vide 
     * le nom du controller sera utiliser automatiquement comme 
     * nom de model mais il devras exister dans le dossier model  
     *
     * @param string $model
     *
     * @return Model
     * 
     */
    public function model(string $model = ''): Model
    {
        $base = dirname(realpath('.')) . DIRECTORY_SEPARATOR . 'App';
        if (isset($model) && !empty($model)) {
            $model =  sprintf('App\Models\%s', ucfirst($model));
        } else {
            $part = explode('\\', get_class($this));
            $model = strval(end($part));
            $model = sprintf('App\Models\%s', ucfirst($model));
        }
        if (!is_dir($base . DIRECTORY_SEPARATOR . 'Models')) {
            throw new Exception("Le dossier du model n'existe pas.");
        }
        if (!class_exists($model)) {
            throw new Exception("le model demandé  n'existe pas");
        }
        return new $model();
    }
    /**
     * affiche une view
     *
     * @param string $view
     * @param string $directory
     * @param string $title
     * @param string $description
     * @param array $args
     * @return void
     */
    public function view(string $directory, string $view, string $title, array $args = []): void
    {
        echo (new View($directory, $view, $title, $args))->create();
    }


    public function mail($sujet, $msg)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->CharSet = 'utf-8';
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'hacenesahraoui.paris@gmail.com';
            $mail->Password   = "pukadnxverivplbj";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 25;
            $mail->setFrom('hacenesahraoui.paris@gmail.com', 'Contact culture du savoir');
            $mail->addAddress('hacenesahraoui.paris@gmail.com');
            $mail->isHTML(true);
            $mail->Subject = $sujet;
            $mail->Body = $msg;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function search($value): array
    {
        return  $this->model()->search_all($value);
    }
}
