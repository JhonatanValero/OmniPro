define([
    'jquery',
    'uiComponent',
    'mage/storage',
    'mage/url',
    'mage/validation'
], function ($, Component, storage, url) {
    url.setBaseUrl(window.BASE_URL);
    return Component.extend({
        defaults: {
            // Observable indivdual
            // textoPrueba: ko.component("Texto Prueba")
            textoPrueba: 'Texto 01',
            variable01: 25,

            info: 'A totally false statement',

            title: '',
            content: '',
            email: '',
            img: '',
            imgBase64: '',
            blogs: [],

            blogsUrl: "rest/V1/blogPost?searchCriteria",
            blogsSetUrl: "rest/V1/blogSetPost"

        },

        //Constructor
        initialize: function () {
            this._super();
            this.getBlogs();
            //this.setBlogs();
            //this.titulo.subscribe(function(value) { console.log(value) });
            var self = this;
            setTimeout(function () {
                self.textoPrueba("Texto 02");
            }, 2000);
            return this;
        },

        initObservable: function () {
            this._super()
                .observe([
                    'variable01',
                    'textoPrueba',

                    'title',
                    'content',
                    'email',
                    'img',
                    'imgBase64'
                ])
                .observe({
                    blogs: []
                })
            return this;
        },

        changeImage: function(data, event){
            var image = event.target.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = $.proxy(function(e){
                var base64 = reader.result
                        .replace("data;", "")
                        .replace(/^.+,/, "")
                this.imageBase64(base64);
            }, this);
        },

        setBlogs: function () {
            var blogData = {
                "blog": {
                    "title": this.title(),
                    "email": this.content(),
                    "content": this.email(),
                    "img": "",
                    "extension_attributes": {
                        "image": {
                            "name": "prueba_imagen.png",
                            "base64_data": this.imgBase64(),
                            "type": "image/png"
                        }
                    }
                }
            };
            storage.post(this.blogsSetUrl, JSON.stringify(blogData))
                .then($.proxy(function () {
                    this.getBlogs();
                }, this));
        },

        getBlogs: function() {
            storage.get(this.blogsUrl)
            .then($.proxy(function(data) {
                this.blogs(data.items);
            },this));
        },

        cambiarVariable01: function () {
            this.variable01(0);
        },
    });
}
);
