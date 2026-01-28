<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('FCPATH', 'E:/xampp/htdocs/license/');
define('BASEPATH', FCPATH . 'system/');
define('APPPATH', FCPATH . 'application/');

require_once(BASEPATH . 'libs/smarty/Smarty.class.php');

$log = "";
try {
    $smarty = new Smarty();
    $templatePath = APPPATH . 'views/templates';
    $compilePath = APPPATH . 'views/templates_c';

    $log .= "Template Path: " . $templatePath . "\n";
    $log .= "Real Template Path: " . (realpath($templatePath) ?: 'NOT FOUND') . "\n";
    $log .= "File admin/login.tpl Exists: " . (file_exists($templatePath . '/admin/login.tpl') ? 'Yes' : 'No') . "\n";

    $smarty->setTemplateDir($templatePath);
    $smarty->setCompileDir($compilePath);

    $log .= "Attempting to fetch admin/login.tpl...\n";
    $output = $smarty->fetch('admin/login.tpl');
    $log .= "Success! Length: " . strlen($output) . "\n";
} catch (\Throwable $e) {
    $log .= "Caught Throwable: " . get_class($e) . ": " . $e->getMessage() . "\n";
    $log .= "Trace: \n" . $e->getTraceAsString() . "\n";
} catch (\Exception $e) {
    $log .= "Caught Exception: " . get_class($e) . ": " . $e->getMessage() . "\n";
    $log .= "Trace: \n" . $e->getTraceAsString() . "\n";
}

file_put_contents(FCPATH . 'debug_smarty.log', $log);
echo "Done. Check debug_smarty.log\n";
echo $log;
