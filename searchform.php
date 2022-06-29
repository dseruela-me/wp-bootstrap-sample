<form action="<?php echo home_url(); ?>" 
      method="get" 
      class="d-flex">

    <input type="text" 
           name="s" 
           id="search" 
           placeholder="Enter keyword..." 
           class="form-control me-2"
           value="<?php the_search_query(); ?>" />
    <button type="submit" class="btn btn-outline-primary">Search</button>

</form>