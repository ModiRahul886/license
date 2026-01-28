<?php
// Load CodeIgniter framework
ob_start();
require_once('index.php');
ob_end_clean();

$CI =& get_instance();
$CI->load->database();

$users = $CI->db->get('users', 1)->result_array();
$licenses = $CI->db->get('license', 1)->result_array();

echo json_encode(['users' => $users, 'licenses' => $licenses], JSON_PRETTY_PRINT);
?>