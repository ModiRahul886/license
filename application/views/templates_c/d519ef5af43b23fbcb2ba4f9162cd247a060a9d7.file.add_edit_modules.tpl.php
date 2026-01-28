<?php /* Smarty version Smarty-3.1.11, created on 2026-01-26 23:17:10
         compiled from "E:\xampp\htdocs\license\application\views\templates\admin\modules\add_edit_modules.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14744764876977938687bc67-58136987%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd519ef5af43b23fbcb2ba4f9162cd247a060a9d7' => 
    array (
      0 => 'E:\\xampp\\htdocs\\license\\application\\views\\templates\\admin\\modules\\add_edit_modules.tpl',
      1 => 1693935722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14744764876977938687bc67-58136987',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_697793868bbd46_58046327',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_697793868bbd46_58046327')) {function content_697793868bbd46_58046327($_smarty_tpl) {?><style type="text/css">
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
modules">Manage Modules</a></li>  
			<li class="active"><?php if ($_smarty_tpl->tpl_vars['data']->value['action']=='update'){?>Update<?php }else{ ?>Add<?php }?> Modules</li>      
		</ol>
	</div>

	<?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
	<div class="span12">
		<div class="alert alert-info">
			<?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

		</div>
	</div>
	<?php }?>

	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-title">
						<h3>Add Modules</h3>
					</div>
					<div class="box-body">
						<?php if ($_smarty_tpl->tpl_vars['data']->value['action']=='update'){?>
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Edit Modules</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1">
						<?php }?>
								<form role="form" id="frmbar" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin_url'];?>
modules/<?php echo $_smarty_tpl->tpl_vars['data']->value['action'];?>
" method="post" enctype="multipart/form-data">
									<?php if ($_smarty_tpl->tpl_vars['data']->value['action']=='update'){?>
										<input type="hidden" name="imodulesId" value='<?php echo $_smarty_tpl->tpl_vars['data']->value['modules_detail']['imodulesId'];?>
'>
									<?php }?>
									
									<div class="form-group">
										<label class="control-label" for="first-name">Modules Name<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="modulesname" name="modulesname" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['modules_detail']['modulesname'];?>
">
									</div>

									<div class="form-group">
										<label class="control-label" for="first-name">Modules<sup><span style="color:#CC2131">*</span></sup></label>
										<input type="text" class="form-control" id="modules" name="modules" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['modules_detail']['modules'];?>
">
									</div>

									<div class="form-group">
										<label>Status<sup><span style="color:#CC2131">*</span></sup></label>
										<select class="form-control" name="eStatus" id="eStatus" >
											<option value="">-- Select Status --</option>
											<option value="Active" <?php if ($_smarty_tpl->tpl_vars['data']->value['modules_detail']['eStatus']=='Active'){?>selected<?php }?>>Active</option>
											<option value="Inactive" <?php if ($_smarty_tpl->tpl_vars['data']->value['modules_detail']['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
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
		window.location.href = base_url+'modules';
	}
	$(document).ready(function() {

		$('#frmbar').bootstrapValidator({
			message: 'This value is not valid',
			icon: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				modules: {
					validators: {
						notEmpty: { message: 'Modules is required and can\'t be empty' },
						 
					}
				},modulesname: {
					validators: {
						notEmpty: { message: 'Modules Name is required and can\'t be empty' },
						 
					}
				},
				eStatus: {
					validators: {
						notEmpty: {  message: 'Status is required and can\'t be empty'}
					}
				},	
			}
		});
	});

</script>
<?php }} ?>