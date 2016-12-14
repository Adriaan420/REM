/**
 * Created by Danny on 14-12-2016.
 */
angular.
    module('REM').
    config(['$locationProvider', '$routeProvider',
        function config($locationProvider, $routeProvider) {
            $locationProvider.hashPrefix('!');

            $routeProvider.
            when('/landing-page', {
                template: '<landing-page></landing-page>'
            }).
            otherwise('/landing-page');
    }
]);