<?php /* Smarty version Smarty-3.0.7, created on 2016-10-05 20:59:09
         compiled from "/home/alltic/public_html/timetracker/WEB-INF/templates/datetime_format_preview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67196533557f5699da8f393-01604782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bfb18379aaae9936a540962dc5b73bcf37531fd' => 
    array (
      0 => '/home/alltic/public_html/timetracker/WEB-INF/templates/datetime_format_preview.tpl',
      1 => 1475695911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67196533557f5699da8f393-01604782',
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
