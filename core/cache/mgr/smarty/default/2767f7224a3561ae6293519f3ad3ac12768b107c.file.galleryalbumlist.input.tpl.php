<?php /* Smarty version Smarty-3.0.4, created on 2016-01-09 10:34:23
         compiled from "D:/web/OpenServer/domains/shri-lanka.loc/core/components/gallery/elements/tv/galleryalbumlist.input.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77755690b7ffbb50c8-95114880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2767f7224a3561ae6293519f3ad3ac12768b107c' => 
    array (
      0 => 'D:/web/OpenServer/domains/shri-lanka.loc/core/components/gallery/elements/tv/galleryalbumlist.input.tpl',
      1 => 1442044042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77755690b7ffbb50c8-95114880',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<input id="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
" type="text" />


<script type="text/javascript">
// <![CDATA[
Ext.onReady(function() {
    var galStore<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
 = new Ext.data.ArrayStore({
        fields: ['id','name','description','cover'],
        data : <?php echo $_smarty_tpl->getVariable('list')->value;?>

    });
    var galTpl<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
 = new Ext.XTemplate(
        '<tpl for="."><div class="search-item" style="padding: 4px">'
        ,'<tpl if="cover"><div style="float: right;"><img src="{cover}" alt="" /></div></tpl>'
        ,'{name}'
        ,'<br /><span style="font-size: small; font-style: italic">{description}</span>'
        ,'<div style="clear: both;"></div></div></tpl>'
    );

    var fld = MODx.load({
        xtype: 'combo'
        ,store: galStore<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>

        ,displayField: 'name'
        ,valueField: 'id'
        ,name: 'tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,hiddenName: 'tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,mode: 'local'
        ,triggerAction: 'all'
        ,applyTo: 'tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'
        ,value: '<?php echo $_smarty_tpl->getVariable('tv')->value->value;?>
'
        ,tpl: galTpl<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>

        ,itemSelector: 'div.search-item'
        ,width: <?php if ((isset($_smarty_tpl->getVariable('params')->value['width']) ? $_smarty_tpl->getVariable('params')->value['width'] : null)){?><?php echo (isset($_smarty_tpl->getVariable('params')->value['width']) ? $_smarty_tpl->getVariable('params')->value['width'] : null);?>
<?php }else{ ?>400<?php }?>
        ,allowBlank: <?php if ((isset($_smarty_tpl->getVariable('params')->value['allowBlank']) ? $_smarty_tpl->getVariable('params')->value['allowBlank'] : null)==1||(isset($_smarty_tpl->getVariable('params')->value['allowBlank']) ? $_smarty_tpl->getVariable('params')->value['allowBlank'] : null)=='true'){?>true<?php }else{ ?>false<?php }?>
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['listWidth']) ? $_smarty_tpl->getVariable('params')->value['listWidth'] : null)){?>,listWidth: <?php echo (isset($_smarty_tpl->getVariable('params')->value['listWidth']) ? $_smarty_tpl->getVariable('params')->value['listWidth'] : null);?>
<?php }?>
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['typeAhead']) ? $_smarty_tpl->getVariable('params')->value['typeAhead'] : null)){?>
            ,typeAhead: true
            ,typeAheadDelay: <?php if ((isset($_smarty_tpl->getVariable('params')->value['typeAheadDelay']) ? $_smarty_tpl->getVariable('params')->value['typeAheadDelay'] : null)&&(isset($_smarty_tpl->getVariable('params')->value['typeAheadDelay']) ? $_smarty_tpl->getVariable('params')->value['typeAheadDelay'] : null)!=''){?><?php echo (isset($_smarty_tpl->getVariable('params')->value['typeAheadDelay']) ? $_smarty_tpl->getVariable('params')->value['typeAheadDelay'] : null);?>
<?php }else{ ?>250<?php }?>
        <?php }else{ ?>
            ,editable: false
            ,typeAhead: false
        <?php }?>
        <?php if ((isset($_smarty_tpl->getVariable('params')->value['listEmptyText']) ? $_smarty_tpl->getVariable('params')->value['listEmptyText'] : null)){?>
            ,listEmptyText: '<?php echo (isset($_smarty_tpl->getVariable('params')->value['listEmptyText']) ? $_smarty_tpl->getVariable('params')->value['listEmptyText'] : null);?>
'
        <?php }?>
        ,forceSelection: <?php if ((isset($_smarty_tpl->getVariable('params')->value['forceSelection']) ? $_smarty_tpl->getVariable('params')->value['forceSelection'] : null)&&(isset($_smarty_tpl->getVariable('params')->value['forceSelection']) ? $_smarty_tpl->getVariable('params')->value['forceSelection'] : null)!='false'){?>true<?php }else{ ?>false<?php }?>
        ,msgTarget: 'under'
        ,listeners: { 'select': { fn:MODx.fireResourceFormChange, scope:this}}
        
    });

    var pr = Ext.getCmp('modx-panel-resource');
    if (pr) {
        pr.getForm().add(fld);
    }
    MODx.makeDroppable(fld);
});
// ]]>
</script>
