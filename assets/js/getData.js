let search_form_input = document.getElementsByClassName('elementor-search-form__input')[0]
    search_form_input.setAttribute("autocomplete", "off")
    
let search_form_contain = document.getElementsByClassName('elementor-search-form__container')[0]

let boxsearch = jQuery('.box-search')[0]
let resultRow = jQuery('.result-row');    
let recentlyTitle = jQuery('.recently-title');
let recentlyResult = jQuery('.recently-result');

if (e.target == boxsearch || includes(resultRow,e.target) || includes(recentlyResult,e.target) || includes(recentlyTitle,e.target) || e.target == boxClicked) {
    jQuery(searchInput).addClass('search-box-active')
    jQuery('.box-search').addClass("box-search-active");
} else {
    jQuery(searchInput).removeClass('search-box-active');
    jQuery('.box-search').removeClass("box-search-active");
}




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