<?php /* Smarty version Smarty-3.0.7, created on 2016-10-05 19:52:06
         compiled from "/home/alltic/public_html/timetracker/WEB-INF/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26039201057f559e61792d0-28800474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbf17f41327aba4d53e4dbc9a23fbaabda6cef0e' => 
    array (
      0 => '/home/alltic/public_html/timetracker/WEB-INF/templates/login.tpl',
      1 => 1475695918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26039201057f559e61792d0-28800474',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
<!--
function get_date() {
  var date = new Date();
  return date.strftime("%Y-%m-%d");
}
//-->
</script>
<table cellspacing="4" cellpadding="7" border="0">
  <tr>
    <td>
      <?php echo $_smarty_tpl->getVariable('forms')->value['loginForm']['open'];?>

      <?php $_template = new Smarty_Internal_Template("login.".(@AUTH_MODULE).".tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
      <?php echo $_smarty_tpl->getVariable('forms')->value['loginForm']['close'];?>

    </td>
  </tr>
</table>

<?php if (!empty($_smarty_tpl->getVariable('about_text',null,true,false)->value)){?>
  <div id="LoginAboutText"> <?php echo $_smarty_tpl->getVariable('about_text')->value;?>
 </div>
<?php }?>