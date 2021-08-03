var app = angular.module('app',[]);
var api ='http://localhost:86/c1812m-prj/api/';
var config = {
	headers: {
		"Content-Type": "application/x-www-form-urlencoded;charset=utf-8"
	},
	transformRequest: function(data) {
	    var parsed = [];
	    angular.forEach(data, function(value, key) {
	      parsed.push(encodeURIComponent(key) + '=' + encodeURIComponent(value));
	    });

	    return parsed.join('&');
	}
};
app.controller('AppCtrl',function($scope, $http){

	function get_cat(){
		$http.get(api+'category.php?action=get')
		.then(function(r){
			$scope.cats = r.data;
			console.log($scope.cats)
		});
	}
	
	get_cat();
	$scope.add_cat = function(){
		$http.post(api+'category.php?action=add',$scope.cat,config)
		.then(function(r){
			// console.log(r);
			get_cat();
			toastr.success('Thêm mới thành công','Success!');
		});
	}


	$scope.del_cat =function(id){
		if (confirm("Bạn có chức không ?")) {
			$http.get(api+'category.php?action=del&id='+id)
			.then(function(r){
				get_cat();
				toastr.success('Xóa thành công','Success!');
			});
		}
	}

	$scope.edit_cat = function(c){
		$scope.cat = c;
	}

	$scope.update_cat = function(){
		$http.post(api+'category.php?action=update',$scope.cat,config)
		.then(function(r){
			// console.log(r);
			get_cat();
			toastr.success('Thêm mới thành công','Success!');
		});
	}
})