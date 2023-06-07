<?php

class AppController {
    private $request; # save request method here for safety

    public function __construct(){
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isPost(): bool{
        return $this->request === 'POST';
    }

    protected function isGet(): bool {
        return $this->request === 'GET';
    }


    protected function render(string $template = null, array $variables = []) {
        $templatePath = 'public/views/'.$template.'.php';
        $output = 'File not found';

        if (file_exists($templatePath)) {
            extract($variables); # unpack passed variables to be available in "views"
            ob_start(); # open bufor
            include($templatePath); # read view file into bufor
            $output = ob_get_clean(); # send bufor data to browser using variable
        }

        print $output;
    }
}