Форма реализована с помощью модуля Веб-форм и стилизована с помощью своего шаблона (local/templates/rusoil/components/bitrix/form.result.new/request)

Отправка уведомления реализована через почтовый шаблон, который вызывается на событие onAfterResultAdd в init.php.

Стандартный триггер вызова почтового шаблона самой формы не используется, для того чтобы корректно сформировать письмо, в случаях когда не все поля формы были заполнены.