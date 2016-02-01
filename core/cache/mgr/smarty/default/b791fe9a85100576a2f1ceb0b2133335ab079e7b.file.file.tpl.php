<?php /* Smarty version Smarty-3.0.4, created on 2016-01-08 14:36:31
         compiled from "D:/web/OpenServer/domains/shri-lanka.loc/manager/templates/default/element/tv/renders/input/file.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16096568f9f3f01cbd8-32341289%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b791fe9a85100576a2f1ceb0b2133335ab079e7b' => 
    array (
      0 => 'D:/web/OpenServer/domains/shri-lanka.loc/manager/templates/default/element/tv/renders/input/file.tpl',
      1 => 1439915090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16096568f9f3f01cbd8-32341289',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'D:/web/OpenServer/domains/shri-lanka.loc/core/model/smarty/plugins\modifier.escape.php';
if (!is_callable('smarty_modifier_replace')) include 'D:/web/OpenServer/domains/shri-lanka.loc/core/model/smarty/plugins\modifier.replace.php';
?><div id="tvpanel<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
"></div>

<?php if ($_smarty_tpl->getVariable('disabled')->value){?>
<script type="text/javascript">
// <![CDATA[

Ext.onReady(function() {
    var fld<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
 = MODx.load({
    
        xtype: 'displayfield'
        ,tv: '<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,renderTo: 'tvpanel<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,value: '<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('tv')->value->value);?>
'
        ,width: 400
        ,msgTarget: 'under'
    
    });
});

// ]]>
</script>
<?php }else{ ?>
<script type="text/javascript">
// <![CDATA[

Ext.onReady(function() {
    var fld<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
 = MODx.load({
    
        xtype: 'modx-panel-tv-file'
        ,renderTo: 'tvpanel<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,tv: '<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,value: '<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('tv')->value->value);?>
'
        ,relativeValue: '<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('tv')->value->value);?>
'
        ,width: 400
        ,msgTarget: 'under'
        ,allowBlank: <?php if ((isset($_smarty_tpl->getVariable('params')->value['allowBlank']) ? $_smarty_tpl->getVariable('params')->value['allowBlank'] : null)==1||(isset($_smarty_tpl->getVariable('params')->value['allowBlank']) ? $_smarty_tpl->getVariable('params')->value['allowBlank'] : null)=='true'){?>true<?php }else{ ?>false<?php }?>
        ,source: '<?php echo $_smarty_tpl->getVariable('source')->value;?>
'

        <?php if ((isset($_smarty_tpl->getVariable('params')->value['allowedFileTypes']) ? $_smarty_tpl->getVariable('params')->value['allowedFileTypes'] : null)){?>,allowedFileTypes: '<?php echo (isset($_smarty_tpl->getVariable('params')->value['allowedFileTypes']) ? $_smarty_tpl->getVariable('params')->value['allowedFileTypes'] : null);?>
'<?php }?>
        ,wctx: '<?php if ((isset($_smarty_tpl->getVariable('params')->value['wctx']) ? $_smarty_tpl->getVariable('params')->value['wctx'] : null)){?><?php echo (isset($_smarty_tpl->getVariable('params')->value['wctx']) ? $_smarty_tpl->getVariable('params')->value['wctx'] : null);?>
<?php }else{ ?>web<?php }?>'
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['openTo']) ? $_smarty_tpl->getVariable('params')->value['openTo'] : null)){?>,openTo: '<?php echo smarty_modifier_replace((isset($_smarty_tpl->getVariable('params')->value['openTo']) ? $_smarty_tpl->getVariable('params')->value['openTo'] : null),"'","\\'");?>
'<?php }?>

    
        ,listeners: { 'select': { fn:MODx.fireResourceFormChange, scope:this}}
    });
    MODx.makeDroppable(Ext.get('tvpanel<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'),function(v) {
        var cb = Ext.getCmp('tvbrowser<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
');
        if (cb) {
            cb.setValue(v);
            cb.fireEvent('select',{relativeUrl:v});
        }
        return '';
    });
});

// ]]>
</script>
<?php }?>
