<?php /* Smarty version Smarty-3.0.4, created on 2016-01-08 17:40:14
         compiled from "D:/web/OpenServer/domains/shri-lanka.loc/manager/templates/default/element/tv/renders/properties/htmltag.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24279568fca4e65c5c6-09132251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe8e686eee3f141ce62484526cba5aa46bdb4220' => 
    array (
      0 => 'D:/web/OpenServer/domains/shri-lanka.loc/manager/templates/default/element/tv/renders/properties/htmltag.tpl',
      1 => 1439915090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24279568fca4e65c5c6-09132251',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'D:/web/OpenServer/domains/shri-lanka.loc/core/model/smarty/plugins\modifier.escape.php';
?><div id="tv-wprops-form<?php echo $_smarty_tpl->getVariable('tv')->value;?>
"></div>


<script type="text/javascript">
// <![CDATA[
var params = {
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('params')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['v']->iteration=0;
if ($_smarty_tpl->tpl_vars['v']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['v']->iteration++;
 $_smarty_tpl->tpl_vars['v']->last = $_smarty_tpl->tpl_vars['v']->iteration === $_smarty_tpl->tpl_vars['v']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['p']['last'] = $_smarty_tpl->tpl_vars['v']->last;
?>
 '<?php echo (isset($_smarty_tpl->tpl_vars['k']->value) ? $_smarty_tpl->tpl_vars['k']->value : null);?>
': '<?php echo smarty_modifier_escape((isset($_smarty_tpl->tpl_vars['v']->value) ? $_smarty_tpl->tpl_vars['v']->value : null),"javascript");?>
'<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['p']['last']){?>,<?php }?>
<?php }} ?>
};
var oc = {'change':{fn:function(){Ext.getCmp('modx-panel-tv').markDirty();},scope:this}};
MODx.load({
    xtype: 'panel'
    ,layout: 'form'
    ,autoHeight: true
    ,cls: 'form-with-labels'
    ,labelAlign: 'top'
    ,border: false
    ,items: [{
        xtype: 'textfield'
        ,fieldLabel: _('tag_name')
        ,name: 'prop_tagname'
        ,id: 'prop_tagname<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['tagname'] || 'div'
        ,listeners: oc
        ,anchor: '100%'
    },{
        xtype: 'textfield'
        ,fieldLabel: _('tag_id')
        ,name: 'prop_tagid'
        ,id: 'prop_tagid<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['tagid'] || ''
        ,listeners: oc
        ,anchor: '100%'
    },{
        xtype: 'textfield'
        ,fieldLabel: _('class')
        ,name: 'prop_class'
        ,id: 'prop_class<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['class'] || ''
        ,listeners: oc
        ,anchor: '100%'
    },{
        xtype: 'textfield'
        ,fieldLabel: _('style')
        ,name: 'prop_style'
        ,id: 'prop_style<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['style'] || ''
        ,listeners: oc
        ,anchor: '100%'
    },{
        xtype: 'textfield'
        ,fieldLabel: _('attributes')
        ,name: 'prop_attrib'
        ,id: 'prop_attrib<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['attrib'] || ''
        ,listeners: oc
        ,anchor: '100%'
    }]
    ,renderTo: 'tv-wprops-form<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
});
// ]]>
</script>

