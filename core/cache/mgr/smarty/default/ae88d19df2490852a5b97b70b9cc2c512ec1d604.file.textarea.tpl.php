<?php /* Smarty version Smarty-3.0.4, created on 2016-01-08 17:33:16
         compiled from "D:/web/OpenServer/domains/shri-lanka.loc/manager/templates/default/element/tv/renders/input/textarea.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21306568fc8ac629ef1-07305869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae88d19df2490852a5b97b70b9cc2c512ec1d604' => 
    array (
      0 => 'D:/web/OpenServer/domains/shri-lanka.loc/manager/templates/default/element/tv/renders/input/textarea.tpl',
      1 => 1439915090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21306568fc8ac629ef1-07305869',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'D:/web/OpenServer/domains/shri-lanka.loc/core/model/smarty/plugins\modifier.escape.php';
?><textarea id="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
" name="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
" rows="15"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('tv')->value->get('value'));?>
</textarea>

<script type="text/javascript">
// <![CDATA[

Ext.onReady(function() {
    var fld = MODx.load({
    
        xtype: 'textarea'
        ,applyTo: 'tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,value: '<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('tv')->value->get('value'),'javascript');?>
'
        ,height: 140
        ,width: '99%'
        ,enableKeyEvents: true
        ,msgTarget: 'under'
        ,allowBlank: <?php if ((isset($_smarty_tpl->getVariable('params')->value['allowBlank']) ? $_smarty_tpl->getVariable('params')->value['allowBlank'] : null)==1||(isset($_smarty_tpl->getVariable('params')->value['allowBlank']) ? $_smarty_tpl->getVariable('params')->value['allowBlank'] : null)=='true'){?>true<?php }else{ ?>false<?php }?>
    
        ,listeners: { 'keydown': { fn:MODx.fireResourceFormChange, scope:this}}
    });
    MODx.makeDroppable(fld);
    Ext.getCmp('modx-panel-resource').getForm().add(fld);
});

// ]]>
</script>
