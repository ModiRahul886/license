
<div class="rightside">
    <div class="page-head breadpad">
        <ol class="breadcrumb">
            <li>You are here:</li>
            <li><a href="{$data.admin_url}home">Dashboard</a></li>
            <li class="active">License Payments</li>
        </ol>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-title">
                        <h3>License Payments</h3>
                    </div>
                    <div class="box-body">
                        {if $data.message neq ''}
                        <div class="span12">
                            <div class="alert alert-info">
                                {$data.message}
                            </div>
                        </div>
                        {/if}

                        <table id="paymentlist" class="table table-bordered table-striped">
                            <thead>
                                <tr class="headings">
                                    <th>Request ID</th>
                                    <th>Email</th>
                                    <th>Module</th>
                                    <th>Duration (Months)</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>PayPal Status</th>
                                    <th>PayPal Txn</th>
                                    <th>License</th>
                                    <th>Created</th>
                                    <th class="no-link last"><center>View</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                {if $data.payment_requests|count gt 0}
                                    {section name=i loop=$data.payment_requests}
                                        <tr>
                                            <td>{$data.payment_requests[i].iRequestId}</td>
                                            <td>{$data.payment_requests[i].vEmail|escape}</td>
                                            <td>{$data.payment_requests[i].vModuleName|default:'-'|escape}</td>
                                            <td>{$data.payment_requests[i].iDurationMonths}</td>
                                            <td>{$data.payment_requests[i].fAmount} {$data.payment_requests[i].vCurrency|escape}</td>
                                            <td>{$data.payment_requests[i].eStatus}</td>
                                            <td>{$data.payment_requests[i].vPaypalPaymentStatus|default:'-'|escape}</td>
                                            <td>{$data.payment_requests[i].vPaypalTxnId|default:'-'|escape}</td>
                                            <td>
                                                {if $data.payment_requests[i].iLicenseId neq '' && $data.payment_requests[i].iLicenseId neq 0}
                                                    #{$data.payment_requests[i].iLicenseId}
                                                {else}
                                                    -
                                                {/if}
                                            </td>
                                            <td>{$data.payment_requests[i].dCreatedDate}</td>
                                            <td align="center">
                                                <a href="{$data.admin_url}licensepayments/view/{$data.payment_requests[i].iRequestId}" style="cursor:pointer;">
                                                    <i class="fa fa-eye edtcolr"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    {/section}
                                {else}
                                    <tr>
                                        <td colspan="11">No Records Found</td>
                                    </tr>
                                {/if}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{literal}
<script type="text/javascript">
    $('#paymentlist').dataTable({
        "aoColumns": [
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            { "bSortable": false }
        ]
    });
</script>
{/literal}
