<?php /* Smarty version Smarty-3.0.7, created on 2017-08-25 15:33:41
         compiled from "/home/alltic/public_html/televida/tv_time/WEB-INF/templates/clients.tpl" */ ?>
<?php /*%%SmartyHeaderCode:167681978259a043550dadd0-56281875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a70a1768e033841ae6d71e680b94962d5cdef5f1' => 
    array (
      0 => '/home/alltic/public_html/televida/tv_time/WEB-INF/templates/clients.tpl',
      1 => 1503498080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167681978259a043550dadd0-56281875',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include '/home/alltic/public_html/televida/tv_time/WEB-INF/lib/smarty/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_escape')) include '/home/alltic/public_html/televida/tv_time/WEB-INF/lib/smarty/plugins/modifier.escape.php';
?><script>
  function chLocation(newLocation) { document.location = newLocation; }
</script>

<table cellspacing="0" cellpadding="7" border="0" width="720">
  <tr>
    <td valign="top">
<?php if (($_smarty_tpl->getVariable('user')->value->canManageTeam())){?>
      <table cellspacing="1" cellpadding="3" border="0" width="100%">
  <?php if ($_smarty_tpl->getVariable('inactive_clients')->value){?>
        <tr><td class="sectionHeaderNoBorder"><?php echo $_smarty_tpl->getVariable('i18n')->value['form']['clients']['active_clients'];?>
</td></tr>
  <?php }?>
        <tr>
          <td width="40%" class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['person_name'];?>
</td>
          <td width="40%" class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['address'];?>
</td>
          <td class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['edit'];?>
</td>
          <td class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['delete'];?>
</td>
        </tr>
  <?php  $_smarty_tpl->tpl_vars['client'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('active_clients')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['client']->key => $_smarty_tpl->tpl_vars['client']->value){
?>
        <tr valign="top" bgcolor="<?php echo smarty_function_cycle(array('values'=>"#f5f5f5,#dedee5"),$_smarty_tpl);?>
">
          <td><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['client']->value['name'],'html');?>
</td>
          <td><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['client']->value['address'],'html');?>
</td>
          <td><a href="client_edit.php?id=<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['edit'];?>
</a></td>
          <td><a href="client_delete.php?id=<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['delete'];?>
</a></td>
        </tr>
  <?php }} ?>
      </table>

      <table width="100%">
        <tr><td align="center"><br><form><input type="button" onclick="chLocation('client_add.php');" value="<?php echo $_smarty_tpl->getVariable('i18n')->value['button']['add_client'];?>
"></form></td></tr>
      </table>

  <?php if ($_smarty_tpl->getVariable('inactive_clients')->value){?>
      <table cellspacing="1" cellpadding="3" border="0" width="100%">
        <tr><td class="sectionHeaderNoBorder"><?php echo $_smarty_tpl->getVariable('i18n')->value['form']['clients']['inactive_clients'];?>
</td></tr>
        <tr>
          <td width="40%" class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['person_name'];?>
</td>
          <td width="40%" class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['address'];?>
</td>
          <td class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['edit'];?>
</td>
          <td class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['delete'];?>
</td>
        </tr>
    <?php  $_smarty_tpl->tpl_vars['client'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inactive_clients')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['client']->key => $_smarty_tpl->tpl_vars['client']->value){
?>
        <tr valign="top" bgcolor="<?php echo smarty_function_cycle(array('values'=>"#f5f5f5,#dedee5"),$_smarty_tpl);?>
">
          <td><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['client']->value['name'],'html');?>
</td>
          <td><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['client']->value['address'],'html');?>
</td>
          <td><a href="client_edit.php?id=<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['edit'];?>
</a></td>
          <td><a href="client_delete.php?id=<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['delete'];?>
</a></td>
        </tr>
    <?php }} ?>
      </table>

      <table width="100%">
        <tr><td align="center"><br><form><input type="button" onclick="chLocation('client_add.php');" value="<?php echo $_smarty_tpl->getVariable('i18n')->value['button']['add_client'];?>
"></form></td></tr>
      </table>
  <?php }?>
<?php }?>
    </td>
  </tr>
</table>
