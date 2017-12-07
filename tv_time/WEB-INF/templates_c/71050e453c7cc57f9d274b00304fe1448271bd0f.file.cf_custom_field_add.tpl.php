<?php /* Smarty version Smarty-3.0.7, created on 2016-10-21 22:52:13
         compiled from "/home/alltic/public_html/timetracker/WEB-INF/templates/cf_custom_field_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:244405975580a9c1daa5882-61232681%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71050e453c7cc57f9d274b00304fe1448271bd0f' => 
    array (
      0 => '/home/alltic/public_html/timetracker/WEB-INF/templates/cf_custom_field_add.tpl',
      1 => 1475695907,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '244405975580a9c1daa5882-61232681',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php echo $_smarty_tpl->getVariable('forms')->value['fieldForm']['open'];?>

<table cellspacing="4" cellpadding="7" border="0">
  <tr>
    <td>
<?php if ($_smarty_tpl->getVariable('user')->value->canManageTeam()){?>
      <table cellspacing="1" cellpadding="2" border="0">
        <tr>
          <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['thing_name'];?>
 (*):</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['fieldForm']['name']['control'];?>
</td>
        </tr>
        <tr>
          <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['type'];?>
:</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['fieldForm']['type']['control'];?>
</td>
        </tr>
        <tr>
          <td align="right"><label for="required"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['required'];?>
:</label></td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['fieldForm']['required']['control'];?>
</td>
        </tr>
        <tr>
          <td></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center" height="50"><?php echo $_smarty_tpl->getVariable('forms')->value['fieldForm']['btn_add']['control'];?>
</td>
        </tr>
      </table>
<?php }?>
    </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getVariable('forms')->value['fieldForm']['close'];?>
