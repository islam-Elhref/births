<?php
namespace MYMVC\LIB;


class Template
{
    private $template ;
    private $data ;


    public function setData($data)
    {
        $this->data = $data;
    }

    public function __construct($template)
    {
        $this->template = $template;
    }

    private function template_header_start(){
        extract($this->data);
        require_once temp_PATH . 'template_header_start.php';
    }
    private function template_header_end(){
        extract($this->data);
        require_once temp_PATH . 'template_header_end.php';
    }
    private function template_footer(){
        extract($this->data);
        require_once temp_PATH . 'template_footer.php';
    }

    private function template_block($view){
        extract($this->data);
        foreach ($this->template['template'] as $key => $path){
            if ($key == ':view'){
                require_once $view;
            }else{
                require_once $path;
            }
        }
    }

    private function header_resources(){
        $paths = '';
        foreach ($this->template['header_resources'] as $key => $path){
            $paths .= '<link rel="stylesheet" href="'.$path.'">' ;
        }
        echo $paths;
    }
    private function footer_resources(){
        $script = '';
        foreach ($this->template['footer_resources'] as $key => $path){
            $script .= "<script src='$path'></script>";
        }
        echo $script;
    }



    public function render($file_view){
        $this->template_header_start();
        $this->header_resources();
        $this->template_header_end();
        $this->template_block($file_view);
        $this->footer_resources();
        $this->template_footer();
    }

}