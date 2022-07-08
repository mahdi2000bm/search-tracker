function includes(result_row, key) {
    for (let i = 0; i < result_row.length; i++)
        if (result_row[i] === key)
            return true;
    return false
}
let jq = jQuery

let search_form_input = document.getElementsByClassName('elementor-search-form__input')[0]
    search_form_input.setAttribute("autocomplete", "off")
    
let search_form_contain = document.getElementsByClassName('elementor-search-form__container')[0]
let boxsearch = document.getElementsByClassName('box-search')[0]

    jq(search_form_input).click(function(){
        jq(this).addClass('search-box-active')
        jq(boxsearch).addClass("box-search-active")
    })
    
    jq(window).click(function(event) {

        if (event.target == boxsearch || event.target == search_form_input) {
            jQuery(search_form_contain).addClass('search-box-active')
            jQuery(boxsearch).addClass("box-search-active");
            
        } else {
            jQuery(search_form_contain).removeClass('search-box-active');
            jQuery(boxsearch).removeClass("box-search-active");
        }
    })