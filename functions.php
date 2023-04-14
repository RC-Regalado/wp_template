<?php
// Estilo woocommerce {{{
function cargar_estilo_personalizado()
{
    wp_enqueue_style('estilo-personalizado', get_template_directory_uri() . '/css/commerce.css');
}
add_action('wp_enqueue_scripts', 'cargar_estilo_personalizado');
// }}}
add_filter('woocommerce_checkout_fields', 'checkout_override');
function checkout_override($fields)
{
    unset($fields['order']['order_comments']);

    return $fields;
}

// add_filter( 'the_content', 'custom_login' );

function styles_loader()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . "/css/bootstrap.min.css");
    wp_enqueue_style('fs', get_template_directory_uri() . "/css/font-awesome.min.css");
    wp_enqueue_style('elegant', get_template_directory_uri() . "/css/elegant-icons.css");
    wp_enqueue_style('nice', get_template_directory_uri() . "/css/nice-select.css");
    wp_enqueue_style('jqueryui', get_template_directory_uri() . "/css/jquery-ui.min.css");
    wp_enqueue_style('slicknav', get_template_directory_uri() . "/css/slicknav.min.css");
    wp_enqueue_style('style', get_template_directory_uri() . "/style.css");
}

add_action('wp_enqueue_scripts', 'styles_loader');

function custom_login($content)
{
    $logo = get_template_directory_uri().'/logo.png';
    if (is_page(get_page_by_title('login')->ID)) {
        $action = isset($_GET['action']) ? $_GET['action'] : '-';

        if (is_user_logged_in()) {
            return $content;
        } elseif ($action == 'register') {
            get_template_part('register.php');
        } else { ?>
            <div class ="login-form" >
            	<img id="rlogo"  src="<?= $logo ?>" alt="" width="75" style="margin: 5px 0 25px 0;" >

<?php
            wp_login_form(
            array(
                                'echo' => true ,
                                'redirect'       => (is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] .'/' ,
                                       'label_username' => __('Nombre de usuario '),
                                       'label_password' => __('Contraseña'),
                                       'label_remember' => __('Recuérdame')
                            )
        );
            ?>
            </div>
<?php
        }
    } else {
        return $content;
    }
}

function custom_register($content)
{
    $logo = get_template_directory_uri().'/logo.png';
    if (is_page(get_page_by_title('register')->ID)) {
        if (is_user_logged_in()) {
            return $content;
        } else {
            get_template_part('register.php');
        }
    } else {
        return $content;
    }
}



add_action('wp_login_failed', 'my_front_end_login_fail');
function my_front_end_login_fail($username)
{
    $referrer = $_SERVER['HTTP_REFERER'];
    if (!empty($referrer) && !strstr($referrer, 'wp-login') && !strstr($referrer, 'wp-admin')) {
        wp_redirect($referrer . '?login=failed');
        exit;
    }
}

add_action('pre_get_posts', 'custom_search_filter');
function custom_search_filter($query)
{
    // Chequear si estamos en la página de tienda
    global $wp;
    if (isset($wp->request) && $wp->request === 'tienda') {
        // Obtener el valor de búsqueda del parámetro "s"
        $search_query = isset($_GET["search"]) ? $_GET['search'] : '';
        // Si existe el valor de búsqueda
        if (!empty($search_query)) {
            // Agregar el filtro para buscar por título y descripción del producto
            $query->set('meta_query', array(
                array(
                    'key' => 'product_name',
                    'value' => $search_query,
                    'compare' => 'LIKE'
                )
            ));

            $products = $query->get_post();

            if (empty($products)) {
                $query->set('meta_query', array());
                echo $query->get_post();
            }
        } else {
            // Si no existe el valor de búsqueda, retornar todos los productos
            $query->set('posts_per_page', -1);
        }
    }
}


?>
