<?php 
    get_header();
?>
<main class="container mb-4">
    <div class="mt-4 mb-4">
    <?php
        while (have_posts()) {
            the_post();
            ?>
                <h1><?php the_title(); ?></h1>
                <p><?php the_content(); ?></p>
            <?php
        }
    ?>
    </div>
</main>
<?php
    get_footer();
?>