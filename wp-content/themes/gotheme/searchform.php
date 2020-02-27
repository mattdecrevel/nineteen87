<?php
/**
 * The template for displaying search forms in gotheme
 *
 * @package gotheme
 */

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_attr( 'Search for:', 'label', 'gotheme' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( 'Search &hellip;', 'placeholder', 'gotheme' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr( 'Search', 'submit button', 'gotheme' ); ?>">
</form>
