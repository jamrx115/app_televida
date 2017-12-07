<?php /* Smarty version Smarty-3.0.7, created on 2016-10-24 14:35:51
         compiled from "/home/alltic/public_html/timetracker/WEB-INF/templates/cf_dropdown_option_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:517874197580e1c4710abe5-28674459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b96fc0e0c599bc412c0f82b218422cee6337e686' => 
    array (
      0 => '/home/alltic/public_html/timetracker/WEB-INF/templates/cf_dropdown_option_add.tpl',
      1 => 1475695909,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '517874197580e1c4710abe5-28674459',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php echo $_smarty_tpl->getVariable('forms')->value['optionAddForm']['open'];?>

<table cellspacing="4" cellpadding="7" border="0">
  <tr>
    <td>
<?php if ($_smarty_tpl->getVariable('user')->value->canManageTeam()){?>
      <table cellspacing="1" cellpadding="2" border="0">
        <tr>
          <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['thing_name'];?>
 (*):</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['optionAddForm']['name']['control'];?>
</td>
        </tr>
        <tr>
          <td></td>
          <td><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['required_fields'];?>
</td>
        </tr>
        <tr>
          <td></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
           <td colspan="2" align="center" height="50"><?php echo $_smarty_tpl->getVariable('forms')->value['optionAddForm']['btn_add']['control'];?>
</td>
        </tr>
      </table>
<?php }?>
    </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getVariable('forms')->value['optionAddForm']['close'];?>
