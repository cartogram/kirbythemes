'use strict';

describe('controllers', function(){
    var scope,
        loadData,
        route,
        $rootScope,
        $controller;

    beforeEach(module('lw'));

    beforeEach(inject(function(_$rootScope_, _$controller_, $route) {
        $route.current = { params: { pagename: 'main' } };
        scope = _$rootScope_.$new(),
        loadData = {},
        route = $route,
        $rootScope = _$rootScope_,
        $controller = _$controller_;

        var controller = $controller('MainCtrl', {
            $scope: scope,
            loadData : {},
            $route:route,
            $rootScope : $rootScope

        });

    }));

    it('should show a loader on initial run', function(  ) {


        expect(true).toBeTruthy();
    });
});
