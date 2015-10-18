<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Target */
/* @var $form ActiveForm */
?>
<div class="row">

  <h1 class="page-header">Create/Settings user</h1>
  <div class="my-createUser">

      <?php $form = ActiveForm::begin([
          'options' => ['class' => 'form-horizontal'],
          'fieldConfig' => [
              'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
              'labelOptions' => ['class' => 'col-lg-1 control-label'],
          ],
        ]); ?>

          <?= $form->field($model, 'name') ?>
          <?= $form->field($model, 'target')->input('number') ?>
          <?= $form->field($model, 'create_up')->input('date') ?>
          <?= $form->field($model, 'terms_date')->input('date') ?>

          <div class="col-lg-3 col-lg-offset-1">
            <div class="form-group">
                <?= Html::submitButton('Create', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
          </div>
      <?php ActiveForm::end(); ?>

  </div><!-- my-createUser -->
</div>
