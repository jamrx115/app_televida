<?php /* Smarty version Smarty-3.0.7, created on 2016-10-05 19:51:54
         compiled from "/home/alltic/public_html/timetracker/WEB-INF/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70713838657f559da689df6-02195490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ed584a07424d3fc3e70c1dbc3f0a36fc41bee91' => 
    array (
      0 => '/home/alltic/public_html/timetracker/WEB-INF/templates/header.tpl',
      1 => 1475695914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70713838657f559da689df6-02195490',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/alltic/public_html/timetracker/WEB-INF/lib/smarty/plugins/modifier.escape.php';
?><html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=<?php echo @CHARSET;?>
">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link href="<?php echo @DEFAULT_CSS;?>
" rel="stylesheet" type="text/css">
<?php if ($_smarty_tpl->getVariable('i18n')->value['language']['rtl']){?>
  <link href="<?php echo @RTL_CSS;?>
" rel="stylesheet" type="text/css">
<?php }?>
  <title>Time Tracker<?php if ($_smarty_tpl->getVariable('title')->value){?> - <?php echo $_smarty_tpl->getVariable('title')->value;?>
<?php }?></title>
  <script src="js/strftime.js"></script>
  <script>
    <?php echo $_smarty_tpl->getVariable('js_date_locale')->value;?>

  </script>
  <script src="js/strptime.js"></script>
</head>

<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0" <?php echo $_smarty_tpl->getVariable('onload')->value;?>
>

<?php $_smarty_tpl->tpl_vars["tab_width"] = new Smarty_variable("700", null, null);?>

<!--  101% height here is a workaround for Firefox shifting content horizontally when scrollbar appears / disappears.
See https://bugzilla.mozilla.org/show_bug.cgi?id=279425.
With 101% height we essentially force the scrollbar to always appear. -->
<table height="101%" cellspacing="0" cellpadding="0" width="100%" border="0">
  <tr>
    <td valign="top" align="center"> <!-- This is to centrally align all our content. -->

      <!-- top image -->
      <table cellspacing="0" cellpadding="0" width="100%" border="0">
        <tr>
<?php if ($_smarty_tpl->getVariable('user')->value->custom_logo){?>
          <td align="center">
<?php }else{ ?>
          <td bgcolor="#a6ccf7" background="images/top_bg.gif" align="center">
<?php }?>
            <table cellspacing="0" cellpadding="0" width="<?php echo $_smarty_tpl->getVariable('tab_width')->value;?>
" border="0">
              <tr>
                <td valign="top">
                  <table cellspacing="0" cellpadding="0" width="100%" border="0">
                    <tr><td height="6" colspan="2"><img width="1" height="6" src="images/1x1.gif" border="0"></td></tr>
                    <tr valign="top">
<?php if ($_smarty_tpl->getVariable('user')->value->custom_logo){?>
                      <td height="55" align="center"><img alt="Time Tracker" width="300" height="43" src="<?php echo $_smarty_tpl->getVariable('custom_logo')->value;?>
" border="0"></a></td>
<?php }else{ ?>
                      <td height="55" align="center"><a href="https://www.anuko.com/lp/tt_1.htm" target="_blank"><img alt="Anuko Time Tracker" width="300" height="43" src="images/tt_logo.png" border="0"></a></td>
<?php }?>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <!-- end of top image -->

<?php if ($_smarty_tpl->getVariable('authenticated')->value){?>
  <?php if ($_smarty_tpl->getVariable('user')->value->isAdmin()){?>
      <!-- top menu for admin -->
      <table cellspacing="0" cellpadding="3" width="100%" border="0">
        <tr>
          <td class="systemMenu" height="17" align="center">&nbsp;
            <a class="systemMenu" href="logout.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['logout'];?>
</a> &middot;
            <a class="systemMenu" href="<?php echo @FORUM_LINK;?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['forum'];?>
</a> &middot;
            <a class="systemMenu" href="<?php echo @HELP_LINK;?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['help'];?>
</a>
          </td>
        </tr>
      </table>
      <!-- end of top menu for admin -->

      <!-- sub menu for admin -->
      <table cellspacing="0" cellpadding="3" width="100%" border="0">
        <tr>
          <td align="center" bgcolor="#d9d9d9" nowrap height="17" background="images/subm_bg.gif">&nbsp;
            <a class="mainMenu" href="admin_teams.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['teams'];?>
</a> &middot;
            <a class="mainMenu" href="admin_options.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['options'];?>
</a>
          </td>
        </tr>
      </table>
      <!-- end of sub menu for admin -->
  <?php }else{ ?>
      <!-- top menu for authorized user -->
      <table cellspacing="0" cellpadding="3" width="100%" border="0">
        <tr>
          <td class="systemMenu" height="17" align="center">&nbsp;
            <a class="systemMenu" href="logout.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['logout'];?>
</a> &middot;
            <a class="systemMenu" href="profile_edit.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['profile'];?>
</a> &middot;
            <a class="systemMenu" href="<?php echo @FORUM_LINK;?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['forum'];?>
</a> &middot;
            <a class="systemMenu" href="<?php echo @HELP_LINK;?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['help'];?>
</a>
          </td>
        </tr>
      </table>
      <!-- end of top menu for authorized user -->

      <!-- sub menu for authorized user -->
      <table cellspacing="0" cellpadding="3" width="100%" border="0">
        <tr>
          <td align="center" bgcolor="#d9d9d9" nowrap height="17" background="images/subm_bg.gif">&nbsp;
    <?php if (!$_smarty_tpl->getVariable('user')->value->isClient()){?>
           <a class="mainMenu" href="time.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['time'];?>
</a>
    <?php }?>
    <?php if ($_smarty_tpl->getVariable('user')->value->isPluginEnabled('ex')&&!$_smarty_tpl->getVariable('user')->value->isClient()){?>
            &middot; <a class="mainMenu" href="expenses.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['expenses'];?>
</a>
    <?php }?>
            <?php if (!$_smarty_tpl->getVariable('user')->value->isClient()){?>&middot; <?php }?><a class="mainMenu" href="reports.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['reports'];?>
</a>
    <?php if (($_smarty_tpl->getVariable('user')->value->canManageTeam()||$_smarty_tpl->getVariable('user')->value->isClient())&&$_smarty_tpl->getVariable('user')->value->isPluginEnabled('iv')){?>
            &middot; <a class="mainMenu" href="invoices.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['title']['invoices'];?>
</a>
    <?php }?>
    <?php if (($_smarty_tpl->getVariable('user')->value->isPluginEnabled('ch')&&!$_smarty_tpl->getVariable('user')->value->isClient())&&(@MODE_PROJECTS==$_smarty_tpl->getVariable('user')->value->tracking_mode||@MODE_PROJECTS_AND_TASKS==$_smarty_tpl->getVariable('user')->value->tracking_mode||$_smarty_tpl->getVariable('user')->value->isPluginEnabled('cl'))){?>
            &middot; <a class="mainMenu" href="charts.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['charts'];?>
</a>
    <?php }?>
    <?php if (!$_smarty_tpl->getVariable('user')->value->isClient()&&(@MODE_PROJECTS==$_smarty_tpl->getVariable('user')->value->tracking_mode||@MODE_PROJECTS_AND_TASKS==$_smarty_tpl->getVariable('user')->value->tracking_mode)){?>
            &middot; <a class="mainMenu" href="projects.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['projects'];?>
</a>
    <?php }?>
    <?php if ($_smarty_tpl->getVariable('user')->value->canManageTeam()&&(@MODE_PROJECTS_AND_TASKS==$_smarty_tpl->getVariable('user')->value->tracking_mode)){?>
            &middot; <a class="mainMenu" href="tasks.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['tasks'];?>
</a>
    <?php }?>
    <?php if (!$_smarty_tpl->getVariable('user')->value->isClient()){?>
            &middot; <a class="mainMenu" href="users.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['users'];?>
</a>
    <?php }?>
    <?php if ($_smarty_tpl->getVariable('user')->value->canManageTeam()&&$_smarty_tpl->getVariable('user')->value->isPluginEnabled('cl')){?>
            &middot; <a class="mainMenu" href="clients.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['clients'];?>
</a>
    <?php }?>
    <?php if ($_smarty_tpl->getVariable('user')->value->isManager()){?>
            &middot; <a class="mainMenu" href="export.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['export'];?>
</a>
    <?php }?>
          </td>
        </tr>
      </table>
      <!-- end of sub menu for authorized user -->
  <?php }?>
<?php }else{ ?>
      <!-- top menu for non authorized user -->
      <table cellspacing="0" cellpadding="3" width="100%" border="0">
        <tr>
          <td class="systemMenu" height="17" align="center">&nbsp;
            <a class="systemMenu" href="login.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['login'];?>
</a> &middot;
  <?php if (isTrue(@MULTITEAM_MODE)&&@AUTH_MODULE=='db'){?>
            <a class="systemMenu" href="register.php"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['create_team'];?>
</a> &middot;
  <?php }?>
            <a class="systemMenu" href="<?php echo @FORUM_LINK;?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['forum'];?>
</a> &middot;
            <a class="systemMenu" href="<?php echo @HELP_LINK;?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('i18n')->value['menu']['help'];?>
</a>
          </td>
        </tr>
      </table>
<?php }?>
      <br>

      <!-- page title and user details -->
<?php if ($_smarty_tpl->getVariable('title')->value){?>
      <table cellspacing="0" cellpadding="5" width="<?php echo $_smarty_tpl->getVariable('tab_width')->value+20;?>
" border="0">
        <tr><td class="sectionHeader"><div class="pageTitle"><?php echo $_smarty_tpl->getVariable('title')->value;?>
<?php if ($_smarty_tpl->getVariable('timestring')->value){?>: <?php echo $_smarty_tpl->getVariable('timestring')->value;?>
<?php }?></div></td></tr>
        <tr><td><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('user')->value->name,'html');?>
<?php if ($_smarty_tpl->getVariable('user')->value->isAdmin()){?> <?php echo $_smarty_tpl->getVariable('i18n')->value['label']['role_admin'];?>
<?php }elseif($_smarty_tpl->getVariable('user')->value->isManager()){?> <?php echo $_smarty_tpl->getVariable('i18n')->value['label']['role_manager'];?>
<?php }elseif($_smarty_tpl->getVariable('user')->value->canManageTeam()){?> <?php echo $_smarty_tpl->getVariable('i18n')->value['label']['role_comanager'];?>
<?php }?><?php if ($_smarty_tpl->getVariable('user')->value->behalf_id>0){?> <b><?php echo $_smarty_tpl->getVariable('i18n')->value['label']['on_behalf'];?>
 <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('user')->value->behalf_name,'html');?>
</b><?php }?><?php if ($_smarty_tpl->getVariable('user')->value->team){?>, <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('user')->value->team,'html');?>
<?php }?></td></tr>
      </table>
<?php }?>
      <!-- end of page title and user details -->

      <!-- output errors -->
<?php if ($_smarty_tpl->getVariable('err')->value->yes()){?>
      <table cellspacing="4" cellpadding="7" width="<?php echo $_smarty_tpl->getVariable('tab_width')->value;?>
" border="0">
        <tr>
          <td class="error">
  <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('err')->value->getErrors(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
?>
            <?php echo $_smarty_tpl->tpl_vars['error']->value['message'];?>
<br> 
  <?php }} ?>
          </td>
        </tr>
      </table>
<?php }?>
      <!-- end of output errors -->

      <!-- output messages -->
<?php if ($_smarty_tpl->getVariable('msg')->value->yes()){?>
      <table cellspacing="4" cellpadding="7" width="<?php echo $_smarty_tpl->getVariable('tab_width')->value;?>
" border="0">
        <tr>
          <td class="info_message">
  <?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('msg')->value->getErrors(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value){
?>
            <?php echo $_smarty_tpl->tpl_vars['message']->value['message'];?>
<br> 
  <?php }} ?>
          </td>
        </tr>
      </table>
<?php }?>
      <!-- end of output messages -->
