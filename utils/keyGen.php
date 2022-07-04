<?php
    function generateKey(){
        $characters ="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!:?%*@";
        $key = "";
        for ($i =0; $i<50; $i++){
            $key .= $characters[rand(0, strlen($characters)-1)];
        }
        return $key;
    }
?>