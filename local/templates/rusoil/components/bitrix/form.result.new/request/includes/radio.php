<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die(); ?>
<div class="mb-3">
    <div class="form-label"><?php echo $arParams['QUESTION']['CAPTION']; ?></div>
    <?php $checkedValue = $arParams['RESULT']['arrVALUES']['form_radio_' . $arParams['SID']] ?? null; ?>
    <?php foreach ($arParams['QUESTION']['STRUCTURE'] as $radioOption): ?>
        <?php
            if ($radioOption['ACTIVE'] != 'Y') continue;
            $stringParams = $radioOption['FIELD_PARAM'];
            $checked = false;
            if ($arParams['RESULT'] == 'Y') {
                if ($checkedValue == $radioOption['VALUE']) {
                    $checked = true;
                }
            } else {
                if (substr_count($stringParams, 'checked')) {
                    $checked = true;
                }
            }
            $stringParams = str_replace('checked', '', $stringParams);
        ?>
        <div class="form-check">
            <input
                    class="form-check-input <?php echo ($arParams['RESULT']['FORM_ERRORS'][$arParams['SID']] ?? null) ? 'is-invalid' : ''; ?>"
                    type="radio"
                    <?php echo $checked ? 'checked' : ''; ?>
                    <?php echo $arParams['REQUIRED'] ? 'required' : ''; ?>
                    name="form_radio_<?php echo $arParams['SID']; ?>"
                    value="<?php echo $radioOption['ID']; ?>"
                    id="form_radio_<?php echo $arParams['SID']; ?>_<?php echo $radioOption['ID']; ?>"
                    <?php echo $stringParams; ?>
            />
            <label
                    class="form-check-label"
                    for="form_radio_<?php echo $arParams['SID']; ?>_<?php echo $radioOption['ID']; ?>"
            ><?php echo $radioOption['MESSAGE']; ?></label>
        </div>
    <?php endforeach; ?>
</div>