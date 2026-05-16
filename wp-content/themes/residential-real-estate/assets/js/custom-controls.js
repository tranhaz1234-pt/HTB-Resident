(function(api) {

    api.sectionConstructor['residential-real-estate-buynow'] = api.Section.extend({
        attachEvents: function() {},
        isContextuallyActive: function() {
            return true;
        }
    });

})(wp.customize);