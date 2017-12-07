<?php /* Smarty version Smarty-3.0.7, created on 2016-10-05 19:52:14
         compiled from "/home/alltic/public_html/timetracker/WEB-INF/templates/admin_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119293163157f559ee493584-66183773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44ea621986f38f28527914e39eb6b018bfa6a7fe' => 
    array (
      0 => '/home/alltic/public_html/timetracker/WEB-INF/templates/admin_options.tpl',
      1 => 1475695905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119293163157f559ee493584-66183773',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php echo $_smarty_tpl->getVariable('forms')->value['optionsForm']['open'];?>

<table cellspacing="4" cellpadding="7" border="0">
  <tr>
    <td>
      <table cellspacing="1" cellpadding="2" border="0">
        <tr>
          <td align="right" nowrap><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['person_name'];?>
 (*):</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['optionsForm']['name']['control'];?>
</td>
        </tr>
        <tr>
          <td align="right" nowrap><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['login'];?>
 (*):</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['optionsForm']['login']['control'];?>
</td>
        </tr>
<?php if (!$_smarty_tpl->getVariable('auth_external')->value){?>
        <tr>
          <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['password'];?>
:</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['optionsForm']['password1']['control'];?>
</td>
        </tr>
        <tr>
          <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['confirm_password'];?>
:</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['optionsForm']['password2']['control'];?>
</td>
        </tr>
<?php }?>
        <tr>
          <td align="right" nowrap><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['email'];?>
:</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['optionsForm']['email']['control'];?>
</td>
        </tr>
        <tr>
          <td></td>
          <td><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['required_fields'];?>
</td>
        </tr>
        <tr>
          <td colspan="2" align="center" height="50"><?php echo $_smarty_tpl->getVariable('forms')->value['optionsForm']['btn_submit']['control'];?>
</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getVariable('forms')->value['optionsForm']['close'];?>
