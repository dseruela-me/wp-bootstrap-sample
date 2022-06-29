<?php 
    get_header();
?>
<div class="container mt-4 mb-4">
    <div class="single-blog-spacer"></div>
    <div class="row mb-2 mt-4">
        <div class="col-md-8 px-4">
            <?php
                while (have_posts()) {
                    the_post();
                    ?>
                    <div class="blog-single-wrap">
                        <div class="header mb-4">
                            <div class="post-thumb">
                                <?php the_post_thumbnail('single-post-thumbnail'); ?>
                            </div>
                            <div class="meta-header">
                                <div class="post-author">
                                    <div class="avatar">
                                        <?php
                                            echo get_avatar(get_the_author_meta(get_the_author_ID()), 64, null, null, array('class' => 'wt-author-img'));
                                        ?>
                                    </div>
                                    <div class="meta">
                                        by <a href="<?php echo get_author_posts_url(get_the_author_ID()); ?>">
                                            <?php echo ucwords(get_the_author()); ?>
                                        </a>
                                    </div>
                                    <div class="post-sharer">
                                        <a href="#" class="btn social-facebook"><i class="bi bi-facebook"></i></a>
                                        <a href="#" class="btn social-facebook"><i class="bi bi-twitter"></i></a>
                                        <a href="#" class="btn social-facebook"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <h1 class="post-title"><?php the_title(); ?></h1>
                        <div class="post-meta text-muted">
                            <div class="post-created">
                                <span class="icon">
                                    <i class="bi bi-calendar-fill"></i>
                                </span> <?php the_time('F j, Y'); ?>
                            </div>
                            <div class="post-categories">
                                <span class="icon">
                                    <?php
                                        $category_id = get_cat_ID(get_the_category()[0]->name);
                                        $category_link = get_category_link($category_id);
                                    ?>
                                    <i class="bi bi-bookmark-fill"></i> <!-- Category -->
                                    <a href="<?php echo esc_url($category_link); ?>">
                                        <?php echo get_the_category()[0]->name; ?>
                                    </a>
                                </span>
                            </div>
                            <div class="post-comment-count">
                                <span class="icon">
                                    <i class="bi bi-chat-fill"></i>
                                </span> <?php echo get_comments_number(); ?> comments
                            </div>
                        </div>
                        <div class="post-content mt-4">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
        <div class="col-md-4 px-4">
            <div class="position-sticky sidebar-widgets">
                <div class="widget-box p-4 mb-4 bg-light shadow">
                    <h4 class="widget-title">Archives</h4>
                    <div class="divider"></div>
                    <ul class="list-unstyled mb-0">
                        <?php wp_get_archives(); ?>
                    </ul>
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