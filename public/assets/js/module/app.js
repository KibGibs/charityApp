angular.module('app',['ui.bootstrap'])
.run(function($http){
	$http.defaults.headers.common['X-Requested-With']='XMLHttpRequest';
});
