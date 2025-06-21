<?php

class CPost{
    public static function showTestPost(){
        print("post");
        $view = new VPost();
        $view->showPost(); // Questo è il metodo di test che hai appena aggiunto
    }
}