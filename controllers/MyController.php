<?php

namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;

use app\models\Target;
use app\models\HistoryAchiev;

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

    public function actionAddTarget($id = null)
    {
        $user = Target::findOne($id);
        if ($user === null) {
          throw new NotFoundHttpException('Not found user');
        }

        $model = new HistoryAchiev();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_target=$id;
            Yii::info($id);
            if ($model->validate() && $model->save()) {
                // form inputs are valid, do something here
                return $this->goHome();
            }
        }

        return $this->render('addTarget', [
            'model' => $model,
            'user'=>$user
        ]);
    }

}
