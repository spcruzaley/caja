<?php

class CustomView extends \Slim\View
{
    // public function render($template, $data = NULL)
    public function render($template, $data = array(), $status = null) {
        $path = $this->getTemplatesDirectory() . '/';
        $template_path = $this->getTemplatesDirectory() . '/' . ltrim($template, '/');

		if (!file_exists($template_path))
		{
			throw new RuntimeException('View cannot render template `' . $template_path . '`. Template does not exist.');
		}

        //Extract possible variables send from reouting file
        extract($this->data->all());
		ob_start();

        // //Add the sections for page
        require 'header.php';
        require 'leftPanel.php';
        require 'rightPanel.php';
        require $template_path;
        require 'footer.php';
    }

}
?>
