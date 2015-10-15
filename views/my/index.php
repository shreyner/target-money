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
        <td class="col-md-3"><?= $value->name ?></td>
        <!-- <td><?= $value->itog ?>+<?= $value->target ?></td> -->
        <td>
          <div class="progress progress-striped">
            <div class="progress-bar progress-bar-success" role="progressbar" style="width: <?php echo $value->itog /( $value->target / 100) ?>%;color:black;">
              <?= $value->itog ?>/<?= $value->target ?>
            </div>
          </div>
        </td>
        <td class="col-md-1">Добавить</td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
