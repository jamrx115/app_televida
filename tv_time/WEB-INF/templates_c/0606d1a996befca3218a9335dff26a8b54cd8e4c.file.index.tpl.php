<?php /* Smarty version Smarty-3.0.7, created on 2016-10-05 19:51:54
         compiled from "/home/alltic/public_html/timetracker/WEB-INF/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34153365257f559da64df19-34391636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0606d1a996befca3218a9335dff26a8b54cd8e4c' => 
    array (
      0 => '/home/alltic/public_html/timetracker/WEB-INF/templates/index.tpl',
      1 => 1475695915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34153365257f559da64df19-34391636',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php if ($_smarty_tpl->getVariable('content_page_name')->value){?><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('content_page_name')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?><?php }?>

<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>