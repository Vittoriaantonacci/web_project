<?php

class CError {

    // Display a generic error message
    public static function error() {
        $view = new VError();
        $view->error();
    }

    // Display a specific error message
    public static function showError(string $msg) {
        $view = new VError();
        $view->error($msg);
    }
}