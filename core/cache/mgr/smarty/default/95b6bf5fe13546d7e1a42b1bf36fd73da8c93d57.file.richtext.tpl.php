<?php /* Smarty version Smarty-3.0.4, created on 2016-01-08 17:51:06
         compiled from "D:/web/OpenServer/domains/shri-lanka.loc/manager/templates/default/element/tv/renders/input/richtext.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22264568fccda436b15-61282569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95b6bf5fe13546d7e1a42b1bf36fd73da8c93d57' => 
    array (
      0 => 'D:/web/OpenServer/domains/shri-lanka.loc/manager/templates/default/element/tv/renders/input/richtext.tpl',
      1 => 1439915090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22264568fccda436b15-61282569',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'D:/web/OpenServer/domains/shri-lanka.loc/core/model/smarty/plugins\modifier.escape.php';
?><textarea id="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
" name="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
" class="modx-richtext" onchange="MODx.fireResourceFormChange();"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('tv')->value->get('value'));?>
</textarea>

<script type="text/javascript">

Ext.onReady(function() {
    
    MODx.makeDroppable(Ext.get('tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'));
    
});
</script>