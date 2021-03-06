<?php

namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

use app\models\Target;
use app\models\HistoryAchiev;

class MyController extends \yii\web\Controller
{
    public function behaviors()
    {
      return[
        'access'=>[
          'class'=>AccessControl::className(),
          'rules'=>[
            [
              'actions'=>['index'],
              'allow'=>true,
              'roles'=>['?','@']
            ],
            [
              'actions'=>['add-target','create-user','view-target','settings','delete-user','delete-target'],
              'allow'=>true,
              'roles'=>['@']
            ],
          ],
        ],
        'verbs'=>[
          'class'=>VerbFilter::className(),
          'actions'=>[
            'delete-user'=>['post'],
            'delete-target'=>['post']
          ],
        ],
      ];
    }

    public function actionIndex()
    {
        $model = Target::find()->select(['target.*','sum(historyAchiev.money) as itog'])->joinWith('historyAchievs')->groupBy('target.name')->all();
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
            if ($model->validate() && $model->save()) {
                return $this->goHome();
            }
        }

        return $this->render('addTarget', [
            'model' => $model,
            'user'=>$user
        ]);
    }

    public function actionViewTarget($id = null)
    {
        $model = HistoryAchiev::findAll(['id_target'=>$id]);
        if ($model === null) {
            return $this->render('viewTarget',['model'=>false]);
        };

        Url::remember(['view-target','id'=>$id]);

        return $this->render('viewTarget',['model'=>$model]);
    }

    public function actionSettings($id = null)
    {
      $model = Target::findOne($id);

      if ($model === null) {
          throw new NotFoundHttpException('Not found user');
      };

      if ($model->load(Yii::$app->request->post())) {
          if ($model->validate() && $model->save()) {
              return $this->goHome();
          }
      }

      return $this->render('createUser', [
          'model' => $model,
      ]);
    }

    public function actionDeleteUser($id = null)
    {
      $model = Target::findOne($id);

      if ($model === null) {
          throw new NotFoundHttpException('Not found user');
      };
      $model->delete();

      return $this->goHome();
    }

    public function actionDeleteTarget($id = null)
    {
      $model = HistoryAchiev::findOne($id);

      if ($model === null) {
          throw new NotFoundHttpException('Not found');
      };
      $model->delete();

      return $this->goBack();
    }

}
