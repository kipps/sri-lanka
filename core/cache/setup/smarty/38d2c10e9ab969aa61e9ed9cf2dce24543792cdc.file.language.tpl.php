<?php /* Smarty version Smarty-3.0.4, created on 2016-01-30 21:17:25
         compiled from "C:/WebServer/OpenServer/domains/sri-lanka.loc/setup/templates/language.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1447556acfe35f23f47-96014226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38d2c10e9ab969aa61e9ed9cf2dce24543792cdc' => 
    array (
      0 => 'C:/WebServer/OpenServer/domains/sri-lanka.loc/setup/templates/language.tpl',
      1 => 1439915090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1447556acfe35f23f47-96014226',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form id="install" action="?" method="post">

<?php if ($_smarty_tpl->getVariable('restarted')->value){?>
    <br class="clear" />
    <br class="clear" />
    <p class="note"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['restarted_msg']) ? $_smarty_tpl->getVariable('_lang')->value['restarted_msg'] : null);?>
</p>
<?php }?>

<div class="setup_navbar" style="border-top: 0;">
    <p class="title"><?php echo (isset($_smarty_tpl->getVariable('_lang')->value['choose_language']) ? $_smarty_tpl->getVariable('_lang')->value['choose_language'] : null);?>
:
        <select name="language" autofocus="autofocus">
            <?php echo $_smarty_tpl->getVariable('languages')->value;?>

    	</select>
    </p>

    <input type="submit" name="proceed" value="<?php echo (isset($_smarty_tpl->getVariable('_lang')->value['select']) ? $_smarty_tpl->getVariable('_lang')->value['select'] : null);?>
" />
</div>
</form>