<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die(); ?>
<?php
    //TODO: Вынести бренды в Highload-блок
    $brands = [
        'Бренд 1',
        'Бренд 2',
        'Бренд 3',
    ];
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-auto mb-3">
            <div class="form-label">Бренд</div>
            <select
                    class="form-select select-brand"
                    name="data[brand][]"
                    aria-label="Выберите бренд"
            >
                <option>Выберите бренд</option>
                <?php foreach ($brands as $brandValue => $brandName): ?>
                    <option
                            value="<?php echo $brandValue; ?>"
                            <?php echo (!$arParams['TEMP'] && $brandValue == $arParams['BRAND']) ? 'selected' : '' ?>
                    ><?php echo $brandName; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6 col-lg-2-half mb-3">
            <div class="form-label">Наименование</div>
            <input
                    type="text"
                    class="form-control input-name"
                    value="<?php echo (!$arParams['TEMP'] && $arParams['NAME']) ? $arParams['NAME'] : '' ?>"
                    name="data[name][]"
            />
        </div>
        <div class="col-md-6 col-lg-2-half mb-3">
            <div class="form-label">Количество</div>
            <input
                    type="text"
                    class="form-control input-qty"
                    value="<?php echo (!$arParams['QTY'] && $arParams['QTY']) ? $arParams['QTY'] : '' ?>"
                    name="data[qty][]"
            />
        </div>
        <div class="col-md-6 col-lg-2-half mb-3">
            <div class="form-label">Фасовка</div>
            <input
                    type="text"
                    class="form-control input-package"
                    value="<?php echo (!$arParams['TEMP'] && $arParams['PACKAGE']) ? $arParams['PACKAGE'] : '' ?>"
                    name="data[package][]"
            />
        </div>
        <div class="col-md-6 col-lg-2-half mb-3">
            <div class="form-label">Клиент</div>
            <input
                    type="text"
                    class="form-control input-client"
                    value="<?php echo (!$arParams['TEMP'] && $arParams['CLIENT']) ? $arParams['CLIENT'] : '' ?>"
                    name="data[client][]"
            />
        </div>
        <div class="container-actions mb-3">
            <span class="minus" title="Удалить строку">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2m3 11H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2"/>
                </svg>
            </span>
            <span class="plus" title="Добавить строку">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2m3 11h-2v2a1 1 0 0 1-2 0v-2H9a1 1 0 0 1 0-2h2V9a1 1 0 0 1 2 0v2h2a1 1 0 0 1 0 2"/>
                </svg>
            </span>
        </div>
    </div>
</div>
