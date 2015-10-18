<?php
use yii\helpers\Html;
?>
<h1 class="page-header">User view: <small><?= $model[0]->idTarget->name ?></small></h1>
<table class="table table-striped table-responsive">
  <thead>
    <tr>
      <th>№</th>
      <th>Description</th>
      <th>Money</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($model): ?>
      <?php foreach ($model as $key => $value): ?>
        <tr>
          <td class="col-md-3"><?= $key+1 ?></td>
          <td><?= $value->description ?></td>
          <td class="col-md-2"><?= $value->money ?></td>
          <td><?= $value->create_up ?></td>
          <td class="col-md-1"><?= Html::a('Delete',['delete-target','id'=>$value->id],['data-method'=>'post']); ?></td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td style="text-align:center">
          <h1>No record found</h1>
        </td>
      </tr>
    <?php endif; ?>

  </tbody>
</table>
