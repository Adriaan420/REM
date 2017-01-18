/**
 * Created by Danny on 14-12-2016.
 */
'use strict';

var app = angular.module('landingPage', ['ngMaterial','ngMessages','ui.bootstrap','ngSanitize'])
//  define the 'landingPage' module

        app.controller('AppCtrl', function($scope, $sce) {
        $scope.status = '  ';
        $scope.customFullscreen = false;
        $scope.htmlPopover = $sce.trustAsHtml();

        $scope.showAlert = function (ev) {
            // Appending dialog to document.body to cover sidenav in docs app
            // Modal dialogs should fully cover application
            // to prevent interaction outside of dialog
            $mdDialog.show(
                $mdDialog.alert()
                    .parent(angular.element(document.querySelector('#popupContainer')))
                    .clickOutsideToClose(true)
                    .title('Coal Power')
                    .textContent('Dit project geeft mij een ernstige hersentumor')
                    .ariaLabel('Alert Dialog Demo')
                    .targetEvent(ev)
            );
        };
    });
        app.controller('SideMenu', function ($scope, $timeout, $mdSidenav) {
        $scope.toggleLeft = buildToggler('left');
        $scope.toggleRight = buildToggler('right');

        function buildToggler(componentId) {
            return function() {
                $mdSidenav(componentId).toggle();
            }
        }
    });

