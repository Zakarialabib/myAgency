<?php

namespace App\Helpers;
use App\Emailsetting;
use App\EmailTemplate;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Str;

class MailSend
{

    public $mail;
    public $setting;

    public function __construct()
    {
        $this->setting = Emailsetting::first();

        $this->mail = new PHPMailer(true);

        if($this->setting->is_smtp == 1){

            $this->mail->isSMTP();
            $this->mail->Host       = $this->setting->smtp_host;
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = $this->setting->smtp_user;
            $this->mail->Password   = $this->setting->smtp_pass;
            $this->mail->SMTPSecure = $this->setting->email_encryption;
            $this->mail->Port       = $this->setting->smtp_port;

        }
    }


    public function sendAutoOrderMail(array $mailData,$id)
    {
        $temp = EmailTemplate::where('email_type','=',$mailData['type'])->first();
        // $order = Order::findOrFail($id);
        // $cart = json_decode($order->cart, true);
        try{

            $body = preg_replace("/{customer_name}/", $mailData['cname'] ,$temp->email_body);
            $body = preg_replace("/{order_amount}/", $mailData['oamount'] ,$body);
            $body = preg_replace("/{admin_name}/", $mailData['aname'] ,$body);
            $body = preg_replace("/{admin_email}/", $mailData['aemail'] ,$body);
            $body = preg_replace("/{order_number}/", $mailData['onumber'] ,$body);
            $body = preg_replace("/{website_title}/", $this->gs->title ,$body);


            $fileName = public_path('assets/temp_files/').Str::random(4).time().'.pdf';
            // $pdf = PDF::loadView('pdf.order', compact('order', 'cart'))->save($fileName);

            //Recipients
            $this->mail->setFrom($this->gs->from_email, $this->gs->from_name);
            $this->mail->addAddress($mailData['to']);     // Add a recipient

            // Attachments
            $this->mail->addAttachment($fileName);

            // Content
            $this->mail->isHTML(true);

            $this->mail->Subject = $temp->email_subject;

            $this->mail->Body = $body;

            $this->mail->send();

        }
        catch (Exception $e){
                dd($e->getMessage());
        }

        $files = glob('assets/temp_files/*'); //get all file names
        foreach($files as $file){
            if(is_file($file))
            unlink($file); //delete file
        }

        return true;


    }

    public function sendAutoMail(array $mailData)
    {

        $temp = EmailTemplate::where('email_type','=',$mailData['type'])->first();

        try{

            $body = preg_replace("/{customer_name}/", $mailData['cname'] ,$temp->email_body);
            $body = preg_replace("/{order_amount}/", $mailData['oamount'] ,$body);
            $body = preg_replace("/{admin_name}/", $mailData['aname'] ,$body);
            $body = preg_replace("/{admin_email}/", $mailData['aemail'] ,$body);
            $body = preg_replace("/{order_number}/", $mailData['onumber'] ,$body);
            $body = preg_replace("/{website_title}/", $this->gs->title ,$body);

            //Recipients
            $this->mail->setFrom($this->gs->from_email, $this->gs->from_name);
            $this->mail->addAddress($mailData['to']);     // Add a recipient

            // Content
            $this->mail->isHTML(true);

            $this->mail->Subject = $temp->email_subject;

            $this->mail->Body = $body;

            $this->mail->send();

        }
        catch (Exception $e){

        }

        return true;

    }

    public function sendCustomMail(array $mailData)
    {
        try{
            $this->mail->setFrom($this->setting->from_email, $this->setting->from_name);
            $this->mail->addAddress($mailData['to']);     // Add a recipient
            $this->mail->isHTML(true);
            $this->mail->Subject = $mailData['subject'];
            $this->mail->Body = $mailData['body'];
            $this->mail->send();

        }
        catch (Exception $e){
            dd($e->getMessage());
        }

        return true;
    }

}