<?php /* Smarty version Smarty, created on 2013-03-24 23:36:11
         compiled from "/home/monstertke/PHP/DeadSimpleCMS/application/views/smart/templates/base/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:888847372514fc62bd26094-89271437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6425f66f94c2ee127312ae29d88f61a13c3cb3c1' => 
    array (
      0 => '/home/monstertke/PHP/DeadSimpleCMS/application/views/smart/templates/base/header.tpl',
      1 => 1363922917,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '888847372514fc62bd26094-89271437',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty',
  'unifunc' => 'content_514fc62bd6d182_76489665',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_514fc62bd6d182_76489665')) {function content_514fc62bd6d182_76489665($_smarty_tpl) {?><!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['data']->value['page_title'];?>
</title>
    <link rel="stylesheet" type="text/css" href="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['css_file'])){?> <?php echo $_smarty_tpl->tpl_vars['data']->value['css_file'];?>
 <?php }else{ ?> /public/assets/css/site.css <?php }?>">
</head>
<body><?php }} ?>