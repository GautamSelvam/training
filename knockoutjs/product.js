require.config({
    baseUrl: '/',
    paths: {
        'knockout': 'https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.1/knockout-latest',
    },
});

require(['knockout',], function (ko) {
    function AppViewModel() {
        
        var self = this;
        
        self.localData = JSON.parse(window.localStorage.getItem('productDisplay'));

        self.backHome = function(){
            window.location.href = "index.html";
        }
    }
    ko.applyBindings(new AppViewModel());
});
