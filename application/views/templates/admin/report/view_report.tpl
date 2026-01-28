<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<div class="rightside">
	<div class="page-head breadpad">
		<!-- <h1>User</h1> -->
		<ol class="breadcrumb">
			<li>You are here:</li>
			<li><a href="{$data.admin_url}home">Dashboard</a></li>
			<li class="active">Report</li>
		</ol>
	</div>
	<div class="content">
		<!-- Main row -->
		<div class="row" id='activegenrefile'>
			<div class="col-md-12">
				<div class="container-fluid">
					<hr>
					<form action="{$data.admin_url}report/charts_content" id="royaltyfrm" method="post" name="frm1">

					<div class="form-group" style="display:block;height:60px;width:20%;padding-left:20px;float:left;">
						<label>Hotel Name </label>
						<select class="form-control" name='iBarId' id='iBarId'>
						<option value=''>Please select Hotel</option>
							{section name=i loop=$data.AllBarName}
							<option value='{$data.AllBarName[i].iBarId}'>{$data.AllBarName[i].vBarName}</option>
							{/section}
						</select>
						<span id="valbarname" style="display:none;" class="validationfrm loginmsg">Please Select Hotel Name.</span>
					</div>

					<div class="form-group" style="display:block;height:60px;width:20%;padding-left:20px;float:left;">
						<label>View Option</label>
						<select class="form-control" name='option' id='option' onchange="show_select(this.value);">
						<option value=''>Select Views Option</option>
							<option value="Day">Day</option>
							<option value="Week">week</option>
							<option value="Month">Month</option>
						</select>	
						<span id="valoption" style="display:none;" class="validationfrm loginmsg">Please Select Option.</span>
					</div>

					<div class="form-group" style="display:none;height:60px;width:20%;padding-left:20px;float:left;" id='monthdisplay'>
						<label>Month</label>
						<select class="form-control" name='Month' id='Month'>
						<option value=''>Select Month</option>
							<option value="January-1">January</option>
							<option value="February-2">February</option>
							<option value="March-3">March</option>
							<option value="April-4">April</option>
							<option value="May-5">May</option>
							<option value="June-6">June</option>
							<option value="July-7">July</option>
							<option value="August-8">August</option>
							<option value="september-9">september</option>
							<option value="october-10">october</option>
							<option value="November-11">November</option>
							<option value="December-12">December</option>
						</select>	
						<span id="valmonth" style="display:none;" class="validationfrm loginmsg">Please Select Month.</span>
					</div>
					{$year=date('Y')-4}
					<div class="form-group" style="display:none;height:60px;width:20%;padding-left:20px;float:left;" id='yeardisplay'>
						<label>Year</label>
						<select class="form-control" name='Year' id='Year'>
						<option value=''>Select Year</option>
						{for $i=$year to $year+25}
						<option value={$i}>{$i}</option>
						{/for}	
						</select>	
						<span id="valyear" style="display:none;" class="validationfrm loginmsg">Please Select Year.</span>
					</div>

					<div class="form-group" style="display:block;height:60px;padding-left:15px;float:left;padding-top: 10px;">
						<button id="btn_royalty_report" type="submit" class="btn btn-primary btnuser makebtn">Show Report</button>
					</div>
					</form>

					<div class="row" id='royalty_report'>
						<div class="col-sm-12">
							<!-- BEGIN PROPERTY CARD -->
							<div class="panel panel-info panel-square panel-no-border task-list-wrap">
								<div class="panel-heading lg">
									<h3 class="panel-title">Report</h3>
								</div>
								<div class="the-box">
									
								<div id="container" style="min-width: 300px; height: 600px; margin: 0 auto"></div>
									
								</div>
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

	$(document).ready(function () {
		$('#royaltyfrm').bootstrapValidator({
	        message: 'This value is not valid',
	        icon: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	            iBarId: {
	                validators: {
	                    notEmpty: { message: 'Please Select Hotel Name' },
	                     
	                }
	            },
	            option: {
	                validators: {
	                    notEmpty: { message: 'Please Select Option' },
	                     
	                }
	            },
	            
	            Month: {
	                validators: {
	                    notEmpty: {
	                        message: 'Please Select Month'
	                    },
	                     
	                }  
	            },
	            Year: {
	                validators: {
	                    notEmpty: {
	                        message: 'Please Select Year'
	                    },
	                     
	                }  
	            }
	        }
	    });
    });

	function show_select(seldispl){

	if(seldispl=='Month'){
		$('#Month').val(""); 
		$('#Year').val(""); 
		$('#yeardisplay').show();
		$('#monthdisplay').hide();
	}else if(seldispl==''){
		$('#yeardisplay').hide();
		$('#monthdisplay').hide();
		$('#Month').val(""); 
		$('#Year').val(""); 
	}else{	
		
		$('#yeardisplay').show();
		$('#monthdisplay').show();
		$('#Month').val(""); 
		$('#Year').val(""); 
		 
	}
}

	$(function () {
	    $('#container').highcharts({
            chart: {
                type: 'line'
            },
            title: {
                text: 'Order Hotel Report'
            },
	        legend: {
	            layout: 'vertical',
	            align: 'left',
	            verticalAlign: 'top',
	            x: 150,
	            y: 100,
	            floating: true,
	            borderWidth: 1,
	            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
	        },

            /*subtitle: {
                text: 'Source: WorldClimate.com'
            },*/
            xAxis: {
                 categories: [
	               {/literal}{for $i=1 to $data.total}{literal}
	               	{/literal}"{$data.option|cat:$i}",{literal}
	               {/literal}{/for}{literal}
	            ]
            },
            yAxis: {
                title: {
                    text: 'No. of User'
                }
            },
            tooltip: {
	            shared: true,
	            valueSuffix: ' Hotels ordered'
	        },
            plotOptions: {
	            areaspline: {
	                fillOpacity: 0
	            }
	        },
            series: [{
               name: 'Report',

	            data:[{/literal}{section name=i loop=$data.Final_data}{literal}
	                  {/literal}{$data.Final_data[i]},{literal}	
	                  {/literal}{/section}{literal}]
	        }]
        });
	});
</script>
{/literal}