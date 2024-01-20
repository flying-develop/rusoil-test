BX.ready(function () {
    _initButtons();
    _initFields();

    $('form[name="SIMPLE_FORM_1"]').on('submit', function (){
        this.classList.add('process');
    });
});

BX.addCustomEvent('onAjaxSuccess', function () {
    _initButtons();
    _initFields();

    $('form[name="SIMPLE_FORM_1"]').on('submit', function (){
        this.classList.add('process');
    });
});

function _initButtons()
{
    $('.containers .container-actions span').each(function (){
        if (!this.classList.contains('inited')) {
            this.classList.add('inited');
            this.addEventListener('click', (event) => {
                const button = event.target.closest('span');
                const container = document.querySelector('.data-fieldset');
                const rows = container.querySelector('.containers');
                const template = container.querySelector('template');
                const row = button.closest('.container');

                if (button.classList.contains('minus')) {
                    row.remove();
                    if (!rows.querySelectorAll('.container').length) {
                        const newRow = template.content.cloneNode(true);
                        rows.appendChild(newRow);
                    }
                }

                if (button.classList.contains('plus')) {
                    const newRow = template.content.cloneNode(true);
                    rows.insertBefore(newRow, row.nextSibling);
                }

                _initButtons();
                _fillData();



            }, {passive: false});

            const rowFields = this.closest('.container');
            ['input', 'paste', 'change'].forEach(trigger => {
                rowFields.querySelector('.select-brand').addEventListener(trigger, (event) => {
                    _fillData();
                }, {passive: false});
                rowFields.querySelector('.input-name').addEventListener(trigger, (event) => {
                    _fillData();
                }, {passive: false});
                rowFields.querySelector('.input-qty').addEventListener(trigger, (event) => {
                    _fillData();
                }, {passive: false});
                rowFields.querySelector('.input-package').addEventListener(trigger, (event) => {
                    _fillData();
                }, {passive: false});
                rowFields.querySelector('.input-client').addEventListener(trigger, (event) => {
                    _fillData();
                }, {passive: false});
            });
        }
    });
}

function _initFields() {

    $('form input[required], form select[required]').on('change paste input', function (){
        this.closest('.mb-3').querySelectorAll('.is-invalid').forEach(element => {
            element.classList.remove('is-invalid');
        })
    });

    $('input[name="form_hidden_14"]').val('form_#P5432j425432r4kFsk');

}

function _fillData()
{
    let data = [];

    let rows = document.querySelectorAll('.data-fieldset .containers .container');
    rows.forEach(row => {
        data.push({
            brand: row.querySelector('.select-brand').value,
            name: row.querySelector('.input-name').value,
            qty: row.querySelector('.input-qty').value,
            package: row.querySelector('.input-package').value,
            client: row.querySelector('.input-client').value,
        })
    });

    document.querySelector('input[name="form_hidden_11"]').value = JSON.stringify(data);

}