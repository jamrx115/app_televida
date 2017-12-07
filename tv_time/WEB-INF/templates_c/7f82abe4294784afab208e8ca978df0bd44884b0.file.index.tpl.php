<?php /* Smarty version Smarty-3.0.7, created on 2017-08-23 14:28:28
         compiled from "/home/alltic/public_html/televida/tv_time/WEB-INF/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1581492935599d910cbeb343-02188195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f82abe4294784afab208e8ca978df0bd44884b0' => 
    array (
      0 => '/home/alltic/public_html/televida/tv_time/WEB-INF/templates/index.tpl',
      1 => 1503498080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1581492935599d910cbeb343-02188195',
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