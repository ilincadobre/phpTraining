<?php

namespace Framework;

class Request {

    public function get($var) {
        if (isset($_GET[$var])) {
            return($_GET[$var]);
        }
        return(false);
    }

    public function post($var) {
        if (isset($_POST[$var])) {
            return($_POST[$var]);
        }
        return(false);
    }

}
