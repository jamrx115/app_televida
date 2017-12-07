<?php /* Smarty version Smarty-3.0.7, created on 2016-10-24 14:34:21
         compiled from "/home/alltic/public_html/timetracker/WEB-INF/templates/cf_dropdown_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:830030241580e1bed6f7a51-70678058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7757462010640fdbcbb4b5daa3d9b571d5f2cd9b' => 
    array (
      0 => '/home/alltic/public_html/timetracker/WEB-INF/templates/cf_dropdown_options.tpl',
      1 => 1475695908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '830030241580e1bed6f7a51-70678058',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include '/home/alltic/public_html/timetracker/WEB-INF/lib/smarty/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_escape')) include '/home/alltic/public_html/timetracker/WEB-INF/lib/smarty/plugins/modifier.escape.php';
?><script>
  function chLocation(newLocation) { document.location = newLocation; }
</script>

<?php echo $_smarty_tpl->getVariable('forms')->value['dropdownOptionsForm']['open'];?>

<table cellspacing="0" cellpadding="7" border="0" width="720">
  <tr>
    <td valign="top">
<?php if ($_smarty_tpl->getVariable('user')->value->canManageTeam()){?>
      <table cellspacing="1" cellpadding="3" border="0" width="100%">
        <tr>
          <td width="70%" class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['thing_name'];?>
</td>
          <td class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['edit'];?>
</td>
          <td class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['delete'];?>
</td>
        </tr>
  <?php if ($_smarty_tpl->getVariable('options')->value){?>
    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('options')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
        <tr bgcolor="<?php echo smarty_function_cycle(array('values'=>"#f5f5f5,#dedee5"),$_smarty_tpl);?>
">
          <td><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['val']->value,'html');?>
</td>
          <td><a href="cf_dropdown_option_edit.php?id=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['edit'];?>
</a></td>
          <td><a href="cf_dropdown_option_delete.php?id=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['delete'];?>
</a></td>
        </tr>
    <?php }} ?>
  <?php }?>
      </table>

      <table width="100%">
        <tr>
          <td align="center">
            <br>
            <form>
              <input type="button" onclick="chLocation('cf_dropdown_option_add.php?field_id=<?php echo $_smarty_tpl->getVariable('field_id')->value;?>
');" value="<?php echo $_smarty_tpl->getVariable('i18n')->value['button']['add_option'];?>
">
            </form>
          </td>
        </tr>
      </table>
<?php }?>
    </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getVariable('forms')->value['dropdownOptionsForm']['close'];?>
