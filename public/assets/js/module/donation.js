var app = angular.module('app')

.controller('donationCtrl', function programCtrl($scope, $http){
	$scope.programs = vars.programs;
	$scope.donate = {};

	$scope.selectedProgram = function(program) {	
		$scope.loading = true;
		$scope.activities = [];
		$http.get(vars.get_activity_url.replace(':id:', program)).success(function(data) {
			$scope.activities = data;
			$scope.loading = false;
			console.log(data);
		});
	}

	$scope.submitDonation = function(){
		var params = angular.copy($scope.donate);
		$http.post(vars.post_donation_detail, params).success(function (data) {

			console.log(data);
			 if(data){
			 	$scope.error = true;
			 }else{
			 	$scope.success = true;
			 	$scope.donate = [];
			 }
		});
		console.log(params);
	}
});

