<?php /* Smarty version Smarty-3.1.11, created on 2026-01-26 23:11:40
         compiled from "E:\xampp\htdocs\license\application\views\templates\admin\license\add_edit_license.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18466457056977923cbf9050-08344586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b763e185b8ba0b19fe580e5b004820ddf07f059' => 
    array (
      0 => 'E:\\xampp\\htdocs\\license\\application\\views\\templates\\admin\\license\\add_edit_license.tpl',
      1 => 1695122911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18466457056977923cbf9050-08344586',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'modules' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_6977923cc316b5_27010857',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6977923cc316b5_27010857')) {function content_6977923cc316b5_27010857($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_css_path'];?>
bootstrap-timepicker.min.css" rel="stylesheet" media="screen">

<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_js_path'];?>
plugins/timepicker/boostrap-timepicker-min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
assets/admin/tinymce/js/tinymce/tinymce.min.js"></script>
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
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
home">Dashboard</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
license">Manage License</a></li>  
			<li class="active"><?php if ($_smarty_tpl->tpl_vars['data']->value['action']=='update'){?>Update<?php }else{ ?>Add<?php }?> License</li>      
		</ol>
	</div>

	<?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
	<div class="span12">
		<div class="alert alert-info">
			<?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

		</div>
	</div>
	<?php }?>
	<div id="googleMap" style="display:none;"></div>

	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-title">
						<h3>Add Manage License</h3>
					</div>
					<div class="box-body">
						<?php if ($_smarty_tpl->tpl_vars['data']->value['action']=='update'){?>
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Edit License</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1">
						<?php }?>
								<form role="form" id="frmbar" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
license/<?php echo $_smarty_tpl->tpl_vars['data']->value['action'];?>
" method="post" enctype="multipart/form-data">
									<?php if ($_smarty_tpl->tpl_vars['data']->value['action']=='update'){?>
										<input type="hidden" name="ilicenseId" value='<?php echo $_smarty_tpl->tpl_vars['data']->value['license_detail']['ilicenseId'];?>
'>
									<?php }?>
									
									<div class="form-group">
										<label class="control-label" for="first-name">License Name<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="licensename" name="licensename" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['license_detail']['licensename'];?>
">
									</div>
									<?php if ($_smarty_tpl->tpl_vars['data']->value['action']=='update'){?>
									<div class="form-group">
										<label class="control-label" for="first-name">License Key<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="license_key" name="license_key" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['license_detail']['license_key'];?>
">
									</div>
									<?php }?>

									<div class="form-group">
										<label>Module Name<sup><span style="color:#CC2131">*</span></sup></label>
										<select class="form-control" name="modulesid" id="modulesid" >
											<option value="">-- Select modules --</option>
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['modules']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
											<option <?php if ($_smarty_tpl->tpl_vars['modules']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['imodulesId']==$_smarty_tpl->tpl_vars['data']->value['license_detail']['modulesid']){?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['modules']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['imodulesId'];?>
"><?php echo $_smarty_tpl->tpl_vars['modules']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['modulesname'];?>
</option>
											<?php endfor; endif; ?>
										</select>
									</div>

									<div class="form-group">
										<label class="control-label" for="first-name">Prefix Code<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="prefixcode" name="prefixcode" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['license_detail']['prefix_code'];?>
" maxlength="4">
									</div>

									<div class="form-group">
										<label>License Activate Date </label>
										<input type="text" class="form-control" id="license_active_date" name="license_active_date" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['license_detail']['license_active_date'];?>
">
									</div>

									<div class="form-group">
										<label>License Expire Date </label>
										<input type="text" class="form-control" id="license_expire_date" name="license_expire_date" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['license_detail']['license_expire_date'];?>
">
									</div>

									<div class="form-group">
										<label>Status<sup><span style="color:#CC2131">*</span></sup></label>
										<select class="form-control" name="eStatus" id="eStatus" >
											<option value="">-- Select Status --</option>
											<option value="Active" <?php if ($_smarty_tpl->tpl_vars['data']->value['license_detail']['eStatus']=='Active'){?>selected<?php }?>>Active</option>
											<option value="Inactive" <?php if ($_smarty_tpl->tpl_vars['data']->value['license_detail']['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
										</select>
									</div>

									<?php if ($_smarty_tpl->tpl_vars['data']->value['action']=='create'){?>
									<button type="submit" id="btn-save" class="btn btn-primary">Save</button>
									<?php }else{ ?>
										<button type="submit" id="btn-save" class="btn btn-primary">Save Change</button>
									<?php }?>
									<button type="button" class="btn btn-primary" onclick="returnme();">Cancel</button>
									<span  id="loader" style="float: left;padding-right:15px;display: block;"></span>
								</form>
						<?php if ($_smarty_tpl->tpl_vars['data']->value['action']=='update'){?>	
							</div>
						</div>
						<?php }?>			
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


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
<?php }} ?>