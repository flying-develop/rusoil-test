<?php
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
    $APPLICATION->SetTitle("1С-Битрикс: Управление сайтом");
    $APPLICATION->IncludeComponent(
        "bitrix:form.result.new",
        "request",
        Array(
            "CACHE_TIME" => "3600",
            "CACHE_TYPE" => "A",
            "CHAIN_ITEM_LINK" => "",
            "CHAIN_ITEM_TEXT" => "",
            "EDIT_URL" => "",
            "IGNORE_CUSTOM_TEMPLATE" => "N",
            "LIST_URL" => "",
            "SEF_MODE" => "N",
            "SUCCESS_URL" => "",
            "USE_EXTENDED_ERRORS" => "Y",
            "WEB_FORM_ID" => 1,
            "AJAX_MODE" => "Y",
            "AJAX_OPTION_SHADOW" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "AJAX_OPTION_HISTORY" => "N",
        )
    );
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>