<?php

get_header();?>
 <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
<h1>Journies in <?php echo $term->name;?></h1>
<?php query_posts($query_string . '&meta_key=journey_date&orderby=meta_value&order=DESC'); ?>
<ul class="journey-list">
<?php while(have_posts()):?>
	<?php the_post();?>
<li>
	<?php $date = strtotime(get_post_meta(get_the_ID(), 'journey_date', true));?>
	<?php echo date("Y-m-d", $date);?> - 
	<a href="<?php the_permalink()?>">
	<?php the_title();?>
	</a>
</li>
<?php endwhile;?>
</ul>

<?php get_footer();