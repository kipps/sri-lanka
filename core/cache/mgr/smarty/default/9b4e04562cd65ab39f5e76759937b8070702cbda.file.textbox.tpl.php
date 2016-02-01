<?php /* Smarty version Smarty-3.0.4, created on 2016-01-08 12:56:37
         compiled from "D:/web/OpenServer/domains/shri-lanka.loc/manager/templates/default/element/tv/renders/input/textbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10973568f87d5d06417-51143026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b4e04562cd65ab39f5e76759937b8070702cbda' => 
    array (
      0 => 'D:/web/OpenServer/domains/shri-lanka.loc/manager/templates/default/element/tv/renders/input/textbox.tpl',
      1 => 1439915090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10973568f87d5d06417-51143026',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'D:/web/OpenServer/domains/shri-lanka.loc/core/model/smarty/plugins\modifier.escape.php';
?><input id="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
" name="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
"
	type="text" class="textfield"
	value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('tv')->value->get('value'));?>
"
	<?php echo $_smarty_tpl->getVariable('style')->value;?>

	tvtype="<?php echo $_smarty_tpl->getVariable('tv')->value->type;?>
"
/>

<script type="text/javascript">
// <![CDATA[

Ext.onReady(function() {
    var fld = MODx.load({
    
        xtype: 'textfield'
        ,applyTo: 'tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,width: '99%'
        ,enableKeyEvents: true
        ,msgTarget: 'under'
        ,allowBlank: <?php if ((isset($_smarty_tpl->getVariable('params')->value['allowBlank']) ? $_smarty_tpl->getVariable('params')->value['allowBlank'] : null)==1||(isset($_smarty_tpl->getVariable('params')->value['allowBlank']) ? $_smarty_tpl->getVariable('params')->value['allowBlank'] : null)=='true'){?>true<?php }else{ ?>false<?php }?>
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['maxLength']) ? $_smarty_tpl->getVariable('params')->value['maxLength'] : null)){?>,maxLength: <?php echo (isset($_smarty_tpl->getVariable('params')->value['maxLength']) ? $_smarty_tpl->getVariable('params')->value['maxLength'] : null);?>
<?php }?>
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['minLength']) ? $_smarty_tpl->getVariable('params')->value['minLength'] : null)){?>,minLength: <?php echo (isset($_smarty_tpl->getVariable('params')->value['minLength']) ? $_smarty_tpl->getVariable('params')->value['minLength'] : null);?>
<?php }?>
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['regex']) ? $_smarty_tpl->getVariable('params')->value['regex'] : null)){?>,regex: new RegExp('<?php echo (isset($_smarty_tpl->getVariable('params')->value['regex']) ? $_smarty_tpl->getVariable('params')->value['regex'] : null);?>
')<?php }?>
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['regexText']) ? $_smarty_tpl->getVariable('params')->value['regexText'] : null)){?>,regexText: '<?php echo (isset($_smarty_tpl->getVariable('params')->value['regexText']) ? $_smarty_tpl->getVariable('params')->value['regexText'] : null);?>
'<?php }?>
    
        ,listeners: { 'keydown': { fn:MODx.fireResourceFormChange, scope:this}}
    });
    Ext.getCmp('modx-panel-resource').getForm().add(fld);
    MODx.makeDroppable(fld);
});

// ]]>
</script>
