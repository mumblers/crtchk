(function ($) {
    "use strict";
    var mainApp = {

        initFunction: function () {
            $('#main-menu').metisMenu();
			
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });

            $('.datatable').DataTable();
        },

        initialization: function () {
            mainApp.initFunction();
        }
    };

    $(document).ready(function () {
        mainApp.initFunction();
    });

}(jQuery));
