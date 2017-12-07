<?php /* Smarty version Smarty-3.0.7, created on 2017-11-23 11:23:52
         compiled from "/var/www/html/tv_time/WEB-INF/templates/export.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18880409715a16afc83c3a73-97154333%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39ab614b94def2a371cc809954e429b10cd87dd9' => 
    array (
      0 => '/var/www/html/tv_time/WEB-INF/templates/export.tpl',
      1 => 1508950116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18880409715a16afc83c3a73-97154333',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php echo $_smarty_tpl->getVariable('forms')->value['exportForm']['open'];?>

<table cellspacing="0" cellpadding="7" border="0" width="720">
  <tr>
    <td align="center">
<?php if ($_smarty_tpl->getVariable('user')->value->isManager()){?>
      <table border="0" width="60%">
        <colgroup>
          <col width="50%">
          <col width="50%">
        </colgroup>
        <tr><td colspan="2"><?php echo $_smarty_tpl->getVariable('i18n')->value['form']['export']['hint'];?>
<br></td></tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
          <td align='right'><?php echo $_smarty_tpl->getVariable('i18n')->value['form']['export']['compression'];?>
:</td>
          <td><?php echo $_smarty_tpl->getVariable('forms')->value['exportForm']['compression']['control'];?>
</td>
        </tr>
        <tr><td height="50" align="center" colspan="2"><?php echo $_smarty_tpl->getVariable('forms')->value['exportForm']['btn_submit']['control'];?>
</td></tr>
      </table>
<?php }?>
    </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getVariable('forms')->value['exportForm']['close'];?>
