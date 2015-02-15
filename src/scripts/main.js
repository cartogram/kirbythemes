'use strict';

(function() {
    'use strict';

    angular.module('kt', [

    ])

    .run(function($log, $rootScope) {
        $rootScope.isReady = true;
        $rootScope.isLoaded = true;
        FastClick.attach(document.body);
    })

    .directive('ktSetBackground', function() {
        return function(scope, element, attrs){
                element.css({
                    'background-color': Please.make_color()
                });
        };
    })

    ;


})();
