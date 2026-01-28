<?php
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('application/views/templates'));
foreach ($files as $file) {
    if ($file->isFile() && $file->getExtension() == 'tpl') {
        echo $file->getPathname() . "\n";
    }
}
?>