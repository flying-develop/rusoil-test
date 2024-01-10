<?php
    if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
    \CJSCore::Init(['ajax']);
    \Bitrix\Main\UI\Extension::load('ui.bootstrap4');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cleartype" content="on"/>
    <title><?php $APPLICATION->ShowTitle();?></title>
    <?php $APPLICATION->ShowHead(); ?>
</head>
<body>
<div id="panel"><?php $APPLICATION->ShowPanel(); ?></div>