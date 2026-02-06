
<div class="rightside">
    <div class="page-head breadpad">
        <ol class="breadcrumb">
            <li>You are here:</li>
            <li><a href="{$data.admin_url}home">Dashboard</a></li>
            <li><a href="{$data.admin_url}licensepayments">License Payments</a></li>
            <li class="active">Request #{$data.payment_request.iRequestId}</li>
        </ol>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-title">
                        <h3>Payment Request Details</h3>
                    </div>
                    <div class="box-body">
                        <div class="pull-right">
                            <button type="button" class="btn btn-primary btnuser" onclick="window.location.href='{$data.admin_url}licensepayments'">Back</button>
                        </div>
                        <div style='clear:both;'></div>

                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr><th width="25%">Request ID</th><td>{$data.payment_request.iRequestId}</td></tr>
                                <tr><th>Email</th><td>{$data.payment_request.vEmail|escape}</td></tr>
                                <tr><th>Module</th><td>{$data.payment_request.vModuleName|default:'-'|escape}</td></tr>
                                <tr><th>Duration (Months)</th><td>{$data.payment_request.iDurationMonths}</td></tr>
                                <tr><th>Amount</th><td>{$data.payment_request.fAmount} {$data.payment_request.vCurrency|escape}</td></tr>
                                <tr><th>Status</th><td>{$data.payment_request.eStatus}</td></tr>
                                <tr><th>PayPal Status</th><td>{$data.payment_request.vPaypalPaymentStatus|default:'-'|escape}</td></tr>
                                <tr><th>PayPal Txn ID</th><td>{$data.payment_request.vPaypalTxnId|default:'-'|escape}</td></tr>
                                <tr><th>Created</th><td>{$data.payment_request.dCreatedDate}</td></tr>
                                <tr><th>Updated</th><td>{$data.payment_request.dUpdatedDate|default:'-'}</td></tr>
                            </tbody>
                        </table>

                        <div class="box-title" style="margin-top: 15px;">
                            <h3>License (If Generated)</h3>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr><th width="25%">License ID</th><td>{if $data.payment_request.iLicenseId neq '' && $data.payment_request.iLicenseId neq 0}#{$data.payment_request.iLicenseId}{else}-{/if}</td></tr>
                                <tr><th>License Name</th><td>{$data.payment_request.vLicenseName|default:'-'|escape}</td></tr>
                                <tr><th>License Key</th><td>{$data.payment_request.vLicenseKey|default:'-'|escape}</td></tr>
                                <tr><th>Active Date</th><td>{$data.payment_request.dLicenseActiveDate|default:'-'|escape}</td></tr>
                                <tr><th>Expire Date</th><td>{$data.payment_request.dLicenseExpireDate|default:'-'|escape}</td></tr>
                            </tbody>
                        </table>

                        <div class="box-title" style="margin-top: 15px;">
                            <h3>PayPal Raw Payload</h3>
                        </div>
                        <pre style="white-space: pre-wrap;">{$data.payment_request.tPaypalRaw|default:''|escape}</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
