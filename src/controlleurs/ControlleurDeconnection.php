<?php
class controlleurDeconnection{
    public function afficher(){
        session_unset();
        session_destroy();
        header('location: /home');
    }
}