/**
 * Created by Danny on 14-12-2016.
 */
'use strict';

//  define the 'landingPage' module
angular.module('landingPage', [])

    .controller('AppCtrl', function($scope, $mdDialog) {
        $scope.status = '  ';
        $scope.customFullscreen = false;

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