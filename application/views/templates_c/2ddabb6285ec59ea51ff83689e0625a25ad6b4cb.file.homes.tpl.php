<?php /* Smarty version Smarty-3.1.11, created on 2026-01-26 23:10:20
         compiled from "E:\xampp\htdocs\license\application\views\templates\admin\home\homes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60474589697791ec441584-19931563%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ddabb6285ec59ea51ff83689e0625a25ad6b4cb' => 
    array (
      0 => 'E:\\xampp\\htdocs\\license\\application\\views\\templates\\admin\\home\\homes.tpl',
      1 => 1684772496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60474589697791ec441584-19931563',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_697791ec45a027_30289289',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_697791ec45a027_30289289')) {function content_697791ec45a027_30289289($_smarty_tpl) {?><div class="rightside">
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
                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['todaylicense']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['todaylicense'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['todaylicense'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vLastName'];?>
 </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['todaylicense'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['license_key'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['todaylicense'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['license_active_date'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['todaylicense'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['license_expire_date'];?>
</td>
                                    </tr>
                                    <?php endfor; endif; ?>
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
    								<strong>Total Users : <?php echo $_smarty_tpl->tpl_vars['data']->value['countOfUsers'];?>
</strong>
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
                                    <!-- <?php if (count($_smarty_tpl->tpl_vars['data']->value['signupUsers'])>0){?> -->
    								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['signupUsers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    								<tr>
    									<td><?php echo $_smarty_tpl->tpl_vars['data']->value['signupUsers'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vFirstName'];?>
 </td>
    									<td><?php echo $_smarty_tpl->tpl_vars['data']->value['signupUsers'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vLastName'];?>
</td>
    									<td><?php echo $_smarty_tpl->tpl_vars['data']->value['signupUsers'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vEmail'];?>
</td>
    									<td><?php echo $_smarty_tpl->tpl_vars['data']->value['signupUsers'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMobileNo'];?>
</td>
    								</tr>
    								<?php endfor; endif; ?>
    			                   <!--  <?php }else{ ?>
    			                    <tr>
    			                        <td colspan="6"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</td>
    			                    </tr>
    			                    <?php }?> -->
                                </tbody>
                            </table>
                        </div>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
</div>

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
<?php }} ?>