// Here we get the module we created in file one
angular.module('myApp.controllers')
// We are adding a function called AllImagesCtrl
// to the module we got in the line above
        .controller('ImagesCtrl', ImagesCtrl);
// Inject my dependencies
ImagesCtrl.$inject = ['$scope', '$http'];

// Now create our controller functions with all necessary logic
function ImagesCtrl($scope, $http) {
    var CityName;
    var StatePark;
    var theImageID;
    var apiURL;

    apiURL = getAPIPath();
    CityName = getParameterByName('City');
    StatePark = getParameterByName('StatePark');
    theImageID = getParameterByName('ImageID');
    if (StatePark) {
        $http.get(apiURL + "?StatePark=" + StatePark)
                .success(function (response) {
                    $scope.images = response;
                });
    } else if (CityName) {
        $http.get(apiURL + "?City=" + CityName)
                .success(function (response) {
                    $scope.images = response;
                });
    } else if (theImageID) {
        $http.get(apiURL + "?ImageID=" + theImageID)
                .success(function (response) {
                    $scope.image = response;
                });
    }
}

function getParameterByName(name) {
    var match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
    return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
}

function getAPIPath() {
    var baseurl = window.location.origin;

    if (baseurl.indexOf("localhost") > 0) {
        baseurl = baseurl + "/SRPhotography";
    }
    baseurl = baseurl + "/api/images.php";
    return baseurl;
}
