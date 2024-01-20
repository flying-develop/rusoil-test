<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die(); ?>
<input
        type="hidden"
        name="form_hidden_<?php echo $arParams['ID']; ?>"
        value='<?php echo $arParams['VALUE']; ?>'
/>
<?php if ($arParams['SID'] == 'data'): ?>
    <div class="mb-3 data-fieldset">
        <div class="form-label"><?php echo $arParams['QUESTION']['CAPTION']; ?></div>
        <div class="containers">
            <?php
                if ($arParams['VALUE']) {
                    $rows = json_decode(html_entity_decode($arParams['VALUE']), true);
                    foreach ($rows as $row) {
                        $APPLICATION->IncludeComponent(
                            'bitrix:main.include',
                            "",
                            [
                                'AREA_FILE_SHOW' => 'file',
                                'AREA_FILE_SUFFIX' => '',
                                'EDIT_TEMPLATE' => '',
                                'PATH' => SITE_TEMPLATE_PATH . '/components/bitrix/form.result.new/request/includes/data.php',
                                'SHOW_BORDER' => FALSE,
                                'MODE' => 'text',
                                'TEMP' => FALSE,
                                'BRAND' => $row['brand'] ?? null,
                                'NAME' => $row['name'] ?? null,
                                'QTY' => $row['qty'] ?? null,
                                'PACKAGE' => $row['package'] ?? null,
                                'CLIENT' => $row['client'] ?? null,
                            ],
                            false,
                            ['HIDE_ICONS' => 'Y']
                        );
                    }
                } else {
                    $APPLICATION->IncludeComponent(
                        'bitrix:main.include',
                        "",
                        [
                                'AREA_FILE_SHOW' => 'file',
                                'AREA_FILE_SUFFIX' => '',
                                'EDIT_TEMPLATE' => '',
                                'PATH' => SITE_TEMPLATE_PATH . '/components/bitrix/form.result.new/request/includes/data.php',
                                'SHOW_BORDER' => false,
                                'MODE' => 'text',
                                'TEMP' => true
                        ],
                        false,
                        ['HIDE_ICONS' => 'Y']
                    );
                }
            ?>
        </div>
        <template>
            <?php
                $APPLICATION->IncludeComponent(
                    'bitrix:main.include',
                    "",
                    [
                        'AREA_FILE_SHOW' => 'file',
                        'AREA_FILE_SUFFIX' => '',
                        'EDIT_TEMPLATE' => '',
                        'PATH' => SITE_TEMPLATE_PATH . '/components/bitrix/form.result.new/request/includes/data.php',
                        'SHOW_BORDER' => FALSE,
                        'MODE' => 'text',
                        'TEMP' => TRUE
                    ],
                    false,
                    ['HIDE_ICONS' => 'Y']
                );
            ?>
        </template>
    </div>
<?php endif; ?>
