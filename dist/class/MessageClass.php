<?php

class Message {

    public function addMessage($text) {
        $type = substr($text, strpos($text, "|") + 1);  
        $message = substr($text, 0, strpos($text, "|"));
        
        if ($type == 'TYPE_SUCCESS') {
            echo "<div class='message is-success' role='alert'>$message</div>";
        } else if ($type == 'TYPE_ERROR') {
            echo "<div class='message is-error' role='alert'>$message</div>";
        } else {
            echo "<div class='message is-warning' role='alert'>$message</div>";
        }
    }

}