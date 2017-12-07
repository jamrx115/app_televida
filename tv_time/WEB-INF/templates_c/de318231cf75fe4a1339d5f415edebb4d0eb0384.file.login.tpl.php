<?php /* Smarty version Smarty-3.0.7, created on 2017-08-23 12:41:51
         compiled from "/home/alltic/public_html/tv_time/WEB-INF/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2098875566599d780fa36175-44184667%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de318231cf75fe4a1339d5f415edebb4d0eb0384' => 
    array (
      0 => '/home/alltic/public_html/tv_time/WEB-INF/templates/login.tpl',
      1 => 1503492084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2098875566599d780fa36175-44184667',
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