<?php /* Smarty version Smarty-3.0.7, created on 2017-08-23 12:41:51
         compiled from "/home/alltic/public_html/tv_time/WEB-INF/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1888245106599d780f811d31-94373205%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1fcc6b0c493666908d2d073fe679fc098f11a535' => 
    array (
      0 => '/home/alltic/public_html/tv_time/WEB-INF/templates/index.tpl',
      1 => 1503492084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1888245106599d780f811d31-94373205',
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