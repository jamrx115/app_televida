<?php /* Smarty version Smarty-3.0.7, created on 2017-10-26 12:06:21
         compiled from "/var/www/html/tv_time/WEB-INF/templates/datetime_format_preview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135561094059f1cfbd0cee29-15697045%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a91d230b9ab055d4a6a4dc4645dd76f6da65205' => 
    array (
      0 => '/var/www/html/tv_time/WEB-INF/templates/datetime_format_preview.tpl',
      1 => 1508950116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135561094059f1cfbd0cee29-15697045',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
function MakeFormatPreview(id, selectElement)
{
  var dst = document.getElementById(id);
  if (dst) {
    var date = new Date();
    date.locale = "<?php echo $_smarty_tpl->getVariable('user')->value->lang;?>
";
    var format;
    if (selectElement.value != "") {
      format = selectElement.value;
    } else {
      format = selectElement.options[0].text;
    }
    dst.innerHTML = "<i>" + date.strftime(format) + "</i>";
  }
}
</script>
