<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class apitest extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!isset($this->session->userdata['license_admin_info'])) {
            redirect($this->data['admin_url'] . 'authentication');
            exit;
        }
        $this->smarty->assign("data", $this->data);
    }

    function index()
    {
        $this->data['menuAction'] = 'ApiTest';
        $this->data['license_admin_info'] = $this->session->userdata['license_admin_info'];
        $this->data['tpl_name'] = "admin/apitest/index.tpl";

        // You might want to assign some default values or fetch available APIs here
        $this->data['api_url'] = base_url() . 'webservices/';
        $samples = array(
            'verifyLicense' => array(
                'data' => '{
    "action": "verifyLicense",
    "licensekey": "YOUR_LICENSE_KEY",
    "email": "user@example.com",
    "domain": "example.com",
    "http_host": "example.com",
    "remote_addr": "127.0.0.1",
    "verify_date": "' . date('Y-m-d') . '",
    "server_name": "server1",
    "server_addr": "192.168.1.1"
}',
                'description' => 'Verifies if a license key is valid for the given domain and user.

<strong>Parameters:</strong>
<ul>
    <li><code>licensekey</code>: The license key is provided to user.</li>
    <li><code>email</code>: Registered email address.</li>
    <li><code>domain</code>: Domain where the script is installed.</li>
    <li><code>verify_date</code>: Current date (Y-m-d).</li>
</ul>',
                'response' => '{
    "status": "Success",
    "msg": "License verify successfully",
    "expirydate": "2026-12-31"
}'
            ),
            'authetication' => array(
                'data' => '{
    "action": "authetication",
    "email": "user@example.com",
    "domain": "example.com",
    "http_host": "example.com",
    "remote_addr": "127.0.0.1",
    "server_name": "server1",
    "server_addr": "192.168.1.1"
}',
                'description' => 'Authenticates a user and their domain.

<strong>Parameters:</strong>
<ul>
    <li><code>email</code>: Registered email address.</li>
    <li><code>domain</code>: Domain name.</li>
    <li><code>http_host</code>: HTTP Host header.</li>
</ul>',
                'response' => '{
    "status": "Success",
    "msg": "Authentication verified successfully"
}'
            )
        );

        $this->data['api_samples'] = $samples;
        $this->data['api_samples_json'] = json_encode($samples);

        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin-template.tpl');
    }
}
