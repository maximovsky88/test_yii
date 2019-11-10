<?php
/**
 * Created by PhpStorm.
 * User: MAX
 * Date: 07.11.2019
 * Time: 23:03
 */

namespace app\models;

use yii\db\ActiveRecord;

class Currency extends ActiveRecord
{
    public static function tableName()
    {
        return '{{currency}}';
    }

    public static function updateCurrenciesByXML($xmlCurrenciesObj)
    {
        date_default_timezone_set("Europe/Moscow");
        $time = date('H:i:s', time());//@(string)$xmlCurrenciesObj->attributes()['Date'];
        foreach ($xmlCurrenciesObj as $value) {
            $currency = [
                'name' => (string)$value->CharCode,
                'rate' => floatval(str_replace(',', '.', (string)$value->Value)),
                'insert_dt' => (string)$time
            ];
            $existCurrency = self::findOne(['name' =>  $currency['name']]);
            if ($existCurrency) {
                unset($currency['name']);
                $existCurrency->setAttributes($currency, false);
                $existCurrency->save();
            } else {
                $newCurrency = new self;
                $newCurrency->setAttributes($currency, false);
                $newCurrency->save();
            }
        }
    }
}