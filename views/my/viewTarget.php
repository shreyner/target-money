<h1 class="page-header">User view: <small><?= $model[0]->idTarget->name ?></small></h1>
<table class="table table-striped table-bordered table-responsive">
  <thead>
    <tr>
      <th>№</th>
      <th>Description</th>
      <th>Money</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($model as $key => $value): ?>
      <tr>
        <td class="col-md-3"><?= $value->id ?></td>
        <td><?= $value->description ?></td>
        <td class="col-md-2"><?= $value->money ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
