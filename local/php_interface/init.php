<?php

#Валидация веб-форм
require_once(__DIR__ . '/validator.php');


class RequestData
{
    public static function onAfterResultUpdateHandler ($WEB_FORM_ID, $RESULT_ID): void
    {

        $arResult = $arAnswer = null;

        if ($WEB_FORM_ID == 1) {
            $data = CFormResult::getDataById(
                $RESULT_ID,
                [
                    'title',
                    'category',
                    'type',
                    'storage',
                    'data',
                    'file',
                    'comment',
                ],
                $arResult,
                $arAnswer
            );

            $message = '<p><b>Заполнена форма:</b> "Оставить заявку"</p>';
            $message .= '<p><b>Дата и время запроса:</b>  ' . date('d.m.Y H:i') . '</p>';
            $message .= '<p><b>Заголовок заявки:</b>  ' . $data['title'][0]['USER_TEXT'] . '</p>';
            $message .= '<p><b>Категория заявки:</b>  ' . $data['category'][0]['ANSWER_TEXT'] . '</p>';
            $message .= '<p><b>Тип заявки:</b>  ' . $data['type'][0]['ANSWER_TEXT'] . '</p>';
            if (!empty($data['storage'][0]['ANSWER_ID']) && $data['storage'][0]['ANSWER_ID'] != 7) {
                //Склад выбран
                $message .= '<p><b>Склад:</b>  ' . $data['storage'][0]['ANSWER_TEXT'] . '</p>';
            }
            if (!empty($data['data'][0]['USER_TEXT'])) {
                $rows = json_decode(html_entity_decode($data['data'][0]['USER_TEXT']), true);
                if ($rows) {
                    $resultRows = '';
                    $brands = [
                        'Бренд 1',
                        'Бренд 2',
                        'Бренд 3',
                    ];
                    foreach ($rows as $rowIndex => $rowData) {
                        if ($rowData['brand'] || $rowData['name'] || $rowData['qty'] || $rowData['package'] || $rowData['client']) {
                            $resultRows .= '<tr>';
                                $resultRows .= '<td>' . ($brands[$rowData['brand']] ?? null) . '</td>';
                                $resultRows .= '<td>' . $rowData['name'] . '</td>';
                                $resultRows .= '<td>' . $rowData['qty'] . '</td>';
                                $resultRows .= '<td>' . $rowData['package'] . '</td>';
                                $resultRows .= '<td>' . $rowData['client'] . '</td>';
                            $resultRows .= '</tr>';
                        }
                    }
                    if ($resultRows) {
                        $message .= '<p><b>Состав заявки</b></p>';
                        $message .= '<table border="1" valign="top">';
                            $message .= '<thead>';
                                $message .= '<tr>';
                                    $message .= '<th>Бренд</th>';
                                    $message .= '<th>Наименование</th>';
                                    $message .= '<th>Количество</th>';
                                    $message .= '<th>Фасовка</th>';
                                    $message .= '<th>Клиент</th>';
                                $message .= '</tr>';
                            $message .= '</thead>';
                            $message .= '<tbody>' . $resultRows . '</tbody>';
                        $message .= '</table>';
                    }
                }
            }
            if (!empty($data['file'][0]['USER_FILE_ID'])) {
                $message .= '<p><b>Файл:</b> <a href="https://' . SITE_SERVER_NAME . CFile::GetPath($data['file'][0]['USER_FILE_ID']).'">' . $data['file'][0]['USER_FILE_NAME'] . '</a></p>';
            }
            if (!empty($data['comment'][0]['USER_TEXT'])) {
                $message .= '<p><b>Комментарий:</b> ' . $data['comment'][0]['USER_TEXT'] . '</p>';
            }
            CEvent::SendImmediate("FORM_FILLING_SIMPLE_FORM_1", SITE_ID, ['MESSAGE' => $message]);
        }
    }
}

AddEventHandler("form", "onAfterResultAdd", ["RequestData", "onAfterResultUpdateHandler"]);