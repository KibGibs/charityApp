var app = angular.module('app')

.controller('programCtrl', function programCtrl($scope, $http){
	$scope.barangay = vars.barangay;
	$scope.activity = vars.activity;
	$scope.subActivity = [];
	
	$scope.selectedActivity = function(id) {
		$http.get(vars.get_sub_activity_url.replace(':id:', id)).success(function(data) {
			$scope.subActivity = data;
		});
	}
	//Datepicker
	 $scope.today = function() {
		$scope.dt_start = new Date();
	  };
	  $scope.today();
	  
	  $scope.$watch('dt_start', function() {
		$scope.dt_end = new Date($scope.dt_start);
		$scope.minDate_end = new Date($scope.dt_start);
	 });
	 
	  // Disable weekend selection
	  $scope.disabled = function(date, mode) {
		return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
	  };

	  $scope.toggleMin = function() {
		$scope.minDate_start = $scope.minDate_start ? null : new Date();
	  };
	  $scope.toggleMin();

	  $scope.open = function($event) {
		$event.preventDefault();
		$event.stopPropagation();

		$scope.opened = true;
	  };

	  $scope.dateOptions = {
		formatYear: 'yy',
		startingDay: 1
	  };

	  $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
	  $scope.format = $scope.formats[0];
});

