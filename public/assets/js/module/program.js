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
	  
	 // ($scope.newTask.start.getTime()/1000) - (new Date().getTimezoneOffset()*60), //force local time into the server
	 $scope. progam = [];
	 $scope.add = function(){
		$scope.success = false;
		$scope.error = false;
		var params = {
				start :  ($scope.dt_start.getTime()/1000) - (new Date().getTimezoneOffset()*60),
				end :  ($scope.dt_end.getTime()/1000) - (new Date().getTimezoneOffset()*60),
				activity : $scope.program.activity,
				barangay : $scope.program.barangay,
				subActivity : $scope.program.subActivity,
				cost : $scope.program.cost,
				program : vars.program.id,
				qty : $scope.program.qty,
		}
		
		$http.post(vars.post_program_detail, params).success(function (data) {

			console.log(data);
			if(data){
				$scope.error = true;
			}else{
				$scope.success = true;
			}
		});
		
		console.log(params);
		
	 }
});

