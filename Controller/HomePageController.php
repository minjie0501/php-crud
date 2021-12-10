<?php

declare(strict_types=1);

class HomepageController {
    
    public function render(array $GET, array $POST) {
        require 'View/homepage.php';
    }
}