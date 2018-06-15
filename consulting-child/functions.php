<?php
if (is_admin()) {
    // Add action
    add_action('admin_menu', 'custom_remove_menu_pages');
}

/**
 * Remove admin menu
 */
function custom_remove_menu_pages() {
    remove_menu_page('wpseo_dashboard');
}

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_excerpt', 5);

add_action('wp_enqueue_scripts', 'consulting_child_enqueue_parent_styles');

function consulting_child_enqueue_parent_styles() {
    wp_enqueue_style('consulting-style', get_template_directory_uri() . '/style.css', array('bootstrap'), CONSULTING_THEME_VERSION, 'all');
    wp_enqueue_style('child-style', get_stylesheet_uri(), array('consulting-style'));
}

// As of WP 3.1.1 addition of classes for css styling to parents of custom post types doesn't exist.
// We want the correct classes added to the correct custom post type parent in the wp-nav-menu for css styling and highlighting, so we're modifying each individually...
// The id of each link is required for each one you want to modify
// Place this in your WordPress functions.php file

function remove_parent_classes($class) {
    // check for current page classes, return false if they exist.
    return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor' || $class == 'current-menu-item') ? false : true;
}

function add_class_to_wp_nav_menu($classes) {
    switch (get_post_type()) {
        case 'stm_service':
            // we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
            $classes = array_filter($classes, "remove_parent_classes");

            // add the current page class to a specific menu item (replace ###).
            if (in_array('menu-item-1121', $classes)) {
                $classes[] = 'current_page_parent';
            }
            break;

        // add more cases if necessary and/or a default
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'add_class_to_wp_nav_menu');

function ebim_add_facebook_pixel() {
?>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '1699618770323129');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1699618770323129&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<?php
}

add_action('wp_head', 'ebim_add_facebook_pixel');

function ebim_add_google_analytics() {
?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-81136915-1', 'auto');
  ga('send', 'pageview');

</script>
<?php
}

add_action('wp_head', 'ebim_add_google_analytics');

//icl_unregister_string ( 'Footer', 'Footer Text' );
//icl_register_string('Footer', 'Footer Text', 'BIM Hà Nội là một tổ chức chuyên nghiệp trong lĩnh vực tư vấn triển khai áp dụng công nghệ BIM, đào tạo và cung cấp các giải pháp tổng thể về BIM cho các doanh nghiệp.');

//icl_unregister_string ( 'Theme Mod', 'top_bar_info_2_phone' );
//icl_register_string ( 'Theme Mod', 'top_bar_info_1_phone', '(+84)24 668 41452' );
//icl_register_string ( 'Theme Mod', 'top_bar_info_1_hours', 'Mon - Sat 9h00 - 18h00 Sunday CLOSED' );
//icl_register_string ( 'Theme Mod', 'top_bar_info_1_address', 'Floor 2, Bach Anh Building, 52 Chua Ha street, Cau Giay district, Hanoi city' );
//icl_register_string ( 'Theme Mod', 'top_bar_info_1_office', 'Hanoi' );
//set_theme_mod('logo', 'http://bimhanoi.vn/wp-content/uploads/2017/03/logo-top.png');
//set_theme_mod('footer_logo', 'http://bimhanoi.vn/wp-content/uploads/2017/03/logo-footer.png');

// echo ini_get('memory_limit');