<form action="" method="POST" class="form-inline" role="form">

  <div class="form-group">
    <input class="form-control" ng-model="tk" placeholder="Input field">
  </div>

</form>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>STT</th>
      <th>Tên danh mục</th>
      <th>Trạng thái</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="c in cats | filter:{name:tk}">
      <td>{{$index+1}}</td>
      <td>{{c.name}}</td>
      <td>
        <span ng-show="c.status == 0" class="label label-danger">Ẩn</span>
        <span ng-show="c.status == 1"  class="label label-success">Hiện</span>
      </td>
      <td>
        <a ng-click="edit_cat(c)" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
        <a ng-click="del_cat(c.id)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
  </tbody>
</table>