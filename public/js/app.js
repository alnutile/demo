(function(){
    'use strict';

    angular.module('app', ['ngResource']);

    angular.module('app').run(
        function($http)
        {
            $http.defaults.headers.common.Accept = 'application/json';
        }
    );

    function MainController($resource, $http)
    {
        var vm = this;
        activate();

        function activate()
        {
            $http.get('/blogs').success(function(data) {
                showBlogs(data);
            });

            console.log('active');
        }

        function showBlogs(data)
        {
            console.log(data);
            vm.blogs = data.data;

        }
    }


    angular.module('app')
        .controller('MainController', MainController);


})();