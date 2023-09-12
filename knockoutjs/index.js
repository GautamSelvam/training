require.config({
    paths: {
        'knockout': 'https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.1/knockout-latest',
    },
});

require(['knockout'], function (ko) {
    function Product(name, price, imageUrl, features,description, category) {
        this.name = name;
        this.price = price;
        this.imageUrl = imageUrl;
        this.features = features;
        this.description =description;
        this.category = category;
    }

    function ProductListViewModel() {
        var self = this;
        var totalcount = JSON.parse(localStorage.getItem('totalcount'));
        // console.log(typeof(totalcount));
        var checkcart = localStorage.getItem('cartItems');
        if(checkcart){
            self.Counter = ko.observable(totalcount);
        }
        else{
            self.Counter =ko.observable(0);
        }
       
          // self.cartItems = ko.observableArray([]);
          self.cartItems = ko.observableArray(JSON.parse(localStorage.getItem('cartItems')) || []); 
          //The cart products gets removed every refresh if i'm storing cartItems as an empty array

        self.selectedCategory = ko.observable("all"); 

        self.products = ko.observableArray([
            new Product("Iphone 14", 100000, "https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcSg4ZMGMjdQCSFH-B7dCxd-ut3QlNK1IzlLFGE_cTytDhzolYM",
            '6 GB RAM | 128 GB ROM | 17.25cm (6.79 inch) Full HD Display | 50MP + 2MP 8MP Front Camera',
            "This 5G smartphone features a 6.67 inches OLED display panel with an immersive 120Hz refresh rate", "mobiles"),
            new Product("Samsung f04", 20000, "https://m.media-amazon.com/images/I/51gmH37vILL._AC_UF894,1000_QL80_.jpg",
            '6 GB RAM | 128 GB ROM | 17.25cm (6.79 inch) Full HD Display | 50MP + 2MP 8MP Front Camera',
            "SAMSUNG GALAXY F04 has enough RAM with 4 GB...", "mobiles"),
            new Product("Redmi note 12 pro", 30000, "images/mi.jpg",
            '6 GB RAM | 128 GB ROM | 17.25cm (6.79 inch) Full HD Display | 50MP + 2MP 8MP Front Camera',
            "This 5G smartphone features a 6.67 inches OLED display panel with an immersive 120Hz refresh rate, HDR10+ support, and 500-900 nits brightness rating. This smartphone has dust and water-resistant support","mobiles"),
            new Product("Oneplus 11r",40000, "images/oneplus-11r.webp",
            '6 GB RAM | 128 GB ROM | 17.25cm (6.79 inch) Full HD Display | 50MP + 2MP 8MP Front Camera',
            "The oneplus 11r, but there's a new 6.7-inch model called the iPhone 14 Plus. Under-the-hood improvements include 6GB of RAM, a 5-core GPU, Bluetooth 5.3, and multiple camera updates. Color options have been updated with (PRODUCT)RED, blue, purple, midnight, and starlight.","mobiles"),
            new Product("Oppo F21 pro", 20000, "images/oppo-f21-pro.jpg",
            '6 GB RAM | 128 GB ROM | 17.25cm (6.79 inch) Full HD Display | 50MP + 2MP 8MP Front Camera',
            "Oppo F21 pro has enough RAM with 4 GB. Not too big, but still enough for some multitasking applications. Strength of SAMSUNG GALAXY F04 screen use big screen 6.5 inches LCD size, but it only can work with 720p resolution. Pros of SAMSUNG GALAXY F04 has big battery capacity at 5000 mAh.","mobiles"),
            new Product("Apple ipda", 30000, "https://images.unsplash.com/photo-1517336714731-489689fd1ca8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8YXBwbGUlMjBsYXB0b3B8ZW58MHx8MHx8fDA%3D&w=1000&q=80",
            '(8 GB/512 GB SSD/Windows 11 Home) New Inspiron 15 Laptop Thin and Light Laptop  (38 cm, Carbon Black, 1.65 Kg, With MS Office)',
            "This 5G smartphone features a 6.67 inches OLED display panel with an immersive 120Hz refresh rate, HDR10+ support, and 500-900 nits brightness rating. This smartphone has dust and water-resistant support",
            "laptop"),
            new Product("Dell 16S",100000, "https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/dell-client-products/notebooks/g-series/g16-7630/media-gallery/black/notebook-g16-7630-nt-black-gallery-1.psd?fmt=pjpg&pscan=auto&scl=1&wid=3500&hei=2625&qlt=100,1&resMode=sharp2&size=3500,2625&chrss=full&imwidth=5000",
            '(8 GB/512 GB SSD/Windows 11 Home) New Inspiron 15 Laptop Thin and Light Laptop  (38 cm, Carbon Black, 1.65 Kg, With MS Office)',
            "The Vivo y16, but there's a new 6.7-inch model called the iPhone 14 Plus. Under-the-hood improvements include 6GB of RAM, a 5-core GPU, Bluetooth 5.3, and multiple camera updates. Color options have been updated with (PRODUCT)RED, blue, purple, midnight, and starlight.",
            "laptop"),
            new Product("Dell 5520 k", 20000, "https://www.reliancedigital.in/medias/Dell-5520-Laptops-492850230-i-1-1200Wx1200H?context=bWFzdGVyfGltYWdlc3w0NDQ0OTd8aW1hZ2UvanBlZ3xpbWFnZXMvaGE3L2hjNy85ODQ0NTMyMTgzMDcwLmpwZ3wwM2Y1ZDlkZDQ4NjJlYTI1MjBjMmI4YTEwNzYyODI1YWYyNTE0MmU0YjVjNjIzYmY4NTk0NWFiMDJiZWNmNmNh",
            '(8 GB/512 GB SSD/Windows 11 Home) New Inspiron 15 Laptop Thin and Light Laptop  (38 cm, Carbon Black, 1.65 Kg, With MS Office)',
            "SAMSUNG GALAXY F04 has enough RAM with 4 GB. Not too big, but still enough for some multitasking applications. Strength of SAMSUNG GALAXY F04 screen use big screen 6.5 inches LCD size, but it only can work with 720p resolution. Pros of SAMSUNG GALAXY F04 has big battery capacity at 5000 mAh.",
            "laptop"),
            new Product("lenovo ideapad", 30000, "https://www.reliancedigital.in/medias/Dell-5520-Laptops-492850230-i-1-1200Wx1200H?context=bWFzdGVyfGltYWdlc3w0NDQ0OTd8aW1hZ2UvanBlZ3xpbWFnZXMvaGE3L2hjNy85ODQ0NTMyMTgzMDcwLmpwZ3wwM2Y1ZDlkZDQ4NjJlYTI1MjBjMmI4YTEwNzYyODI1YWYyNTE0MmU0YjVjNjIzYmY4NTk0NWFiMDJiZWNmNmNh",
            '(8 GB/512 GB SSD/Windows 11 Home) New Inspiron 15 Laptop Thin and Light Laptop  (38 cm, Carbon Black, 1.65 Kg, With MS Office)',
            "This 5G smartphone features a 6.67 inches OLED display panel with an immersive 120Hz refresh rate, HDR10+ support, and 500-900 nits brightness rating. This smartphone has dust and water-resistant support",
            "laptop"),
            new Product("Acer Gaming laptop", 30000, "https://m.media-amazon.com/images/I/61xDecjHpUL._AC_UF1000,1000_QL80_.jpg",
            '16 GB/512 GB SSD/Windows 11 Home) 15s-fr4001TU Thin and Light Laptop  (15.6 Inch, Natural Silver, 1.69 Kg, With MS Office)',
            "This 5G smartphone features a 6.67 inches OLED display panel with an immersive 120Hz refresh rate, HDR10+ support, and 500-900 nits brightness rating. This smartphone has dust and water-resistant support",
            "laptop"),
            new Product("Sony TV",100000, "https://www.mylloyd.com/media/products/zoom21811.jpg",
            '(8 GB/512 GB SSD/Windows 11 Home) New Inspiron 15 Laptop Thin and Light Laptop  (38 cm, Carbon Black, 1.65 Kg, With MS Office)',
            "The Vivo y16, but there's a new 6.7-inch model called the iPhone 14 Plus. Under-the-hood improvements include 6GB of RAM, a 5-core GPU, Bluetooth 5.3, and multiple camera updates. Color options have been updated with (PRODUCT)RED, blue, purple, midnight, and starlight.",
            "tv"),
            new Product("Redmi TV", 20000, "https://instorestatic.tcl.com/media/catalog/product/0/1/01.png",
            '(8 GB/512 GB SSD/Windows 11 Home) New Inspiron 15 Laptop Thin and Light Laptop  (38 cm, Carbon Black, 1.65 Kg, With MS Office)',
            "SAMSUNG GALAXY F04 has enough RAM with 4 GB. Not too big, but still enough for some multitasking applications. Strength of SAMSUNG GALAXY F04 screen use big screen 6.5 inches LCD size, but it only can work with 720p resolution. Pros of SAMSUNG GALAXY F04 has big battery capacity at 5000 mAh.",
            "tv"),
            new Product("Sony Camera", 30000, "https://i.pinimg.com/1200x/e7/5d/db/e75ddbda351d44e24b6b8099fa200aad.jpg",
            '(8 GB/512 GB SSD/Windows 11 Home) New Inspiron 15 Laptop Thin and Light Laptop  (38 cm, Carbon Black, 1.65 Kg, With MS Office)',
            "This 5G smartphone features a 6.67 inches OLED display panel with an immersive 120Hz refresh rate, HDR10+ support, and 500-900 nits brightness rating. This smartphone has dust and water-resistant support",
            "camera"),
            new Product("Canon Camera", 30000, "https://m.media-amazon.com/images/I/914hFeTU2-L._AC_UF1000,1000_QL80_.jpg",
            '16 GB/512 GB SSD/Windows 11 Home) 15s-fr4001TU Thin and Light Laptop  (15.6 Inch, Natural Silver, 1.69 Kg, With MS Office)',
            "This 5G smartphone features a 6.67 inches OLED display panel with an immersive 120Hz refresh rate, HDR10+ support, and 500-900 nits brightness rating. This smartphone has dust and water-resistant support",
            "camera"),
        ]);

        self.filteredProducts = ko.computed(function () {
            var selectedCategory = self.selectedCategory();
            console.log("Selected category:", selectedCategory);
            if (selectedCategory === "all") {
                return self.products();
            } else {
                return ko.utils.arrayFilter(self.products(), function (product) {
                    console.log("Product category:", product.category);
                    return product.category === selectedCategory;
                });
            }
        });
        
        

        self.showdata = function (product) {
            window.location.href = "product.html";
            localStorage.setItem('productDisplay', JSON.stringify(product));
        };
       

        self.additem = function (product) {
            var existingItem = ko.utils.arrayFirst(self.cartItems(), function (item) {
                return item.name === product.name;
            });
            self.Counter(self.Counter() + 1);

            console.log(self.Counter());

            if (existingItem) {
                existingItem.count += 1;
                existingItem.price = existingItem.count * product.price;
            } else {
                self.cartItems.push({
                    image: product.imageUrl,
                    name: product.name,
                    price: product.price,
                    count: 1,
                });
            }

            localStorage.setItem('cartItems', JSON.stringify(self.cartItems()));
            localStorage.setItem('totalcount',self.Counter());
        };

        self.pageSize = 3;
        self.currentPageIndex = ko.observable(0);

        self.maxPageIndex = ko.computed(function () {
            return Math.ceil(self.filteredProducts().length / self.pageSize) - 1;
        });

        self.pagedProducts = ko.computed(function () {
            var startIndex = self.pageSize * self.currentPageIndex();
            return self.filteredProducts().slice(startIndex, startIndex + self.pageSize);
        });

        self.paginationNumbers = ko.computed(function () {
            var pages = [];
            for (var i = 0; i <= self.maxPageIndex(); i++) {
                pages.push(i + 1);
            }
            return pages;
        });

        self.previousPage = function () {
            if (self.currentPageIndex() > 0) {
                self.currentPageIndex(self.currentPageIndex() - 1);
            }
        };

        self.nextPage = function () {
            if (self.currentPageIndex() < self.maxPageIndex()) {
                self.currentPageIndex(self.currentPageIndex() + 1);
            }
        };

        self.goToPage = function (pageIndex) {
            self.currentPageIndex(pageIndex - 1);
        };

        self.isActivePage = function (pageIndex) {
            return self.currentPageIndex() === (pageIndex - 1);
        };

        self.BackToFirstPage =function(){
            window.location.href='index.html';
        }
    }


    ko.applyBindings(new ProductListViewModel());
});
