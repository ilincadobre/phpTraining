<?php
namespace Framework;

class Redirect {
    
    public function to($location = null) {
        if ($location) {
            header("Location: index.php?page={$location}");
            return true;
        }
        return false;
    }
}

