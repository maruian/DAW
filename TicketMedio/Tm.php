<?php
/*
 * Matias Ruiz 1 DAM
 */
    class TicketMedio {
       //Declaramos los atributos como privados
       private $tickets;
       private $media;

       public function introduceTicket($valor){
         //Si el valor es negativo no haremos nada
         if ($valor>=0){
            $this->tickets[]=$valor;
         }
       }

       public function calculaMedia(){
          $suma=0;
          $num_tickets=count($this->tickets);
          // Tambien podriamos utilizar foreach pero como necesitamos saber el numero
          // de elemenos utilizare for 
          for ($i=0; $i<$num_tickets; $i++){
             $suma=$this->tickets[$i]+$suma;
          }
          $this->media=$suma/$num_tickets;
          return $this->media;
       }

       public function getTickets(){
           return $this->tickets;
       }
   }  
?>