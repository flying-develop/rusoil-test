<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die(); ?>
<?php file_put_contents(__DIR__ . '/test.log', print_r($arResult, 1)); ?>
<?php if ($arResult['isFormNote'] == 'Y'): ?>
    <div class="container container-fluid" style="padding-top: 2rem; padding-bottom: 2rem;">
         <div class="row justify-content-md-center" >
             <div class="col-md-10">
                <h2 xmlns="http://www.w3.org/1999/html">Cпасибо за Ваше обращение!</h2>
                <p class="form-description">Мы свяжемся с Вами в ближайшее время!</p>
             </div>
         </div>
    </div>
<?php elseif ($arResult['isFormNote'] != 'Y'):?>


    <?=$arResult['FORM_HEADER']?>
    <?=bitrix_sessid_post()?>
    <div class="container container-fluid"  style="padding-top: 2rem; padding-bottom: 2rem;">
        <div class="row justify-content-md-center" >
            <div class="col-md-10">
                <h2>Новая заявка</h2>
                <?php foreach ($arResult['QUESTIONS'] as $FIELD_SID => $arQuestion): ?>

                    <?php
                        $isActive = $arQuestion['STRUCTURE'][0]['ACTIVE'] == 'Y';
                        if (!$isActive) continue;

                        $id = $arQuestion['STRUCTURE'][0]['ID'];
                        $required = $arQuestion['REQUIRED'] == 'Y';
                        $type = $arQuestion['STRUCTURE'][0]['FIELD_TYPE'];
                        $value = $arResult['arrVALUES']['form_' . $type . '_' . $id] ?? null;


                        if (in_array($type, ['text', 'dropdown', 'file', 'hidden', 'radio', 'textarea'])) {
                            $APPLICATION->IncludeComponent(
                                'bitrix:main.include',
                                "",
                                [
                                    'AREA_FILE_SHOW' => 'file',
                                    'AREA_FILE_SUFFIX' => '',
                                    'EDIT_TEMPLATE' => '',
                                    'PATH' => SITE_TEMPLATE_PATH . '/components/bitrix/form.result.new/request/includes/' . $type . '.php',
                                    'SHOW_BORDER' => FALSE,
                                    'MODE' => 'text',
                                    'ID' => $id,
                                    'REQUIRED' => $required,
                                    'VALUE' => $value,
                                    'QUESTION' => $arQuestion,
                                    'SID' => $FIELD_SID,
                                    'RESULT' => $arResult
                                ],
                                false,
                                ['HIDE_ICONS' => 'Y']
                            );
                        } else {
                            echo $arQuestion['HTML_CODE'];
                        }
                    ?>

                <?php endforeach; ?>
                <button type="submit" name="web_form_submit" class="btn btn-primary webform-submit">
                    <span class="text"><?php echo $arResult["arForm"]["BUTTON"]; ?></span>
                    <span class="spinner-border" role="status" aria-hidden="true"></span>
                </button>
                <input type="hidden" name="web_form_apply" value="Y" />

            </div>
        </div>
    </div>
    <?=$arResult['FORM_FOOTER']?>
<?php endif; ?>