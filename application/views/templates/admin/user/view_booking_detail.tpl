<style type="text/css">
	.control-label{
		text-align: left !important;
		width: 50%;
		float: left;
		padding-top: 0px !important;
		margin-bottom: 15px !important;
	}
	.cont_details{
		margin-bottom: 15px !important;
	}
	}
</style>

<div class="rightside">
    <div class="page-head breadpad">
        <ol class="breadcrumb">
            <li>You are here:</li>
            <li><a href="{$data.admin_url}home">Dashboard</a></li>
            <li><a href="{$data.admin_url}user">View Users</a></li>
            <li><a href="{$data.admin_url}user/booking_invoice/{$iUserId}">View Order History</a></li>
            <li class="active">Order Detail</li>
        </ol>
    </div>

    {if $data.message neq ''}
    <div class="span12">
        <div class="alert alert-info">
            {$data.message}
        </div>
    </div>
    {/if}

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-title">
                        <h3>Order Detail</h3>
                    </div>

                    <div class="box-body">
                    	<ul class="nav nav-tabs">
							<li><a href="{$data.admin_url}user/update/{$iUserId}" >Edit User</a></li>
							<li class="active"><a href="#tab1" data-toggle="tab">Order History & Invoices</a></li>
						</ul>
						<div class="tab-content" style="margin-top:2%;">
							<div class="tab-pane active" id="tab1">
								<form class="form-horizontal">

								    <div class="control-group">
								        <div class="control-label"><strong> Order Code :</strong></div>
								        <div class="cont_details " >{if $data.bookingDetail.vBookCode eq ''}&nbsp;{else}{$data.bookingDetail.vBookCode}{/if}</div>
								    </div>

								    <div class="control-group">
								        <div class="control-label"><strong>Hotel Name :</strong></div>
								        <div class="cont_details">{if $data.bookingDetail.vBarName eq ''}&nbsp;{else}{$data.bookingDetail.vBarName}{/if}</div>
								    </div>

								    <div class="control-group">
								        <div class="control-label"><strong>Customer :</strong></div>
								        <div class="cont_details">{if $data.bookingDetail.vFirstName eq ''}&nbsp;{else}{$data.bookingDetail.vFirstName} {$data.bookingDetail.vLastName}{/if}</div>
								    </div>
								    <div class="control-group">
								        <div class="control-label"><strong>Customer Email ID :</strong></div>
								        <div class="cont_details">{if $data.bookingDetail.vEmail eq ''}&nbsp;{else}{$data.bookingDetail.vEmail}{/if}</div>
								    </div>

								    <div class="control-group">
								        <div class="control-label"><strong>Customer Mobile No :</strong></div>
								        <div class="cont_details">{if $data.bookingDetail.vMobileNo eq ''}&nbsp;{else}{$data.bookingDetail.vMobileNo}{/if}</div>
								    </div>
								    
								    <div class="control-group">
								        <div class="control-label"><strong>No Of Person :</strong></div>
								        <div class="cont_details">{if $data.bookingDetail.vNoOfPerson eq ''}&nbsp;{else}{$data.bookingDetail.vNoOfPerson}{/if}</div>
								    </div>

								    
								    <!-- <div class="control-group">
								        <div class="control-label">Discount :</div>
								        <div class="cont_details">{if $data.bookingDetail.vDiscount eq ''}&nbsp;{else}{$data.bookingDetail.vDiscount}{/if}</div>
								    </div> -->

								    <div class="control-group">
								        <div class="control-label"><strong>Order Date :</strong></div>
								        <div class="cont_details">{if $data.bookingDetail.dBookDate eq ''}&nbsp;{else}{$data.bookingDetail.dBookDate|date_format:"%Y %B %e"}{/if}</div>
								    </div>
								    
								    <div class="control-group">
								        <div class="control-label"><strong>Order Status :</strong></div>
								        <div class="cont_details">{if $data.bookingDetail.eStatus eq ''}&nbsp;{else}{$data.bookingDetail.eStatus}{/if}</div>
								    </div>
								</form> 

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{literal}
<script type="text/javascript">

</script>
{/literal}