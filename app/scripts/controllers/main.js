'use strict';

angular.module('qparkApp')
  .controller('MainCtrl', function ($scope) {

    $scope.showLogin = false;

    $scope.login = function() {

			$.ajax({
				type: "GET",
				url: '../../api/controller/loginTest.php?action=login&email=test@that.com&password=pass',
				aysnc: false,
				success: function(result){
					console.log("success");
				}
			});
	};
  });
