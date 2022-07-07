jQuery('.elementor-search-form__input').on('change', function() {
    if (this.value.length > 2) {
        jQuery.ajax({
            type: "post",
            // It must changed to /wp-admin/admin-ajax.php
            url: "http://localhost/wordpress/wp-admin/admin-ajax.php",
            data: {
                action: 'searchFormText',
                data: this.value
            },
            dataType: "json",
            success: function(response) {
                console.log(response)
            },
            error: function(response) {
            }
        });
    };
});