<?php

namespace App;

class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);

        include "../View/$view.php";
    }

    protected function view(string $path, $data = [],$layout = 'dashboard')
    {
        extract($data);
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        $content = ob_get_clean();
        require VIEWS . 'layouts/'.$layout.'.php';
    }
}
