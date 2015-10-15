<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<h1>my/index</h1>
<p>
  <?= Html::a('Create new User',['create-user'],['class'=>'btn btn-primary']) ?>
</p>
<table class="table table-striped table-responsive">
  <thead>
    <tr>
      <th>Name</th>
      <th>Process</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($model as $key => $value): ?>
      <tr>
        <td class="col-md-3"><?= $value->name ?></td>
        <!-- <td><?= $value->itog ?>+<?= $value->target ?></td> -->
        <td>
          <div class="progress progress-striped">
            <div class="progress-bar progress-bar-success" role="progressbar" style="width: <?php echo $value->itog /( $value->target / 100) ?>%;color:black;">
              <?= $value->itog ?>/<?= $value->target ?>
            </div>
          </div>
        </td>
        <td class="col-md-2"><?= Html::a('Add',['add-target','id'=>$value->id]) ?> <?= Html::a('View',['view-target','id'=>$value->id]) ?> <?= Html::a('Settings',['settings','id'=>$value->id]) ?> <?= Html::a('Delete',['delete-user','id'=>$value->id],['data-method'=>'post']); ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
