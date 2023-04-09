<?php
/**
 * Template Name: User Handling
 */

get_header(); 
?>

<main class="user-container">
    <div class="left-col">
        <?php
            $logo = get_template_directory_uri().'/logo.png';
            $action = isset($_GET['action']) ? $_GET['action'] : '-';

            if ($action == 'register'){
                get_template_part('user' ,'register');
            } else { 
                get_template_part('user', 'login');
            }
    ?>
    </div>
    <div class="right-col">
        <div class="text">
            <p class="greeting">Bienvenido a</p>
            <p class="rume">The Rum <br> Shop</p>
        </div>
    </div>
</main>

<?php
    get_footer();
?>


