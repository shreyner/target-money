<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HistoryAchiev */
/* @var $form ActiveForm */
?>
<div class="my-addTarget">
    <h1 class="page-header">User: <small><?= $user->name ?></small></h1>
    <?php if ($user->terms_date >= date("Y-m-d")): ?>
      <?php $form = ActiveForm::begin([
          'options' => ['class' => 'form-horizontal'],
          'fieldConfig' => [
              'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
              'labelOptions' => ['class' => 'col-lg-1 control-label'],
          ],
        ]); ?>

          <?= $form->field($model, 'money')->input('number') ?>
          <?= $form->field($model, 'description') ?>

          <div class="col-md-3 col-md-offset-1">
            <div class="form-group">
                <?= Html::submitButton('Add', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
          </div>
      <?php ActiveForm::end(); ?>
    <?php else: ?>
      <p>Sorry, but your time is over.</p>
    <?php endif; ?>

</div><!-- my-addTarget -->
