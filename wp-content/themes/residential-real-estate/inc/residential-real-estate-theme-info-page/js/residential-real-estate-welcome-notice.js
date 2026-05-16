(function ($) {
    "use strict";

    // Install + Activate button
    $("#install-activate-button").on("click", function (e) {
        e.preventDefault();

        var button = $(this);
        button.prop("disabled", true)
              .text("Installing & Activating recommended plugins…")
              .addClass("processing-spinner");

        $.post(residential_real_estate_localize.ajax_url, {
            action: "residential_real_estate_install_and_activate_plugins",
            nonce: residential_real_estate_localize.nonce
        }, function (response) {
            if (response.success) {
                window.location.href = residential_real_estate_localize.redirect_url;
            } else {
                button.text(response.data?.message || "Installation failed");
            }
        });
    });

})(jQuery);
