<?php

add_theme_support('woocommerce');

// Display 24 products per page
add_filter('loop_shop_per_page', create_function('$cols', 'return 24;'), 20);

// Removes products count after categories name
add_filter('woocommerce_subcategory_count_html', 'woo_remove_category_products_count');
function woo_remove_category_products_count()
{
    return;
}

// remove ordering
// remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// search result
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

// star ratings
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

// price everywhere
// add_filter('woocommerce_variable_sale_price_html', 'chartafolium_remove_prices', 10, 2);
// add_filter('woocommerce_variable_price_html', 'chartafolium_remove_prices', 10, 2);
// add_filter('woocommerce_get_price_html', 'chartafolium_remove_prices', 10, 2);
//
// function chartafolium_remove_prices($price, $product)
// {
//     $price = '';
//
//     return $price;
// }

// remove related products from single product page
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// remove breadcrumb on single product page
remove_action('woocommerce_before_main_content',
'woocommerce_breadcrumb', 20);

// remove single product meta elements
remove_action('woocommerce_single_product_summary',
'woocommerce_template_single_meta', 40);

// remove cart everywhere
// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

// tabs
add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

function woo_remove_product_tabs($tabs)
{
    unset($tabs['description']);          // Remove the description tab
    unset($tabs['reviews']);            // Remove the reviews tab
    unset($tabs['additional_information']);    // Remove the additional information tab

    return $tabs;
}

// add excerpt to archive page
add_action('woocommerce_archive_excerpt', 'woocommerce_template_single_excerpt', 11);

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns()
    {
        return 3; // 3 products per row
    }
}
