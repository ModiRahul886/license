<div class="rightside">
	<div class="page-head breadpad">
		 <ol class="breadcrumb">
			<li>You are here:</li>
			<li><a href="{$data.admin_url}home">Dashboard</a></li>
			<li class="active">View Email Template</li>    
		</ol>
	</div>
	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<form name="frmlist" id="frmlist" action="{$data.admin_url}emailtemplate/action_update" method="post">
						<input type="hidden" name="action" id="action">
						<div class="box-title">
							<h3>Email Templates</h3>
						</div><!-- /.box-title -->
						<div class="box-body">
							{if $data.message neq ''}
							<div class="span12">
								<div class="alert alert-info">
									{$data.message}
								</div>
							</div>
							{/if}
							<div class="btnview">
							{if $data.happyhour_admin_info.eRole eq 'Subadmin'}
		                        {if $data.checkmoduleid|in_array:$data.adminpermidetail.tActive}
		                            <button type="submit" id="btn-active" class="btn btn-primary btnuser makebtn" onclick="check_all();" >Make Active</button>
		                        {/if}
		                        {if $data.checkmoduleid|in_array:$data.adminpermidetail.tInactive}
		                            <button type="submit" id="btn-inactive" class="btn btn-primary btnuser inctivebtn">Make Inactive</button>
		                        {/if}
		                        {if $data.checkmoduleid|in_array:$data.adminpermidetail.tAdd}
		                            <button type="button" id="btn-add" onclick="addme('{$data.admin_url}emailtemplate/create');"  class="btn btn-primary btnuser newadbtn"> Add New</button>
		                        {/if}
		                        {if $data.checkmoduleid|in_array:$data.adminpermidetail.tDelete}
		                            <button type="submit" id="btn-delete" class="btn btn-primary btnuser addbtn">Delete</button>
		                        {/if}
		                    {else}
								<button type="submit" id="btn-active" class="btn btn-primary btnuser makebtn" onclick="check_all();" >Make Active</button>
								<button type="submit" id="btn-inactive" class="btn btn-primary btnuser inctivebtn">Make Inactive</button>
								<button type="button" id="btn-add" onclick="addme('{$data.admin_url}emailtemplate/create');"  class="btn btn-primary btnuser newadbtn"> Add New</button>
								<button type="submit" id="btn-delete" class="btn btn-primary btnuser addbtn">Delete</button>
							{/if}
							</div>
							<div style='clear:both;'></div>
							<table id="emailTemplateListing" class="table table-bordered table-striped">
								<thead>
									<tr class="headings">
										<th><center><input type="checkbox" id="check_all" name="check_all" value="1"></center></th>
										<th>Email ID Title</th>
										<th>From Email ID</th>
										<th>Email ID Code</th>
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
									{if $data.all_emailtemplate|count gt 0 }
									{section name = i  loop=$data.all_emailtemplate}
									<tr>
									<td align="center">
										<input type="checkbox" name="iId[]" id="iId" class="tableflat" value="{$data.all_emailtemplate[i].iEmailTemplateId}"/>
									</td>
										<td>{$data.all_emailtemplate[i].vEmailTitle}</td>
										<td>{$data.all_emailtemplate[i].vFromEmail}</td>
										<td>{$data.all_emailtemplate[i].vEmailCode}</td>
										<td>{$data.all_emailtemplate[i].eStatus}</td>
										{if $data.happyhour_admin_info.eRole eq 'Subadmin'}
                                    		{if $data.checkmoduleid|in_array:$data.adminpermidetail.tUpdate}
												<td align="center"><a href="{$data.admin_url}emailtemplate/update/{$data.all_emailtemplate[i].iEmailTemplateId}" style="cursor:pointer;"><i class="fa fa-edit edtcolr"></i></a></td>
											{/if}
										{else}
											<td align="center"><a href="{$data.admin_url}emailtemplate/update/{$data.all_emailtemplate[i].iEmailTemplateId}" style="cursor:pointer;"><i class="fa fa-edit edtcolr"></i></a></td>
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
					</form>
				</div>  
			</div>  
		</div>
	</div>  
</div>
{literal}
<script type="text/javascript">
	var _update = "{/literal}{if $data.checkmoduleid|in_array:$data.adminpermidetail.tUpdate}done{else if $data.happyhour_admin_info.eRole eq 'Admin'}adminlist{else}notdone{/if}{literal}";
    if(_update == 'done'){
       	$('#emailTemplateListing').dataTable( {
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
        $('#emailTemplateListing').dataTable( {
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
        $('#emailTemplateListing').dataTable( {
        "aoColumns": [
	        { "bSortable": false },
	        null,
	        null,
	        null,
	        null
	        ]
	    });
    }
		
</script>
{/literal}