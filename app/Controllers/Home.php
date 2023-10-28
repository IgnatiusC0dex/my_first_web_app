<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index ()
    {
       return view ("Home\index.php");
    }

    # Para probar el correo
    # la configuracion está aquí: C:\xampp\htdocs\taskapp\app\Config\Email.php
    /*
    public function testEmail()
	{
        $email = service('email');
		
        $email->setTo('b.joeld13ramos@gmail.com');
		
        $email->setSubject('A test email');
		
        $email->setMessage('<h1>Hello world</h1>');
		
        if ($email->send()) {
		
            echo "Message sent";
			
		} else {
		
            echo $email->printDebugger();
			
		}
	}
    */ 


}