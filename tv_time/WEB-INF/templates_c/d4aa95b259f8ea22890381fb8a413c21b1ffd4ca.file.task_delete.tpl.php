<?php /* Smarty version Smarty-3.0.7, created on 2017-09-01 14:52:38
         compiled from "/home/alltic/public_html/televida/tv_time/WEB-INF/templates/task_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48178077559a97436f1da75-12628196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4aa95b259f8ea22890381fb8a413c21b1ffd4ca' => 
    array (
      0 => '/home/alltic/public_html/televida/tv_time/WEB-INF/templates/task_delete.tpl',
      1 => 1503498080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48178077559a97436f1da75-12628196',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/alltic/public_html/televida/tv_time/WEB-INF/lib/smarty/plugins/modifier.escape.php';
?><?php echo $_smarty_tpl->getVariable('forms')->value['taskDeleteForm']['open'];?>

<table cellspacing="4" cellpadding="7" border="0">
  <tr>
    <td>
      <table cellspacing="0" cellpadding="0" border="0">
        <tr>
          <td colspan="2" align="center"><b><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('task_to_delete')->value,'html');?>
</b></td>
        </tr>
        <tr>
          <td colspan="2" align="center">&nbsp;</td>
        </tr>
        <tr>
          <td align="right"><?php echo $_smarty_tpl->getVariable('forms')->value['taskDeleteForm']['btn_delete']['control'];?>
&nbsp;</td>
          <td align="left">&nbsp;<?php echo $_smarty_tpl->getVariable('forms')->value['taskDeleteForm']['btn_cancel']['control'];?>
</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getVariable('forms')->value['taskDeleteForm']['close'];?>

