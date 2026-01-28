<link href="{$data.admin_css_path}bootstrap-timepicker.min.css" rel="stylesheet" media="screen">

<script src="{$data.admin_js_path}plugins/timepicker/boostrap-timepicker-min.js" type="text/javascript"></script>

<script type="text/javascript" src="{$data.base_url}assets/admin/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=AIzaSyATQu4gqk3QZ7OobfOTr-M1GLQKmwY7An0"></script>
<style type="text/css">
	.setmargin{
		margin-bottom: 15px;
	}
</style>
<div class="rightside">
	<div class="page-head breadpad">
		<ol class="breadcrumb">
			<li>You are here:</li>
			<li><a href="{$data.admin_url}home">Dashboard</a></li>
			<li><a href="{$data.admin_url}license">Manage License</a></li>  
			<li class="active">{if $data.action eq 'update'}Update{else}Add{/if} License</li>      
		</ol>
	</div>

	{if $data.message neq ''}
	<div class="span12">
		<div class="alert alert-info">
			{$data.message}
		</div>
	</div>
	{/if}
	<div id="googleMap" style="display:none;"></div>

	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-title">
						<h3>Add Manage License</h3>
					</div>
					<div class="box-body">
						{if $data.action eq 'update'}
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Edit License</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1">
						{/if}
								<form role="form" id="frmbar" action="{$data.admin_url}license/{$data.action}" method="post" enctype="multipart/form-data">
									{if $data.action eq 'update'}
										<input type="hidden" name="ilicenseId" value='{$data.license_detail.ilicenseId}'>
									{/if}
									
									<div class="form-group">
										<label class="control-label" for="first-name">License Name<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="licensename" name="licensename" value="{$data.license_detail.licensename}">
									</div>
									{if $data.action eq 'update'}
									<div class="form-group">
										<label class="control-label" for="first-name">License Key<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="license_key" name="license_key" value="{$data.license_detail.license_key}">
									</div>
									{/if}

									<div class="form-group">
										<label>Module Name<sup><span style="color:#CC2131">*</span></sup></label>
										<select class="form-control" name="modulesid" id="modulesid" >
											<option value="">-- Select modules --</option>
											{section name=i loop=$modules}
											<option {if $modules[i]['imodulesId'] eq $data.license_detail['modulesid']}selected="selected"{/if} value="{$modules[i]['imodulesId']}">{$modules[i]['modulesname']}</option>
											{/section}
										</select>
									</div>

									<div class="form-group">
										<label class="control-label" for="first-name">Prefix Code<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="prefixcode" name="prefixcode" value="{$data.license_detail.prefix_code}" maxlength="4">
									</div>

									<div class="form-group">
										<label>License Activate Date </label>
										<input type="text" class="form-control" id="license_active_date" name="license_active_date" value="{$data.license_detail.license_active_date}">
									</div>

									<div class="form-group">
										<label>License Expire Date </label>
										<input type="text" class="form-control" id="license_expire_date" name="license_expire_date" value="{$data.license_detail.license_expire_date}">
									</div>

									<div class="form-group">
										<label>Status<sup><span style="color:#CC2131">*</span></sup></label>
										<select class="form-control" name="eStatus" id="eStatus" >
											<option value="">-- Select Status --</option>
											<option value="Active" {if $data.license_detail['eStatus'] eq 'Active'}selected{/if}>Active</option>
											<option value="Inactive" {if $data.license_detail['eStatus'] eq 'Inactive'}selected{/if}>Inactive</option>
										</select>
									</div>

									{if $data.action eq 'create'}
									<button type="submit" id="btn-save" class="btn btn-primary">Save</button>
									{else}
										<button type="submit" id="btn-save" class="btn btn-primary">Save Change</button>
									{/if}
									<button type="button" class="btn btn-primary" onclick="returnme();">Cancel</button>
									<span  id="loader" style="float: left;padding-right:15px;display: block;"></span>
								</form>
						{if $data.action eq 'update'}	
							</div>
						</div>
						{/if}			
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{literal}
<script type="text/javascript">
var action='';
	
	function returnme()
	{
		window.location.href = base_url+'license';
	}

	$('#opening_hours').timepicker({
		defaultTime:false
	});
	$('#closing_hours').timepicker({
		defaultTime:false
	});

var rendererOptions = {
  draggable: false,

};

var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);
var directionsService = new google.maps.DirectionsService();

var map;
var lat=23.022505;
var lng=72.571362;
/*var lat=22.258652;
var lng=71.192381;*/
var Cnada = new google.maps.LatLng(lat,lng);

function initialize() {
	var mapOptions = {
		zoom: 3,
		center: Cnada
	};
	map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
	var input1 = document.getElementById('tAddress');
	var autocomplete = new google.maps.places.Autocomplete(input1);
	autocomplete.bindTo('bounds', map);
	directionsDisplay.setMap(map);   
}
google.maps.event.addDomListener(window, 'load', initialize);

	$(document).ready(function() {

		$('#frmbar').bootstrapValidator({
			message: 'This value is not valid',
			icon: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				licensename: {
					validators: {
						notEmpty: { message: 'License Name is required and can\'t be empty' },
						 
					}
				},
				eStatus: {
					validators: {
						notEmpty: {  message: 'Status is required and can\'t be empty'}
					}
				},
				prefixcode: {
					validators: {
						notEmpty: {  message: 'Prefix Code is required and can\'t be empty'}
					}
				},
				license_active_date: {
					validators: {
						notEmpty: { message: 'Activation Date is required and can\'t be empty' },
						 
					}
				},
				license_expire_date: {
					validators: {
						notEmpty: { message: 'Exipre Date is required and can\'t be empty' },
						 
					}
				},	
			}
		});
	});

	var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
	var checkin = $('#license_active_date').datepicker({
  		onRender: function(date) {
    		return date.valueOf() < now.valueOf() ? 'disabled' : '';
  		}
	}).on('changeDate', function(ev) {
  		if (ev.date.valueOf() > checkout.date.valueOf()) {
    		var newDate = new Date(ev.date)
    		newDate.setDate(newDate.getDate() + 1);
    		checkout.setValue(newDate);
  		}
  		checkin.hide();
  		$('#license_expire_date')[0].focus();
	}).data('datepicker');
	var checkout = $('#license_expire_date').datepicker({
  		onRender: function(date) {
    		return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  		}
	}).on('changeDate', function(ev) {
  		checkout.hide();
	}).data('datepicker');

</script>
{/literal}