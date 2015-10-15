<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HistoryAchiev */
/* @var $form ActiveForm */
?>
<div class="my-addTarget">
    <h1 class="page-header">User: <small><?= $user->name ?></small></h1>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'money') ?>
        <?= $form->field($model, 'description') ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- my-addTarget -->
