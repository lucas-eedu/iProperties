<?php

namespace App\Api;

class ApiMessages
{
   
   /**
    * message
    *
    * @var array
    */
   private $message = [];
   
   /**
    * __construct
    *
    * @param  mixed $message
    * @param  mixed $data
    * @return void
    */
   public function __construct(string $message, array $data = [])
   {
      $this->message['message'] = $message;
      $this->message['errors'] = $data;
   }

   public function getMessage()
   {
      return $this->message;
   }
}
