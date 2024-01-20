<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die(); ?>
<div class="mb-3">
    <label
            for="form_text_<?php echo $arParams['SID']; ?>"
            class="form-label"
    ><?php echo $arParams['QUESTION']['CAPTION']; ?></label>
    <input
            type="text"
            <?php echo $arParams['REQUIRED'] ? 'required' : ''; ?>
            class="form-control <?php echo ($arParams['RESULT']['FORM_ERRORS'][$arParams['SID']] ?? null) ? 'is-invalid' : ''; ?>"
            value="<?php echo $arParams['VALUE']; ?>"
            name="form_text_<?php echo $arParams['ID']; ?>"
            id="form_text_<?php echo $arParams['SID']; ?>"
            <?php echo $arParams['QUESTION']['STRUCTURE'][0]['FIELD_PARAM']; ?>
    />
</div>