<?php 
    get_header();
?>
<main class="container search-page">
    <div class="row p-4">
    <?php
    if( have_posts() ) {
        while (have_posts()) {
            the_post();
            ?>
            <article class="blog-post row overflow-hidden flex-md-row mb-4 position-relative">
                <div class="col-auto d-none d-lg-block">
                    <a class="blog-post-permalink" href="<?php the_permalink(); ?>">
                        <?php 
                            if( has_post_thumbnail() ) {
                                the_post_thumbnail('blog-list-medium-thumbnail'); 
                            } else {
                        ?>
                                <img src="<?php echo get_template_directory_uri() . "/assets/img/no-image.jpg"; ?>" alt="No Image">
                        <?php
                            }
                            
                        ?>
                    </a>
                </div>    
                <div class="col p-4 d-flex flex-column position-static">
                <a class="blog-post-permalink" href="<?php the_permalink(); ?>"><h2 class="blog-post-title mb-0"><?php the_title(); ?></h2></a>
                    <div class="meta text-muted mt-3">
                        <div class="mb-1 post-created">
                            <i class="bi bi-calendar-fill"></i> 
                            <a href="<?php echo get_year_link(date_format(date_create(get_the_date()), 'Y')); ?>">
                                <?php the_time('F j, Y'); ?>
                            </a>
                        </div>
                        <?php 
                            if( has_category() ) {
                        ?>
                        <div class="post-categories">
                            <i class="bi bi-bookmark-fill"></i> 
                            <span class="d-inline-block mb-2 text-primary"><?php the_category(', '); ?></span>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="content">
                        <p class="card-text mb-auto"><?php the_excerpt(); ?></p>
                    </div>
                </div>
            </article>
            <?php
        }
    } else {
        ?>
            <div class="text-center">
                <h3>NO RESULTS FOUND.</h3>
            </div>
        <?php
    }
    ?>
    </div>
</main>
<?php
    get_footer();
?>