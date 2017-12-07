<?php /* Smarty version Smarty-3.0.7, created on 2017-09-01 16:36:51
         compiled from "/home/alltic/public_html/televida/tv_time/WEB-INF/templates/project_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113709305459a98ca3e6b492-21872485%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26b7e093cb71122fcc0359037d85ee6134d6cae0' => 
    array (
      0 => '/home/alltic/public_html/televida/tv_time/WEB-INF/templates/project_edit.tpl',
      1 => 1503498080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113709305459a98ca3e6b492-21872485',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php echo $_smarty_tpl->getVariable('forms')->value['projectForm']['open'];?>

<table cellspacing="4" cellpadding="7" border="0">
  <tr>
    <td>
      <table cellspacing="1" cellpadding="2" border="0">
        <tr>
          <td align = "right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['thing_name'];?>
 (*):</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['projectForm']['project_name']['control'];?>
</td>
        </tr>
        <tr>
          <td align = "right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['description'];?>
:</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['projectForm']['description']['control'];?>
</td>
        </tr>
        <tr>
          <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['status'];?>
:</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['projectForm']['status']['control'];?>
</td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
          <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['users'];?>
:</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['projectForm']['users']['control'];?>
</td>
        </tr>
<?php if ((@MODE_PROJECTS_AND_TASKS==$_smarty_tpl->getVariable('user')->value->tracking_mode)){?>
        <tr><td>&nbsp;</td></tr>
        <tr>
          <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['tasks'];?>
:</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['projectForm']['tasks']['control'];?>
</td>
        </tr>
<?php }?>
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
          <td colspan="2" align="center" height="50"><?php echo $_smarty_tpl->getVariable('forms')->value['projectForm']['btn_save']['control'];?>
 <?php echo $_smarty_tpl->getVariable('forms')->value['projectForm']['btn_copy']['control'];?>
</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getVariable('forms')->value['projectForm']['close'];?>
