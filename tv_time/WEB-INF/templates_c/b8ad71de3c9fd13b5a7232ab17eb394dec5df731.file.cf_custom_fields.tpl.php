<?php /* Smarty version Smarty-3.0.7, created on 2016-10-21 22:52:05
         compiled from "/home/alltic/public_html/timetracker/WEB-INF/templates/cf_custom_fields.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2078724827580a9c15db3b56-38703527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8ad71de3c9fd13b5a7232ab17eb394dec5df731' => 
    array (
      0 => '/home/alltic/public_html/timetracker/WEB-INF/templates/cf_custom_fields.tpl',
      1 => 1475695907,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2078724827580a9c15db3b56-38703527',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include '/home/alltic/public_html/timetracker/WEB-INF/lib/smarty/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_escape')) include '/home/alltic/public_html/timetracker/WEB-INF/lib/smarty/plugins/modifier.escape.php';
?><?php echo $_smarty_tpl->getVariable('forms')->value['customFieldsForm']['open'];?>

<table cellspacing="0" cellpadding="7" border="0" width="720">
  <tr>
    <td valign="top">
<?php if ($_smarty_tpl->getVariable('user')->value->canManageTeam()){?>
      <table cellspacing="1" cellpadding="3" border="0" width="100%">
        <tr>
          <td width="50%" class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['thing_name'];?>
</td>
          <td class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['type'];?>
</td>
          <td class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['options'];?>
</td>
          <td class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['edit'];?>
</td>
          <td class="tableHeader"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['delete'];?>
</td>
        </tr>
  <?php if ($_smarty_tpl->getVariable('custom_fields')->value){?>
    <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('custom_fields')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value){
?>
        <tr bgcolor="<?php echo smarty_function_cycle(array('values'=>"#f5f5f5,#dedee5"),$_smarty_tpl);?>
">
          <td><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['field']->value['label'],'html');?>
</td>
      <?php if (CustomFields::TYPE_TEXT==$_smarty_tpl->tpl_vars['field']->value['type']){?>
          <td><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['type_text'];?>
</td>
          <td></td>
      <?php }elseif(CustomFields::TYPE_DROPDOWN==$_smarty_tpl->tpl_vars['field']->value['type']){?>
          <td><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['type_dropdown'];?>
</td>
          <td><a href="cf_dropdown_options.php?field_id=<?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['configure'];?>
</a></td>
      <?php }?>
          <td><a href="cf_custom_field_edit.php?id=<?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['edit'];?>
</a></td>
          <td><a href="cf_custom_field_delete.php?id=<?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['delete'];?>
</a></td>
        </tr>
    <?php }} ?>
  <?php }?>
      </table>

      <table width="100%">
        <tr><td align="center"><br><?php echo $_smarty_tpl->getVariable('forms')->value['customFieldsForm']['btn_add']['control'];?>
</td></tr>
      </table>
<?php }?>
    </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getVariable('forms')->value['customFieldsForm']['close'];?>
