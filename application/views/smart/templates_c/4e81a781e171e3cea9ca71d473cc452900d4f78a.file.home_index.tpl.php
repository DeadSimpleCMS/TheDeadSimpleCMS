<?php /* Smarty version Smarty, created on 2013-03-24 23:36:11
         compiled from "/home/monstertke/PHP/DeadSimpleCMS/application/views/smart/templates/home_index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1249217998514fc62bd71041-52996756%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e81a781e171e3cea9ca71d473cc452900d4f78a' => 
    array (
      0 => '/home/monstertke/PHP/DeadSimpleCMS/application/views/smart/templates/home_index.tpl',
      1 => 1363584347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1249217998514fc62bd71041-52996756',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty',
  'unifunc' => 'content_514fc62bd7b2c8_59896604',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_514fc62bd7b2c8_59896604')) {function content_514fc62bd7b2c8_59896604($_smarty_tpl) {?>
<h1> Hello from my fake ass view </h1>
<h2> Hello from my fake ass view </h2>
<h3> Hello from my fake ass view </h3>
<h4> Hello from my fake ass view </h4>
<h5> Hello from my fake ass view </h5>
<h6> Hello from my fake ass view </h6>
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['first'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['last'];?>
</p>
<?php }} ?>