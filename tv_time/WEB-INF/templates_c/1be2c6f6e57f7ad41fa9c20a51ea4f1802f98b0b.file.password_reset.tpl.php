<?php /* Smarty version Smarty-3.0.7, created on 2017-11-08 10:34:14
         compiled from "/var/www/html/tv_time/WEB-INF/templates/password_reset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17281449705a02dda61cd106-63726887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1be2c6f6e57f7ad41fa9c20a51ea4f1802f98b0b' => 
    array (
      0 => '/var/www/html/tv_time/WEB-INF/templates/password_reset.tpl',
      1 => 1508950116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17281449705a02dda61cd106-63726887',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php echo $_smarty_tpl->getVariable('forms')->value['resetPasswordForm']['open'];?>

<table cellspacing="4" cellpadding="7" border="0">
  <tr>
    <td>
<?php if ($_smarty_tpl->getVariable('result_message')->value){?>
      <table cellspacing="4" cellpadding="7" border="0" width="100%">
        <tr><td align="center"><font color="red"><b><?php echo $_smarty_tpl->getVariable('result_message')->value;?>
</b></font></td></tr>
      </table>
<?php }else{ ?>
      <table>
        <tr>
          <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['login'];?>
:</td>
          <td colspan="3"><?php echo $_smarty_tpl->getVariable('forms')->value['resetPasswordForm']['login']['control'];?>
</td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3" align="center"><?php echo $_smarty_tpl->getVariable('forms')->value['resetPasswordForm']['btn_submit']['control'];?>
</td>
        </tr>
      </table>
<?php }?>
    </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getVariable('forms')->value['resetPasswordForm']['close'];?>
