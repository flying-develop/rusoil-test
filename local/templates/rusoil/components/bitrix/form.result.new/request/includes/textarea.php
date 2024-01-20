<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die(); ?>
<div class="mb-3">
    <label
            for="form_textarea_<?php echo $arParams['SID']; ?>"
            class="form-label"
    ><?php echo $arParams['QUESTION']['CAPTION']; ?></label>
    <textarea
            <?php echo $arParams['REQUIRED'] ? 'required' : ''; ?>
            class="form-control <?php echo ($arParams['RESULT']['FORM_ERRORS'][$arParams['SID']] ?? null) ? 'is-invalid' : ''; ?>"
            name="form_textarea_<?php echo $arParams['ID']; ?>"
            id="form_textarea_<?php echo $arParams['SID']; ?>"
            <?php echo $arParams['QUESTION']['STRUCTURE'][0]['FIELD_PARAM']; ?>
    ><?php echo $arParams['VALUE']; ?></textarea>
</div>
