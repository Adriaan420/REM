'use strict';

//  define the 'REM' module used on the webpage.
angular.module('REM', [
    //  ...which depends on the 'landingPage' module
    'ngRoute',
    'ngMaterial',
    'ngMessages',
    'ngSanitize',
    'ngAria',
    'landingPage'
])