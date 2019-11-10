<?php
/**
 * Created by PhpStorm.
 * User: MAX
 * Date: 05.11.2019
 * Time: 23:12
 */

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\User;

class UserController extends ActiveController
{
    public $modelClass = User::class;

}