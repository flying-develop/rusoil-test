<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die(); ?>
<div class="mb-3">
    <label
            for="form_dropdown_<?php echo $arParams['SID']; ?>"
            class="form-label"
    ><?php echo $arParams['QUESTION']['CAPTION']; ?></label>
    <select
            class="form-select <?php echo ($arParams['RESULT']['FORM_ERRORS'][$arParams['SID']] ?? null) ? 'is-invalid' : ''; ?>"
            name="form_dropdown_<?php echo $arParams['SID']; ?>"
            id="form_dropdown_<?php echo $arParams['SID']; ?>"
            aria-label="<?php $arParams['QUESTION']['STRUCTURE'][0]['MESSAGE']; ?>"
    >
        <?php $selectedValue = $arParams['RESULT']['arrVALUES']['form_dropdown_' . $arParams['SID']] ?? null; ?>
        <?php foreach ($arParams['QUESTION']['STRUCTURE'] as $selectOption): ?>
            <?php
                if ($selectOption['ACTIVE'] != 'Y') continue;
                $stringParams = $selectOption['FIELD_PARAM'];
                $selected = false;
                if ($arParams['RESULT']['isFormErrors'] == 'Y') {
                    if ($selectedValue == $selectOption['VALUE']) {
                        $selected = true;
                    }
                } else {
                    if (substr_count($stringParams, 'selected')) {
                        $selected = true;
                    }
                }
                $stringParams = str_replace('selected', '', $stringParams);
            ?>
            <option
                    value="<?php echo $selectOption['ID']; ?>"
                    <?php echo $stringParams; ?>
            ><?php echo $selectOption['MESSAGE']; ?></option>
        <?php endforeach; ?>
    </select>
</div>