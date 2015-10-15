<?php
/* @var $this yii\web\View */
?>
<h1>my/index</h1>

<table class="table table-striped table-bordered table-responsive">
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
        <td><?= $value->name ?></td>
        <td><?= $value->itog ?>+<?= $value->target ?></td>
        <td>Создать</td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
