<?php /* Smarty version Smarty-3.0.7, created on 2017-09-04 13:20:32
         compiled from "/home/alltic/public_html/televida/tv_time/WEB-INF/templates/time_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110988334659ad5320b0a710-86747760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d7b4d8d9fe77f7dfdf755dea923c2f99d28ee68' => 
    array (
      0 => '/home/alltic/public_html/televida/tv_time/WEB-INF/templates/time_delete.tpl',
      1 => 1503498080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110988334659ad5320b0a710-86747760',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/alltic/public_html/televida/tv_time/WEB-INF/lib/smarty/plugins/modifier.escape.php';
?><?php echo $_smarty_tpl->getVariable('forms')->value['timeRecordForm']['open'];?>

<table cellspacing="4" cellpadding="7" border="0" width="720">
<tr>
  <td>
  <table border='0' cellpadding='3' cellspacing='1' width="100%">
  <tr>
<?php if ((@MODE_PROJECTS==$_smarty_tpl->getVariable('user')->value->tracking_mode||@MODE_PROJECTS_AND_TASKS==$_smarty_tpl->getVariable('user')->value->tracking_mode)){?>
    <td class="tableHeader" align="center"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['project'];?>
</td>
<?php }?>
<?php if ((@MODE_PROJECTS_AND_TASKS==$_smarty_tpl->getVariable('user')->value->tracking_mode)){?>
    <td class="tableHeader" align="center"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['task'];?>
</td>
<?php }?>
<?php if (((@TYPE_START_FINISH==$_smarty_tpl->getVariable('user')->value->record_type)||(@TYPE_ALL==$_smarty_tpl->getVariable('user')->value->record_type))){?>
    <td class="tableHeader" align="center"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['start'];?>
</td>
    <td class="tableHeader" align="center"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['finish'];?>
</td>
<?php }?>
<?php if (((@TYPE_DURATION==$_smarty_tpl->getVariable('user')->value->record_type)||(@TYPE_ALL==$_smarty_tpl->getVariable('user')->value->record_type))){?>
    <td class="tableHeader" align="center"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['duration'];?>
</td>
<?php }?>
    <td class="tableHeader" align="center"><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['note'];?>
</td>
  </tr>
  <tr bgcolor="#f5f5f5">
<?php if ((@MODE_PROJECTS==$_smarty_tpl->getVariable('user')->value->tracking_mode||@MODE_PROJECTS_AND_TASKS==$_smarty_tpl->getVariable('user')->value->tracking_mode)){?>
    <td><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('time_rec')->value['project_name'],'html');?>
</td>
<?php }?>
<?php if ((@MODE_PROJECTS_AND_TASKS==$_smarty_tpl->getVariable('user')->value->tracking_mode)){?>
    <td><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('time_rec')->value['task_name'],'html');?>
</td>
<?php }?>
<?php if (((@TYPE_START_FINISH==$_smarty_tpl->getVariable('user')->value->record_type)||(@TYPE_ALL==$_smarty_tpl->getVariable('user')->value->record_type))){?>
    <td align="right"><?php if ($_smarty_tpl->getVariable('time_rec')->value['start']){?><?php echo $_smarty_tpl->getVariable('time_rec')->value['start'];?>
<?php }else{ ?>&nbsp;<?php }?></td>
    <td align="right"><?php if ($_smarty_tpl->getVariable('time_rec')->value['finish']!=$_smarty_tpl->getVariable('time_rec')->value['start']){?><?php echo $_smarty_tpl->getVariable('time_rec')->value['finish'];?>
<?php }else{ ?>&nbsp;<?php }?></td>
<?php }?>
<?php if (((@TYPE_DURATION==$_smarty_tpl->getVariable('user')->value->record_type)||(@TYPE_ALL==$_smarty_tpl->getVariable('user')->value->record_type))){?>
    <td align="right"><?php if (($_smarty_tpl->getVariable('time_rec')->value['duration']=='0:00'&&$_smarty_tpl->getVariable('time_rec')->value['start']!='')){?><font color="#ff0000"><?php echo $_smarty_tpl->getVariable('i18n')->value['form']['time']['uncompleted'];?>
</font><?php }else{ ?><?php echo $_smarty_tpl->getVariable('time_rec')->value['duration'];?>
<?php }?></td>
<?php }?>
    <td><?php if ($_smarty_tpl->getVariable('time_rec')->value['comment']){?><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('time_rec')->value['comment'],'html');?>
<?php }else{ ?>&nbsp;<?php }?></td>
  </tr>
  </table>
  <table width="100%">
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><?php echo $_smarty_tpl->getVariable('forms')->value['timeRecordForm']['delete_button']['control'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('forms')->value['timeRecordForm']['cancel_button']['control'];?>
</td>
  </tr>
  </table>
  </td>
</tr>
</table>
<?php echo $_smarty_tpl->getVariable('forms')->value['timeRecordForm']['close'];?>

