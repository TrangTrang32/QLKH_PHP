var app = angular.module('app',[]);
var api = 'http://localhost:86/c1812m-prj/api/';
app.controller('AppCtrl',function($scope, $http){
	$http.get(api+'category.php').then(function(r){
		$scope.cats = r.data
	});

	$http.get(api+'product.php').then(function(r){
		$scope.products = r.data
	});

	$scope.get_pro_by_cat = function(cid){
		$http.get(api+'product.php?cat_id='+cid).then(function(r){
			$scope.products = r.data
		});
	}
});