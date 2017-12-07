<?php /* Smarty version Smarty-3.0.7, created on 2017-08-25 21:35:46
         compiled from "/home/alltic/public_html/televida/tv_time/WEB-INF/templates/client_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72524886559a0983203e398-55428125%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1395df37be25dd3faf8518eedca0830344345de' => 
    array (
      0 => '/home/alltic/public_html/televida/tv_time/WEB-INF/templates/client_delete.tpl',
      1 => 1503498080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72524886559a0983203e398-55428125',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/alltic/public_html/televida/tv_time/WEB-INF/lib/smarty/plugins/modifier.escape.php';
?><?php echo $_smarty_tpl->getVariable('forms')->value['clientDeleteForm']['open'];?>

<table cellspacing="4" cellpadding="7" border="0">
  <tr>
    <td>
      <table cellspacing="0" cellpadding="2" border="0">
        <tr>
          <td><?php echo $_smarty_tpl->getVariable('i18n')->value['form']['client']['client_to_delete'];?>
:</td>
          <th><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('client_to_delete')->value,'html');?>
</th>
        </tr>
        <tr>
          <td><?php echo $_smarty_tpl->getVariable('i18n')->value['form']['client']['client_entries'];?>
:</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['clientDeleteForm']['delete_client_entries']['control'];?>
</td>
        </tr>
        <tr>
          <td colspan="2" align="center">&nbsp;</td>
        </tr>
        <tr>
          <td align="right"><?php echo $_smarty_tpl->getVariable('forms')->value['clientDeleteForm']['btn_delete']['control'];?>
&nbsp;</td>
          <td align="left">&nbsp;<?php echo $_smarty_tpl->getVariable('forms')->value['clientDeleteForm']['btn_cancel']['control'];?>
</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getVariable('forms')->value['clientDeleteForm']['close'];?>
