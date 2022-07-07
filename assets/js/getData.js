/* Get serached text user in search input */
jQuery('.elementor-search-form__input').on('change', function() {
    if (this.value.length > 2) {
		// jQuery('#searchText h2').html('در حال ارسال نتیجه...');
        jQuery.ajax({
            type: "post",
            url: "/wp-admin/admin-ajax.php",
            data: {
                action: 'searchFormText',
                data: this.value
            },
            dataType: "json",
            success: function(response) {
                console.log(response)
                // jQuery('#searchText h2').html(response.responseText);
            },
            error: function(response) {
                // jQuery('#searchText h2').html(response.responseText);
            }
        });
    };
});