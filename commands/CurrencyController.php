<?php

namespace app\commands;

use yii\console\{Controller, ExitCode};
use yii\helpers\Console;
use app\models\Currency;

class CurrencyController extends Controller
{
    const PATH_TO_CURRENCIES_INFO = "http://www.cbr.ru/scripts/XML_daily.asp";

    public function actionUpdateCurrencies()
    {
        $xmlObj = simplexml_load_file(self::PATH_TO_CURRENCIES_INFO);
        if ((bool)$xmlObj) {
            Currency::updateCurrenciesByXML($xmlObj);
            $this->stdout("Валюты успешно обновлены. Источник: " . self::PATH_TO_CURRENCIES_INFO . "\n", Console::BOLD);
            return ExitCode::OK;
        } else {
            $this->stdout("Не удалось прочитать файл " . self::PATH_TO_CURRENCIES_INFO . "\n", Console::BOLD);
            return ExitCode::UNSPECIFIED_ERROR;
        }
    }
}
