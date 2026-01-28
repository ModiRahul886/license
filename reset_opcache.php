<?php
if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "OPCache reset success.";
} else {
    echo "OPCache not enabled.";
}
?>