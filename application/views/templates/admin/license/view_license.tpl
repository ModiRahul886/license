
<form name="frmlist" id="frmlist" action="{$data.admin_url}license/action_update" method="post">
	<input type="hidden" name="action" id="action">

	<div class="rightside">
    <div class="page-head breadpad">
        <ol class="breadcrumb">
            <li>You are here:</li>
            <li><a href="{$data.admin_url}home">Dashboard</a></li>
            <li class="active">Manage License</li>    
        </ol>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-title">
                        <h3>Manage License</h3>
                    </div>
                    <div class="box-body">
                    	{if $data.message neq ''}
					    <div class="span12">
					        <div class="alert alert-info">
					            {$data.message}
					        </div>
					    </div>
					    {/if}
					    <div class="pull-right">
						{if $data.happyhour_admin_info.eRole eq 'Subadmin'}
                            {if $data.checkmoduleid|in_array:$data.adminpermidetail.tActive}
                                <button type="submit" id="btn-active" class="btn btn-successbtn btn-primary btnuser makebtn" onclick="check_all();" >Make Active</button>
                            {/if}
                            {if $data.checkmoduleid|in_array:$data.adminpermidetail.tInactive}
                                <button type="submit" id="btn-inactive" class="btn btn-primary btnuser inctivebtn">Make Inactive</button>
                            {/if}
                            {if $data.checkmoduleid|in_array:$data.adminpermidetail.tAdd}
                                <button type="button" id="btn-add" onclick="addme('{$data.admin_url}license/create');"  class="btn btn-primary btnuser newadbtn"> Add New</button>
                            {/if}
                            {if $data.checkmoduleid|in_array:$data.adminpermidetail.tDelete}
                                <button type="submit" id="btn-delete" class="btn btn-primary btnuser addbtn">Delete</button>
                            {/if}
                        {else}
							<button type="submit" id="btn-active" class="btn btn-successbtn btn-primary btnuser makebtn" onclick="check_all();" >Make Active</button>
							<button type="submit" id="btn-inactive" class="btn btn-primary btnuser inctivebtn">Make Inactive</button>
							<button type="button" id="btn-add" onclick="addme('{$data.admin_url}license/create');"  class="btn btn-primary btnuser newadbtn"> Add New</button>
							<button type="submit" id="btn-delete" class="btn btn-primary btnuser addbtn">Delete</button>
						{/if}
						</div>

						<div style='clear:both;'></div>

						<table id="barlist" class="table table-bordered table-striped">
							<thead>
								<tr class="headings">
									<th><center><input type="checkbox" id="check_all" name="check_all" value="1"></center></th>
									<th>License</th>
									<th>License Active</th>
									<th>License Expire</th>
									<th>Status</th>
									{if $data.happyhour_admin_info.eRole eq 'Subadmin'}
                                    	{if $data.checkmoduleid|in_array:$data.adminpermidetail.tUpdate}
											<th class=" no-link last"><center>Edit</center></th>
										{/if}
                                    {else}
                                        <th class=" no-link last"><center>Edit</center></th>
                                    {/if}
								</tr>
							</thead>
							<tbody>
								{if $data.license_detail|count gt 0 }
									{section name = i loop = $data.license_detail}
										<tr>
											<td align="center">
												<input type="checkbox" name="iId[]" id="iId" class="tableflat" value="{$data.license_detail[i].ilicenseId}"/>
											</td>
											<td>{$data.license_detail[i].licensename}</td>
											<td>{$data.license_detail[i].license_key}</td>
											<td>{$data.license_detail[i].license_active_date}</td>
											<td>{$data.license_detail[i].license_expire_date}</td>
											<td>{$data.license_detail[i].eStatus}</td>
											{if $data.happyhour_admin_info.eRole eq 'Subadmin'}
                                    			{if $data.checkmoduleid|in_array:$data.adminpermidetail.tUpdate}
												<td align="center"><a href="{$data.admin_url}license/update/{$data.license_detail[i].ilicenseId}" style="cursor:pointer;"><i class="fa fa-edit edtcolr"></i></a></td>
												{/if}
                                    		{else}
                                    			<td align="center"><a href="{$data.admin_url}license/update/{$data.license_detail[i].ilicenseId}" style="cursor:pointer;"><i class="fa fa-edit edtcolr"></i></a></td>
                                    		{/if}

										</tr>
									{/section}
								{else}
									<tr>
										<td colspan="6">No Records Found</td>
									</tr>
								{/if}
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
{literal}
<script type="text/javascript">

	function returnme()
	{
	    window.location.href = base_url+'license';
	}

	var _update = "{/literal}{if $data.checkmoduleid|in_array:$data.adminpermidetail.tUpdate}done{else if $data.happyhour_admin_info.eRole eq 'Admin'}adminlist{else}notdone{/if}{literal}";
    if(_update == 'done'){
		$('#barlist').dataTable( {
	        "aoColumns": [
	        { "bSortable": false },
	        null,
	        null,
	        null,
	        null,
	        { "bSortable": false }
	        ]
	    });
    }else if(_update == 'adminlist'){
    	$('#barlist').dataTable( {
	        "aoColumns": [
	        { "bSortable": false },
	        null,
	        null,
	        null,
	        null,
	        { "bSortable": false }
	        ]
	    });
    }else{
    	$('#barlist').dataTable( {
	        "aoColumns": [
	        { "bSortable": false },
	        null,
	        null,
	        null,
	        null,
	        null
	        ]
	    });
    }

    function callExportMerchants(){
        var newexporturl = "{/literal}{$data.admin_url}license/exportToExcel{literal}";
        window.location.href = newexporturl;return false;
    } 
</script>
{/literal}