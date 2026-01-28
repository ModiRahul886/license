<div class="rightside">
	<div class="page-head breadpad">
        <ol class="breadcrumb">
            <li>You are here:</li>
            <li class="active">Dashboard</li>    
        </ol>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
        		<div class="col-md-12">
        			<div class="box">
        				<div class="box-title">
                            <h3>Show License</h3>
                        </div>
                        <div class="box-body">
                        	<table class="table table-bordered table-striped" width='100%' id="booklisting">
                                <thead>
                                    <tr>                                   
                                        <th width='25%'>User Name</th>
                                        <th width='30%'>License Key</th>
                                        <th width='15%'>Active Date</th>
                                        <th width='20%'>Expire Date</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    {section name = i loop = $data.todaylicense}
                                    <tr>
                                        <td>{$data.todaylicense[i].vFirstName} {$data.todaylicense[i].vLastName} </td>
                                        <td>{$data.todaylicense[i].license_key}</td>
                                        <td>{$data.todaylicense[i].license_active_date}</td>
                                        <td>{$data.todaylicense[i].license_expire_date}</td>
                                    </tr>
                                    {/section}
                                </tbody>
                            </table>
                        </div>
        			</div>
        		</div>

        		<div class="col-md-12">
        			<div class="box">
        				<div class="box-title">
                            <h3>Registered Users</h3>
                            <ul class="nav navbar-right panel_toolbox">
    							<li>
    								<strong>Total Users : {$data.countOfUsers}</strong>
    	                        </li>
    	                    </ul>
                        </div>
                        <div class="box-body">
                        	<table class="table table-bordered table-striped" width='100%' id="userlisting">
                                <thead>
                                    <tr>                                   
                                        <th>First Name</th>
    									<th>Last Name</th>
    									<th>Email ID</th>
    									<th>Mobile No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- {if $data.signupUsers|count gt 0 } -->
    								{section name = i loop = $data.signupUsers}
    								<tr>
    									<td>{$data.signupUsers[i].vFirstName} </td>
    									<td>{$data.signupUsers[i].vLastName}</td>
    									<td>{$data.signupUsers[i].vEmail}</td>
    									<td>{$data.signupUsers[i].iMobileNo}</td>
    								</tr>
    								{/section}
    			                   <!--  {else}
    			                    <tr>
    			                        <td colspan="6">{$data.paging_message}</td>
    			                    </tr>
    			                    {/if} -->
                                </tbody>
                            </table>
                        </div>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
</div>
{literal}
<script type="text/javascript">
    $('#booklisting').dataTable( {
        "aoColumns": [
        null,
        null,
        null,
        null
        ],
        "language": {
            "zeroRecords": "No Records Found"
        }
    });

    $('#userlisting').dataTable( {
        "aoColumns": [
        null,
        null,
        null,
        null
        ],
        "language": {
            "zeroRecords": "No Records Found"
        }
    });
</script>
{/literal}