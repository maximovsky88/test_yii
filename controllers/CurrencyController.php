<?php

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Currency;
use yii\data\ActiveDataProvider;

class CurrencyController extends ActiveController
{
    public $modelClass = Currency::class;

    public function actions(){
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex(){
        $activeData = new ActiveDataProvider([
            'query' => Currency::find(),
            'pagination' => [
                'defaultPageSize' => 10,
            ],
        ]);
        return $activeData;
    }
}