<?php 
get_header(); 
?>
<div class="container front-page">
    <!-- Featured Blog -->
    <div class="row mb-2">
        <?php
        $args = array(
            'post_type'             =>  'post',
            'category_name'         =>  'featured',
            'posts_per_page'        =>  '2',
        );
        
        $featured_posts = new WP_Query( $args );

        if( $featured_posts->have_posts() ) {
            while( $featured_posts->have_posts() ) {
                $featured_posts->the_post();
                ?>
                    <div class="col-md-6">
                        <div class="articles-wrapper row blog-post featured g-0 border overflow-hidden flex-md-row mb-4 shadow h-md-250 position-relative">
                            <div class="col-md-12 d-none d-lg-block">
                                <a class="blog-post-permalink" href="<?php the_permalink(); ?>">
                                    <?php 
                                        if( has_post_thumbnail() ) {
                                            the_post_thumbnail('single-post-thumbnail'); 
                                        } else {
                                    ?>
                                            <img src="<?php echo get_template_directory_uri() . "/assets/img/no-image.jpg"; ?>" alt="No Image">
                                    <?php
                                        }
                                        
                                    ?>
                                </a>
                            </div>    
                            <div class="col-md-12 p-4 d-flex flex-column position-static">
                                <a class="blog-post-permalink" href="<?php the_permalink(); ?>"><h4 class="mb-0"><?php the_title(); ?></h4></a>
                                <div class="meta text-muted mt-3">
                                    <div class="mb-1 post-created">
                                        <i class="bi bi-calendar-fill"></i> 
                                        <a href="<?php echo get_year_link(date_format(date_create($featured_posts->post_date), 'Y')); ?>">
                                            <?php the_time('F j, Y'); ?>
                                        </a>
                                    </div>
                                    <div class="post-categories">
                                        <i class="bi bi-bookmark-fill"></i> 
                                        <span class="d-inline-block mb-2 text-primary"><?php the_category(', '); ?></span>
                                    </div>
                                </div>
                                <div class="content">
                                    <p class="card-text my-3"><?php the_excerpt(); ?></p>
                                    <p class="text-center mt-4 mb-2">
                                        <a class="btn btn-outline-primary float-none readmore" href="<?php the_permalink(); ?>">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
        wp_reset_postdata();
        ?>
    </div>

    <div class="row mb-2 mt-4">
        <div class="articles-wrapper col-md-8 p-4 shadow">
            <h4 class="widget-title">Latest Stories</h4>
            <div class="divider"></div>
            <?php 
            // get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1
            // use 'page' for front-page and 'paged' for the rest of the page.
            $latest_stories_args = array(
                'post_type'              => 'post',
                'paged'                  => get_query_var( 'page', 1 ),
                'posts_per_page'         => 5,
            );

            $latest_stories = new WP_Query( $latest_stories_args );
            
            ?>
            <?php if ( $latest_stories->have_posts() ) { ?>
                <?php while ( $latest_stories->have_posts() ) { 
                    $latest_stories->the_post(); 
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
                                    <a href="<?php echo get_year_link(date_format(date_create($latest_stories->post_date), 'Y')); ?>">
                                        <?php the_time('F j, Y'); ?>
                                    </a>
                                </div>
                                <div class="post-categories">
                                    <i class="bi bi-bookmark-fill"></i> 
                                    <span class="d-inline-block mb-2 text-primary"><?php the_category(', '); ?></span>
                                </div>
                            </div>
                            <div class="content">
                                <p class="card-text mb-auto"><?php the_excerpt(); ?></p>
                            </div>
                        </div>
                    </article>
                <?php } // end of while-statement ?>
                <nav class="blog-pagination my-5 text-center">
                    <?php 
                        echo home_pagination( $latest_stories );
                    ?>
                </nav>
            <?php } else { ?>
            <?php _e('Sorry, no posts matched your criteria.'); ?>
            <?php } // end of if-statement 
                wp_reset_postdata();
            ?>
        </div>
        <div class="col-md-4 px-4 sidebar">
            <div class="position-sticky" style="top: 5rem;">
                <div class="widget-box p-4 mb-4 bg-light shadow">
                    <h4 class="widget-title">About</h4>
                    <div class="divider"></div>
                    <img class="img-fluid p-4 mb-4 rounded-circle" src="<?php echo get_template_directory_uri() . "/assets/img/profile-pic.jpg"; ?>" alt="">
                    <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
                </div>
                <div class="widget-box p-4 mb-4 bg-light shadow">
                    <h4 class="widget-title">Category</h4>
                    <div class="divider"></div>
                    <ul class="categories list-unstyled mb-0">
                        <?php
                            $categories = get_categories();
                            foreach ($categories as $category) {
                                echo "<li><a href='" . get_category_link($category->term_id) . "'>" . $category->name . "</a></li>";
                            }
                        ?>
                    </ul>
                </div>
                <div class="widget-box p-4 mb-4 bg-light shadow">
                    <h4 class="widget-title">Recent Posts</h4>
                    <div class="divider"></div>
                    <?php 
                        $posts = get_posts();
                        foreach ($posts as $post) {
                    ?>
                    <div class="blog-item mb-3">
                        <a href="<?php the_permalink($post->post_ID); ?>" class="post-thumb mr-3">
                            <?php the_post_thumbnail('blog-list-thumbnail'); ?>
                        </a>
                        <div class="content p-2">
                            <h6 class="post-title">
                                <a href="<?php the_permalink($post->post_ID); ?>"><?php echo substr($post->post_title, 0, 30); ?></a>
                            </h6>
                            <div class="meta">
                                <a href="<?php echo get_year_link(date_format(date_create($post->post_date), 'Y')); ?>"><i class="bi bi-calendar-fill"></i> <?php echo date_format(date_create($post->post_date), 'M d, Y'); ?></a>
                                <a href="<?php echo get_author_posts_url($post->post_author); ?>"><i class="bi bi-person-circle"></i> <?php echo ucwords(get_the_author($post->post_author)); ?></a>
                                <!-- <a href="#"><i class="bi bi-chat-square-fill"></i> <?php ?></a> -->
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
get_footer(); 
?>