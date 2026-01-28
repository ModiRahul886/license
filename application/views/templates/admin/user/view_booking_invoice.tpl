<div class="rightside">
    <div class="page-head breadpad">
        <ol class="breadcrumb">
            <li>You are here:</li>
            <li><a href="{$data.admin_url}home">Dashboard</a></li>
            <li><a href="{$data.admin_url}user">View Users</a></li>
            <li class="active">View Order History</li>
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
                        <h3>Order History</h3>
                    </div>

                    <div class="box-body">
                    	<ul class="nav nav-tabs">
							<li><a href="{$data.admin_url}user/update/{$iUserId}" >Edit User</a></li>
							<li class="active"><a href="#tab1" data-toggle="tab">Order History & Invoices</a></li>
						</ul>
						<div class="tab-content" style="margin-top:2%;">
							<div class="tab-pane active" id="tab1">
								<table id="userlisting" class="table table-bordered table-striped">
		                            <thead>
		                                <tr class="headings">
		                                    <th><center><input type="checkbox" id="check_all" name="check_all" value="1"></center></th>
		                                    <th>Hotel Name</th>
		                                    <th>Name</th>
		                                    <th>Email ID</th>
		                                    <th>Order Date</th>
		                                    <th>Status</th>
		                                    {if $data.happyhour_admin_info.eRole eq 'Subadmin'}
		                                        {if $data.checkmoduleid|in_array:$data.adminpermidetail.tUpdate}
		                                            <th class=" no-link last"><center>View</center></th>
		                                        {/if}
		                                    {else}
		                                        <th class=" no-link last"><center>View</center></th>
		                                    {/if}
		                                </tr>
		                            </thead>
		                            <tbody>
		                                {section name = i loop = $data.allBookingHistory}
		                                <tr>
		                                <td align="center">
		                                    <input type="checkbox" name="iId[]" id="iId" class="tableflat" value="{$data.allBookingHistory[i].iBookBarId}"/>
		                                </td>
		                                	<td>{$data.allBookingHistory[i].vBarName}</td>
		                                    <td>{$data.allBookingHistory[i].vFirstName} {$data.allBookingHistory[i].vLastName}</td>
		                                    <td>{$data.allBookingHistory[i].vEmail}</td>
		                                    <td>{$data.allBookingHistory[i].dBookDate}</td>
		                                    <td>{$data.allBookingHistory[i].eStatus}</td>
		                                    {if $data.happyhour_admin_info.eRole eq 'Subadmin'}
		                                        {if $data.checkmoduleid|in_array:$data.adminpermidetail.tUpdate}
		                                            <td align="center"><a href="{$data.admin_url}user/view_book_history/{$data.allBookingHistory[i].iUserId}/{$data.allBookingHistory[i].iBookBarId}" style="cursor:pointer;"><i class="fa fa-edit edtcolr"></i></a></td>
		                                        {/if}
		                                    {else}
		                                        <td align="center"><a href="{$data.admin_url}user/view_book_history/{$data.allBookingHistory[i].iUserId}/{$data.allBookingHistory[i].iBookBarId}" style="cursor:pointer;"><i class="fa fa-edit edtcolr"></i></a></td>
		                                    {/if}
		                                </tr>
		                                {/section}
		                                
		                            </tbody>
		                        </table>
							</div>
						</div>

						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{$data.user_detail.vProfilePicture}</h4>
            </div>
            <div class="modal-body row">
                <div class="col-md-12 img-modal">
                    <img src="{$data.base_url}uploads/user/{$iUserId}/{$data.user_detail.vProfilePicture}" alt="" controls style="align:center;width:100%;"/>
                </div>
            </div>
        </div>
    </div>
</div>


{literal}
<script type="text/javascript">
var iUserId = "{/literal}{$iUserId}{literal}";

	function returnme()
	{
	    window.location.href = base_url+'user';
	}

	$('#userlisting').dataTable( {
	  	"aoColumns": [
	  	{ "bSortable": false },
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