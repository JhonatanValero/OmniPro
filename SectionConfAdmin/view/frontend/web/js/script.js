requirejs([
    'jquery',
    'underscore'
], function ($, _){
    var blogs = "/rest/V1/blogs?searchCriteria";

    $.ajax({
        url: blogs  
    }),done(function (response) {
        console.log(response);
    })
})