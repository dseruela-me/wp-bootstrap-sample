<?php 
    get_header();
?>
<div class="container my-5">
    <?php
        while (have_posts()) {
            the_post();
            ?>
                <p><?php the_content(); ?></p>
            <?php
        }
    ?>
</div>
<?php
    get_footer();
?>