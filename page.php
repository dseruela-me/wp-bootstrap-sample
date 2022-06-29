<?php 
    get_header();
?>
<div class="mt-4 mb-4">
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