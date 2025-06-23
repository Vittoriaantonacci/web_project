<?php

class CPost{
    public static function showTestPost(){
        print("post");
        $view = new VPost();
        $view->showPost();
    }
}