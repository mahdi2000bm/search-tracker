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

    /*
    *GET last product for row one serach box
    */
    jq.ajax({
        type: "post",
        url: "http://localhost/wordpress/wp-admin/admin-ajax.php",
        data: {
            action: 'get_last_products'
        },
        dataType: "json",
        success: function (response) {
            console.log(response)
        },
        error: function(response) {
            setLastProducts(response)
        }
    });

    let products
    let lastproduct_row = document.getElementById('lastproduct3021')

        function setLastProducts(value){    
            let lastProducts = value.responseText
            let lastProductsOBJ = lastProducts.split("||")
            delete lastProductsOBJ[lastProductsOBJ.length - 1 ]

            lastProductsOBJ.forEach((response) => {
                let lastProductSplit = response.split("|-|")
                console.log(lastProductSplit[0])
                console.log(lastProductSplit[1])
                console.log(lastProductSplit[2])
                
                jq(lastproduct_row).append(`<a href=${lastProductSplit[3]}" class="item-flex"><div class="productimg"><img src="${lastProductSplit[0]}" alt=""></div><p>${lastProductSplit[2]}</p></a>`)
            });
        }