<?php

namespace app\controllers;

use Yii;
use app\models\Target;

class MyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = Target::find()->select(['target.*','sum(historyAchiev.money) as itog'])->joinWith('historyAchievs')->groupBy('target.name')->all();
        Yii::info($model);
        return $this->render('index',['model'=>$model]);
    }

    public function actionCreateUser()
    {
        $model = new Target();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                return $this->goHome();
            }
        }

        return $this->render('createUser', [
            'model' => $model,
        ]);
    }

}
