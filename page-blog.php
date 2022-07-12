<?php 
    get_header();
?>
<div class="container my-5 blog-page">
    <?php
    $args = [
        'post_type'             => 'post',
        'paged'                 => get_query_var( 'paged', 1 ),
        'posts_per_page'        => 5,
    ];
    $blogs = new WP_Query( $args );
    if ( $blogs->have_posts() ) {
        while ( $blogs->have_posts() ) {
            $blogs->the_post();
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
        ?>
        <nav class="blog-pagination my-5 text-center">
            <?php
                echo paginate_links([
                    'total'                 => $blogs->max_num_pages,
                    'prev_text'             => '<button class="btn btn-sm btn-outline-primary">Previous</button>',
                    'next_text'             => '<button class="btn btn-sm btn-outline-primary">Next</button>',
                    'before_page_number'    =>  '<span class="btn btn-sm btn-outline-primary mr-2">',
                    'after_page_number'     =>  '</span>',
                ]);
            ?>
        </nav>
    <?php    
    }   
    wp_reset_postdata();
    ?>
</div>
<?php
    get_footer();
?>