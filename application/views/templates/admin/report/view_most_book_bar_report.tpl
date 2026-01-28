<script src="{$data.admin_js_path}plugins/chart/highcharts.js" type="text/javascript"></script>
<script src="{$data.admin_js_path}plugins/chart/exporting.js"></script>

<div class="rightside">
	<div class="page-head breadpad">
		<ol class="breadcrumb">
			<li>You are here:</li>
			<li><a href="{$data.admin_url}home">Dashboard</a></li>
			<li class="active">Most Order Hotel Report</li>
		</ol>
	</div>
	<div class="content">
		<div class="row" id='activegenrefile'>
			<div class="col-md-12">
				<div class="container-fluid">
					<form action="{$data.admin_url}report/showMostBookBarReport" id="bookBarfrm" method="post" name="frm1">
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
							<button id="btn_book_report" type="button" class="btn btn-primary btnuser makebtn">Show Report</button>
						</div>
					</form>

					<div class="row" id='royalty_report'>
						<div class="col-sm-12">
							<div class="panel panel-info panel-square panel-no-border task-list-wrap">
								<div class="panel-heading lg">
									<h3 class="panel-title">Most Hotel Order Report</h3>
								</div>
								<div class="the-box">
									{if $data.report_chart_status neq 'no'}
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
<div class="rightside">
	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-title">
                        <h3>Most Hotel Order</h3>
                    </div>
                    <div class="box-body">
                    	<table id="barlisting" class="table table-bordered table-striped">
	                        <thead>
	                            <tr>
	                            	<th style ="display:none">age</th>
	                            	<th width='15%'>Hotel Name</th>
	                                <th width='15%'>Owner Name</th>
	                                <th width='15%'>Email</th>
	                                <th width='15%'>Mobile</th>
	                                <th width='20%'>Designation</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	{section name=i loop=$data.mostBookBar}
	                        	<tr>
	                        		<td style ="display:none">{$data.mostBookBar[i].avg}</td>
	                            	<td>{$data.mostBookBar[i].vBarName}</td>
	                            	<td>{$data.mostBookBar[i].vFirstName} {$data.mostBookBar[i].vLastName}</td>
	                            	<td>{$data.mostBookBar[i].vEmail}</td>
	                            	<td>{$data.mostBookBar[i].iMobileNo}</td>
	                            	<td>{$data.mostBookBar[i].eDesignation}</td>
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

	$('#barlisting').dataTable( {
	  	"aoColumns": [
	  	{"bSorting": false},
	  	null,
	  	null,
	  	null,
	  	null,
	  	null
	  	],
	  	"aaSorting": [[ 0, "desc" ]]
	});

	$('#btn_book_report').on('click',function(){
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
			$('#bookBarfrm').submit();
		}
		else {
			return false;
		}
	});
   	
   	$(function () {
	    $('#royalty_report_chart').highcharts({
	        chart: {
	            type: 'column'
	        },
	        title: {
	            text: 'Most ordered Hotel report'
	        },
	        subtitle: {
	            text: ''
	        },
	        xAxis: {
	            categories: [
	                {/literal}{section name=i loop=$data.allBookBar}{literal}
							[{/literal}"{$data.allBookBar[i].vBarName}"{literal}],
							{/literal}{/section}{literal}
	            ],
	            crosshair: true
	        },
	        yAxis: {
	            min: 0,
	            title: {
	                text: 'No. of users'
	            }
	        },
	        tooltip: {
	            shared: true,
	            valueSuffix: ' %'
	        },
	        plotOptions: {
	            areaspline: {
	                fillOpacity: 0
	            }
	        },
	        series: [{
	            name: 'Hotels',
	            data: [{/literal}{section name=i loop=$data.allBookBar}{$data.allBookBar[i].avg},{/section}{literal}]
	        }]
	    });
	});

   	var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
	var checkin = $('#startDate').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
		if (ev.date.valueOf() > checkout.date.valueOf()) {
			var newDate = new Date(ev.date)
			newDate.setDate(newDate.getDate());
			checkout.setValue(newDate);
		}
		checkin.hide();
	}).data('datepicker');
	var checkout = $('#endDate').datepicker({
		format: 'dd-mm-yyyy'
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