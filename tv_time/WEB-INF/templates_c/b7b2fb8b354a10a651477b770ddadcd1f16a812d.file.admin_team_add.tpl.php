<?php /* Smarty version Smarty-3.0.7, created on 2017-10-26 11:49:38
         compiled from "/var/www/html/tv_time/WEB-INF/templates/admin_team_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135504219759f1cbd2622855-43831564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7b2fb8b354a10a651477b770ddadcd1f16a812d' => 
    array (
      0 => '/var/www/html/tv_time/WEB-INF/templates/admin_team_add.tpl',
      1 => 1508950116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135504219759f1cbd2622855-43831564',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php echo $_smarty_tpl->getVariable('forms')->value['teamForm']['open'];?>

<table cellspacing="4" cellpadding="7" border="0">
  <tr>
    <td>
      <table cellspacing="1" cellpadding="2" border="0">
        <tr>
          <td align="right" nowrap><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['team_name'];?>
:</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['teamForm']['team_name']['control'];?>
</td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
          <td align="right" nowrap><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['manager_name'];?>
 (*):</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['teamForm']['manager_name']['control'];?>
</td>
        </tr>
        <tr>
          <td align="right" nowrap><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['manager_login'];?>
 (*):</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['teamForm']['manager_login']['control'];?>
</td>
        </tr>
<?php if (!$_smarty_tpl->getVariable('auth_external')->value){?>
        <tr>
          <td align="right" nowrap><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['password'];?>
 (*):</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['teamForm']['password1']['control'];?>
</td>
        </tr>
        <tr>
          <td align="right" nowrap><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['confirm_password'];?>
 (*):</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['teamForm']['password2']['control'];?>
</td>
        </tr>
<?php }?>
        <tr>
          <td align="right" nowrap><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['email'];?>
:</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['teamForm']['manager_email']['control'];?>
</td>
        </tr>
        <tr>
          <td></td>
          <td><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['required_fields'];?>
</td>
        </tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
          <td colspan="2" height="50" align="center"><?php echo $_smarty_tpl->getVariable('forms')->value['teamForm']['btn_submit']['control'];?>
</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getVariable('forms')->value['teamForm']['close'];?>
