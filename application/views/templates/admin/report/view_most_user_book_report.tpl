<script src="{$data.admin_js_path}plugins/chart/highcharts.js" type="text/javascript"></script>
<script src="{$data.admin_js_path}plugins/chart/exporting.js"></script>

<div class="rightside">
	<div class="page-head breadpad">
		<ol class="breadcrumb">
			<li>You are here:</li>
			<li><a href="{$data.admin_url}home">Dashboard</a></li>
			<li class="active">Most User Order Hotel</li>
		</ol>
	</div>
	<!-- <div class="content">
		<div class="row" id='activegenrefile'>
			<div class="col-md-12">
				<div class="container-fluid">
					<hr>
					<form action="{$data.admin_url}report/showMostUserReport" id="royaltyfrm" method="post" name="frm1">
					<div class="form-group" style="display:block;height:60px;width:300px;padding-left:0px;float:left;height:70px !important;">
						<label>From Date</label>
						<input type="text" class="span2 form-control" id="startDate" name="startDate" value='{$data.startdate}'>
						<label id="startDateErr" name="startDateErr" style='color:#EC2028;display:none;'>Please enter from date</label>
					</div>
					<div class="form-group" style="display:block;height:60px;width:300px;padding-left:15px;float:left;height:70px !important;">
						<label>To Date</label>
						<input type="text" class="span2 form-control" id="endDate" name="endDate" value='{$data.enddate}'>
						<label id="endDateErr" name="endDateErr" style='color:#EC2028;display:none;'>Please enter to date</label>
					</div>
					<div class="form-group" style="display:block;height:60px;width:300px;padding-left:15px;float:left;padding-top: 10px;">
						<button id="btn_royalty_report" type="button" class="btn btn-primary btnuser makebtn">Show Report</button>
					</div>
					</form>

					<div class="row" id='royalty_report'>
						<div class="col-sm-12">
							<div class="panel panel-info panel-square panel-no-border task-list-wrap">
								<div class="panel-heading lg">
									<h3 class="panel-title">Most User Order Hotel Report</h3>
								</div>
								<div class="the-box">
									{if $data.royalty_chart_status neq 'no'}
									<div id="royalty_report_chart" style="min-width: 300px; height: 600px; margin: 0 auto"></div>
									{else}
									<div style="height: 400px; width: 600px; margin: 0 auto;text-align:center;font-weight:bold;padding-top:200px;"><lable>DATA NOT AVAILABLE</lable></div>
									{/if}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="rightside"> -->
	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-title">
                        <h3>Most User Order</h3>
                    </div>

                    <div class="box-body">
                    <form action="{$data.admin_url}report/showMostUserReport" id="royaltyfrm" method="post" name="frm1">
					<div class="form-group" style="display:block;height:60px;width:300px;padding-left:0px;float:left;height:70px !important;">
						<label>From Date</label>
						<input type="text" class="span2 form-control" id="startDate" name="startDate" value='{$data.startdate}'>
						<label id="startDateErr" name="startDateErr" style='color:#EC2028;display:none;'>Please enter from date</label>
					</div>
					<div class="form-group" style="display:block;height:60px;width:300px;padding-left:15px;float:left;height:70px !important;">
						<label>To Date</label>
						<input type="text" class="span2 form-control" id="endDate" name="endDate" value='{$data.enddate}'>
						<label id="endDateErr" name="endDateErr" style='color:#EC2028;display:none;'>Please enter to date</label>
					</div>
					<div class="form-group" style="display:block;height:60px;width:300px;padding-left:15px;float:left;padding-top: 10px;">
						<button id="btn_royalty_report" type="button" class="btn btn-primary btnuser makebtn">Show Report</button>
					</div>
					</form>
					
                    	<table id="userlisting" class="table table-bordered table-striped" width='100%'>
                            <thead>
                                <tr>
                                	<th width='15%'>Name</th>
                                    <th width='20%'>Email</th>
                                    <th width='15%'>Mobile</th>
                                    <th width="10%">No Of Complete Order</th>
                                    <th width="10%">No Of Confirm Order</th>
                                    <th width="10%">No Of Cancel Order</th>
                                    <!-- <th width='15%'>Metadata</th>
                                    <th width='20%'>Description</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            	{section name=i loop=$data.allUser}
                            	<tr>
	                            	<td>{$data.allUser[i].vName}</td>
	                            	<td>{$data.allUser[i].vEmail}</td>
	                            	<td>{$data.allUser[i].iMobileNo}</td>
	                            	{if $data.allUser[i].complete neq ''}
	                            	<td>{$data.allUser[i].complete}</td>
	                            	{else}
	                            	<td>0</td>
	                            	{/if}
	                            	{if $data.allUser[i].confirm neq ''}
	                            	<td>{$data.allUser[i].confirm}</td>
	                            	{else}
	                            	<td>0</td>
	                            	{/if}
	                            	{if $data.allUser[i].cancel neq ''}
	                            	<td>{$data.allUser[i].cancel}</td>
	                            	{else}
	                            	<td>0</td>
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

