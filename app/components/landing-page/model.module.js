/**
 * Created by Danny on 14-12-2016.
 */
'use strict';

var app = angular.module('landingPage', ['ngMaterial','ngMessages','ui.bootstrap','ngSanitize'])
//  define the 'landingPage' module

        app.controller('SideMenu', function ($scope, $timeout, $mdSidenav) {
        $scope.toggleLeft = buildToggler('left');
        $scope.toggleRight = buildToggler('right');

        function buildToggler(componentId) {
            return function() {
                $mdSidenav(componentId).toggle();
            }
        }
    });