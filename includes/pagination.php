<?php
function theme_pagination($pages = '', $range = 2) {  
    $showitems = ($range * 2)+1;  

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages) {
            $pages = 1;
        }
    }   

    if(1 != $pages) {
        echo "<div class='pagination'>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

        for ($i=1; $i <= $pages; $i++) {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
        echo "</div>\n";
    }
 }

 function wpbootstrap_pagination() {
    $allowed_tags = [
        'span'  =>  [
            'class' =>  []
        ],
        'a'     =>  [
            'class' =>  [],
            'href'  =>  [],
        ]
    ];

    $args = [
        'before_page_number'    =>  '<span class="btn border border-secondary mr-2 mb-2">',
        'after_page_number'     =>  '</span>',
    ];

    printf( '<nav class="wpbootstrap-pagination">%s</nav>', wp_kses( paginate_links( $args ), $allowed_tags ) );
}

function home_pagination( $query = null ) 
{
    $pagination = array(            
        'current'   => get_query_var( 'page', 1 ),
        'total'     => $query->max_num_pages,
        'prev_text' => '<button class="btn btn-sm btn-outline-primary">Previous</button>',
        'next_text' => '<button class="btn btn-sm btn-outline-primary">Next</button>',
        'before_page_number'    =>  '<span class="btn btn-sm btn-outline-primary mr-2">',
        'after_page_number'     =>  '</span>',
    );

    return paginate_links( $pagination );
}
 ?>