{literal}
<script type="text/javascript">

	$('#userlisting').dataTable( {
		"aaSorting": [[ 3, "desc" ]],
	  	"aoColumns": [
	  	{ "bSortable": false },
	  	null,
	  	null,
	  	null,
	  	null,
	  	{ "bSortable": true },
	  	] 
	});

	$('#btn_royalty_report').on('click',function(){
		var startdate = enddate = '';
		startdate = $('#startDate').val();
		enddate = $('#endDate').val();
		startdate= startdate.trim();
		enddate= enddate.trim();
		if(startdate==''){
			$('#startDateErr').show();
			$('#startDate').addClass('royaltyinputbox');
		}
		else {
			$('#startDateErr').hide();
			$('#startDate').removeClass('royaltyinputbox');
		}	
		if(enddate==''){
			$('#endDateErr').show();
			$('#endDate').addClass('royaltyinputbox');
		}
		else {
			$('#endDateErr').hide();
			$('#endDate').removeClass('royaltyinputbox');	
		}

		if(startdate!='' && enddate!=''){
			$('#royaltyfrm').submit();
		}
		else {
			return false;
		}
	});
   	
   	$(function () {
   		// Build the chart
		$('#royalty_report_chart').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false
			},
			title: {
				text: 'Most User Order Hotel Report'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			plotOptions: {
				pie: {
					size:'80%',
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: true,
						format: '<b>{point.name}</b>: {point.percentage:.1f} %',
						style: {
							color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
							width:"10%"
						},
						connectorColor: 'silver'
					}
				}
			},
			series: [{
				type: 'pie',
				name: 'Percentage',
				data: [{/literal}{section name=i loop=$data.allUser}{literal}
						[{/literal}"{$data.allUser[i].vName}"{literal},{/literal}{$data.allUser[i].avg}{literal}],
						{/literal}{/section}{literal}]
			}]
		});
	});

	var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
	var checkin = $('#startDate').datepicker({
		format: 'dd-mm-yyyy'/*,
		onRender: function(date) {
			return date.valueOf() < now.valueOf() ? 'disabled' : '';
		}*/
	}).on('changeDate', function(ev) {
		if (ev.date.valueOf() > checkout.date.valueOf()) {
			var newDate = new Date(ev.date)
			newDate.setDate(newDate.getDate());
			checkout.setValue(newDate);
		}
		checkin.hide();
		//$('#endDate')[0].focus();
	}).data('datepicker');
	var checkout = $('#endDate').datepicker({
		format: 'dd-mm-yyyy'/*,
		onRender: function(date) {
			return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
		}*/
	}).on('changeDate', function(ev) {
		if (ev.date.valueOf() < checkin.date.valueOf()) {
			var newDate = new Date(ev.date)
			newDate.setDate(newDate.getDate());
			checkin.setValue(newDate);
		}
		checkout.hide();
	}).data('datepicker');



	function Export(){
		var startdate="{/literal}{$data.startdate}{literal}";
		var enddate="{/literal}{$data.enddate}{literal}";
		var url=base_url+'admin/royalty_report/Exportcvs/'+startdate+'/'+enddate;
		window.location.href=url;
	}

</script>
{/literal}