<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(BASEPATH . 'libs/smarty/Smarty.class.php');

#[AllowDynamicProperties]
class CI_Smarty extends Smarty
{

    function __construct()
    {
        parent::__construct();
        $this->initSmarty();
    }

    function CI_Smarty()
    {
        parent::Smarty();
        $this->initSmarty();
    }

    private function initSmarty()
    {
        $base = str_replace('\\', '/', FCPATH);
        $templatePath = $base . 'application/views/templates/';
        $compilePath = $base . 'application/views/templates_c/';
        $cachePath = $base . 'application/cache/smarty/cache/';
        $configPath = $base . 'application/cache/smarty/configs/';

        $this->setTemplateDir($templatePath);
        $this->setCompileDir($compilePath);
        $this->setCacheDir($cachePath);
        $this->setConfigDir($configPath);

        $this->assign('APPPATH', APPPATH);
        $this->assign('BASEPATH', BASEPATH);

        $ci =& get_instance();
        if (method_exists($this, 'assignByRef')) {
            $this->assignByRef('ci', $ci);
        }
    }

    function view($template, $data = array(), $return = FALSE)
    {
        foreach ($data as $key => $val) {
            $this->assign($key, $val);
        }

        $output = $this->fetch($template);

        if ($return === FALSE) {
            $CI =& get_instance();
            if (method_exists($CI->output, 'set_output')) {
                $CI->output->set_output($output);
            } else {
                $CI->output->final_output = $output;
            }
        } else {
            return $output;
        }
    }
}
