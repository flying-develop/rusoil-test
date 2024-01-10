<?php

class CFormCustomValidator
{
    public static function RequestDataDescription(): array
    {
        return [
            'NAME' => 'data_filling',
            'DESCRIPTION' => 'Параметры заявки',
            'TYPES' => ['hidden'],
            'SETTINGS' => ['CFormCustomValidator', 'RequestDataSettings'],
            'CONVERT_TO_DB' => ['CFormCustomValidator', 'ToDB'],
            'CONVERT_FROM_DB' => ['CFormCustomValidator', 'FromDB'],
            'HANDLER' => ['CFormCustomValidator', 'RequestDataValidate'],
        ];
    }

    public static function RequestRobotDescription(): array
    {
        return [
            'NAME' => 'antibot',
            'DESCRIPTION' => 'Антибот',
            'TYPES' => ['hidden'],
            'SETTINGS' => ['CFormCustomValidator', 'RobotSettings'],
            'CONVERT_TO_DB' => ['CFormCustomValidator', 'ToDB'],
            'CONVERT_FROM_DB' => ['CFormCustomValidator', 'FromDB'],
            'HANDLER' => ['CFormCustomValidator', 'RobotValidate'],
        ];
    }

    public function RequestDataSettings(): array
    {
        return [];
    }

    public function RobotSettings(): array
    {
        return [];
    }

    public function ToDB($arParams): string
    {
        return serialize($arParams);
    }

    public function FromDB($arParams): array
    {
        return unserialize($arParams);
    }

    public static function RequestDataValidate($arParams, $arQuestion, $arAnswers, $arValues): bool
    {
        return true;
    }

    public static function RobotValidate($arParams, $arQuestion, $arAnswers, $arValues): bool
    {
        global $APPLICATION;
        foreach ($arValues as $value) {
            if ($value !== 'form_#P5432j425432r4kFsk'){
                $APPLICATION->ThrowException("что-то пошло не так");
                return false;
            }
        }

        return true;
    }
}

AddEventHandler('form', 'onFormValidatorBuildList', ['CFormCustomValidator', 'RequestDataDescription']);
AddEventHandler('form', 'onFormValidatorBuildList', ['CFormCustomValidator', 'RequestRobotDescription']);