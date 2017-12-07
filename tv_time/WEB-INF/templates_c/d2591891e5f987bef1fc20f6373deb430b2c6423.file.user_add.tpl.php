<?php /* Smarty version Smarty-3.0.7, created on 2017-08-25 17:11:00
         compiled from "/home/alltic/public_html/televida/tv_time/WEB-INF/templates/user_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77271673559a05a24d45b44-51170033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2591891e5f987bef1fc20f6373deb430b2c6423' => 
    array (
      0 => '/home/alltic/public_html/televida/tv_time/WEB-INF/templates/user_add.tpl',
      1 => 1503498080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77271673559a05a24d45b44-51170033',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
// The setDefaultRate function sets / unsets default rate for a project
// when a corresponding checkbox is ticked.
function setDefaultRate(element) {
  var default_rate = document.userForm.rate.value;
  if (default_rate == '') {
    // No default rate, nothing to do!
    return;
  }
  // Iterate through elements of the form to find and set the project rate. 
  for (var i = 0; i < userForm.elements.length; i++) {
    if ((userForm.elements[i].type == 'text') && (userForm.elements[i].name == ('rate_'+element.value))) {
      if (element.checked) {
        userForm.elements[i].value = default_rate;
      } else {
        userForm.elements[i].value = '';
      }
      break; // Element is found and set, nothing more to do, break out of the loop.
    }
  }
}

// handleClientControl - controls visibility of the client dropdown depending on the selected user role.
// We need to show it only when the "Client" user role is selected.
function handleClientControl() {
  var clientControl = document.getElementById("client");
  if ("16" == document.getElementById("role").value)
    clientControl.style.visibility = "visible";
  else
    clientControl.style.visibility = "hidden";
}
</script>

<?php echo $_smarty_tpl->getVariable('forms')->value['userForm']['open'];?>

<table cellspacing="4" cellpadding="7" border="0">
  <table cellspacing="1" cellpadding="2" border="0">
    <tr>
      <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['person_name'];?>
 (*):</td>
      <td><?php echo $_smarty_tpl->getVariable('forms')->value['userForm']['name']['control'];?>
</td>
    </tr>
    <tr>
      <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['login'];?>
 (*):</td>
      <td><?php echo $_smarty_tpl->getVariable('forms')->value['userForm']['login']['control'];?>
</td>
    </tr>
<?php if (!$_smarty_tpl->getVariable('auth_external')->value){?>
    <tr>
      <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['password'];?>
 (*):</td>
      <td><?php echo $_smarty_tpl->getVariable('forms')->value['userForm']['pas1']['control'];?>
</td>
    </tr>
    <tr>
      <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['confirm_password'];?>
 (*):</td>
      <td><?php echo $_smarty_tpl->getVariable('forms')->value['userForm']['pas2']['control'];?>
</td>
    </tr>
<?php }?>
    <tr>
      <td align="right" nowrap><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['email'];?>
:</td>
      <td><?php echo $_smarty_tpl->getVariable('forms')->value['userForm']['email']['control'];?>
</td>
    </tr>
<?php if ($_smarty_tpl->getVariable('user')->value->isManager()){?>
    <tr>
      <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['form']['users']['role'];?>
:</td>
      <td><?php echo $_smarty_tpl->getVariable('forms')->value['userForm']['role']['control'];?>
 <?php echo $_smarty_tpl->getVariable('forms')->value['userForm']['client']['control'];?>
</td>
    </tr>
<?php }?>
    <tr>
      <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['form']['users']['default_rate'];?>
&nbsp;(0<?php echo $_smarty_tpl->getVariable('user')->value->decimal_mark;?>
00):</td>
      <td><?php echo $_smarty_tpl->getVariable('forms')->value['userForm']['rate']['control'];?>
</td>
    </tr>
<?php if ((@MODE_PROJECTS==$_smarty_tpl->getVariable('user')->value->tracking_mode||@MODE_PROJECTS_AND_TASKS==$_smarty_tpl->getVariable('user')->value->tracking_mode)){?>
    <tr valign="top">
      <td align="right"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['projects'];?>
:</td>
      <td><?php echo $_smarty_tpl->getVariable('forms')->value['userForm']['projects']['control'];?>
</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['required_fields'];?>
</td>
    </tr>
<?php }?>
    <tr>
      <td colspan="2" align="center" height="50"><?php echo $_smarty_tpl->getVariable('forms')->value['userForm']['btn_submit']['control'];?>
</td>
    </tr>
  </table>
</table>
<?php echo $_smarty_tpl->getVariable('forms')->value['userForm']['close'];?>

