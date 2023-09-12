require.config({
    baseUrl: '/',
    paths: {
        'knockout': 'https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.1/knockout-latest',
    },
});
require(['knockout'], function (ko) {
    var self = this;
    function AppviewModel() {
        // this.cartItems = JSON.parse(window.localStorage.getItem('cartItems'));
        self.cartItems = JSON.parse(window.localStorage.getItem('cartItems'));

    }
    self.backToHome = function(){
        window.location.href = "index.html";
    }

    ko.applyBindings(new AppviewModel());

});