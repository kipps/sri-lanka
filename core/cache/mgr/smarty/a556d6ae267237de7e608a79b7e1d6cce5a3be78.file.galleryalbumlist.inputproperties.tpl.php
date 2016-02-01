<?php /* Smarty version Smarty-3.0.4, created on 2016-01-09 10:32:53
         compiled from "D:/web/OpenServer/domains/shri-lanka.loc/core/components/gallery/elements/tv/galleryalbumlist.inputproperties.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67715690b7a59b8a19-64044694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a556d6ae267237de7e608a79b7e1d6cce5a3be78' => 
    array (
      0 => 'D:/web/OpenServer/domains/shri-lanka.loc/core/components/gallery/elements/tv/galleryalbumlist.inputproperties.tpl',
      1 => 1442044042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67715690b7a59b8a19-64044694',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'D:/web/OpenServer/domains/shri-lanka.loc/core/model/smarty/plugins\modifier.escape.php';
?><div id="tv-input-properties-form<?php echo $_smarty_tpl->getVariable('tv')->value;?>
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
    ,labelWidth: 150
    ,border: false
    ,items: [{
        xtype: 'combo-boolean'
        ,fieldLabel: _('required')
        ,description: _('required_desc')
        ,name: 'inopt_allowBlank'
        ,hiddenName: 'inopt_allowBlank'
        ,id: 'inopt_allowBlank<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['allowBlank'] == 0 || params['allowBlank'] == 'false' ? false : true
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'combo'
        ,store: [['rank','<?php echo (isset($_smarty_tpl->getVariable('gl')->value['rank']) ? $_smarty_tpl->getVariable('gl')->value['rank'] : null);?>
'],['name','<?php echo (isset($_smarty_tpl->getVariable('gl')->value['name']) ? $_smarty_tpl->getVariable('gl')->value['name'] : null);?>
']]
        ,fieldLabel: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['sort']) ? $_smarty_tpl->getVariable('gl')->value['sort'] : null);?>
'
        ,description: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['sort_desc']) ? $_smarty_tpl->getVariable('gl')->value['sort_desc'] : null);?>
'
        ,name: 'inopt_sort'
        ,hiddenName: 'inopt_sort'
        ,forceSelection: true
        ,typeAhead: false
        ,editable: false
        ,triggerAction: 'all'
        ,id: 'inopt_sort<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['sort'] || 'rank'
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'combo'
        ,store: [['ASC','<?php echo (isset($_smarty_tpl->getVariable('gl')->value['ascending']) ? $_smarty_tpl->getVariable('gl')->value['ascending'] : null);?>
'],['DESC','<?php echo (isset($_smarty_tpl->getVariable('gl')->value['descending']) ? $_smarty_tpl->getVariable('gl')->value['descending'] : null);?>
']]
        ,fieldLabel: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['sortdir']) ? $_smarty_tpl->getVariable('gl')->value['sortdir'] : null);?>
'
        ,description: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['sortdir_desc']) ? $_smarty_tpl->getVariable('gl')->value['sortdir_desc'] : null);?>
'
        ,name: 'inopt_dir'
        ,hiddenName: 'inopt_dir'
        ,forceSelection: true
        ,typeAhead: false
        ,editable: false
        ,triggerAction: 'all'
        ,id: 'inopt_dir<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['dir'] || 'DESC'
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'textfield'
        ,fieldLabel: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['limit']) ? $_smarty_tpl->getVariable('gl')->value['limit'] : null);?>
'
        ,description: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['limit_desc']) ? $_smarty_tpl->getVariable('gl')->value['limit_desc'] : null);?>
'
        ,name: 'inopt_limit'
        ,hiddenName: 'inopt_limit'
        ,id: 'inopt_limit<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['limit'] || 0
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'textfield'
        ,fieldLabel: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['start']) ? $_smarty_tpl->getVariable('gl')->value['start'] : null);?>
'
        ,description: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['start_desc']) ? $_smarty_tpl->getVariable('gl')->value['start_desc'] : null);?>
'
        ,name: 'inopt_start'
        ,hiddenName: 'inopt_start'
        ,id: 'inopt_start<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['start'] || 0
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'combo-boolean'
        ,fieldLabel: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['shownone']) ? $_smarty_tpl->getVariable('gl')->value['shownone'] : null);?>
'
        ,description: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['shownone_desc']) ? $_smarty_tpl->getVariable('gl')->value['shownone_desc'] : null);?>
'
        ,name: 'inopt_showNone'
        ,hiddenName: 'inopt_showNone'
        ,id: 'inopt_showNone<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['showNone'] == 0 || params['showNone'] == 'false' ? false : true
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'combo-boolean'
        ,fieldLabel: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['showcover']) ? $_smarty_tpl->getVariable('gl')->value['showcover'] : null);?>
'
        ,description: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['showcover_desc']) ? $_smarty_tpl->getVariable('gl')->value['showcover_desc'] : null);?>
'
        ,name: 'inopt_showCover'
        ,hiddenName: 'inopt_showCover'
        ,id: 'inopt_showCover<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['showCover'] == 0 || params['showCover'] == 'false' ? false : true
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'textfield'
        ,fieldLabel: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['parent']) ? $_smarty_tpl->getVariable('gl')->value['parent'] : null);?>
'
        ,description: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['parent_desc']) ? $_smarty_tpl->getVariable('gl')->value['parent_desc'] : null);?>
'
        ,name: 'inopt_parent'
        ,id: 'inopt_parent<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['parent'] || ''
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'combo-boolean'
        ,fieldLabel: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['subchilds']) ? $_smarty_tpl->getVariable('gl')->value['subchilds'] : null);?>
'
        ,description: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['subchilds_desc']) ? $_smarty_tpl->getVariable('gl')->value['subchilds_desc'] : null);?>
'
        ,name: 'inopt_subchilds'
        ,id: 'inopt_subchilds<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['subchilds'] || ''
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'textfield'
        ,fieldLabel: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['width']) ? $_smarty_tpl->getVariable('gl')->value['width'] : null);?>
'
        ,description: '<?php echo (isset($_smarty_tpl->getVariable('gl')->value['width_desc']) ? $_smarty_tpl->getVariable('gl')->value['width_desc'] : null);?>
'
        ,name: 'inopt_width'
        ,id: 'inopt_width<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['width'] || 400
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'textfield'
        ,fieldLabel: _('combo_listwidth')
        ,description: _('combo_listwidth_desc')
        ,name: 'inopt_listWidth'
        ,id: 'inopt_listWidth<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['listWidth'] || ''
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'combo-boolean'
        ,fieldLabel: _('combo_typeahead')
        ,description: _('combo_typeahead_desc')
        ,name: 'inopt_typeAhead'
        ,hiddenName: 'inopt_typeAhead'
        ,id: 'inopt_typeAhead<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['typeAhead'] || false
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'textfield'
        ,fieldLabel: _('combo_typeahead_delay')
        ,description: _('combo_typeahead_delay_desc')
        ,name: 'inopt_typeAheadDelay'
        ,id: 'inopt_typeAheadDelay<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['typeAheadDelay'] || 250
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'combo-boolean'
        ,fieldLabel: _('combo_forceselection')
        ,description: _('combo_forceselection_desc')
        ,name: 'inopt_forceSelection'
        ,hiddenName: 'inopt_forceSelection'
        ,id: 'inopt_forceSelection<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['forceSelection'] || false
        ,width: 300
        ,listeners: oc
    },{
        xtype: 'textfield'
        ,fieldLabel: _('combo_listempty_text')
        ,description: _('combo_listempty_text_desc')
        ,name: 'inopt_listEmptyText'
        ,id: 'inopt_listEmptyText<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['listEmptyText'] || ''
        ,width: 300
        ,listeners: oc
    }]
    ,renderTo: 'tv-input-properties-form<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
});
// ]]>
</script>
