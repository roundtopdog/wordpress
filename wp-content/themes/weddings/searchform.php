<form class="ast-search" role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
		<input type="text" value="<?php  echo get_search_query(); ?>" id="search" name="s" placeholder="<?php echo __('Search...','weddings'); ?>" onclick="if(document.getElementById('search').value=='Search...'){ this.value=''; }" onblur="this.value=!this.value?'Search...':this.value;"/>
		<input type="submit" value="Search" id="search-submit" />
</form>
