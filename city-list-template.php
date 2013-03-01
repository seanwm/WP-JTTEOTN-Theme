<?php
/*
Template Name: City List Template
*/

get_header();?>
<h1><?php the_title();?></h1>
<?php global $wp_taxonomies; 
$cities = get_terms( 'cities', 'orderby=count&order=DESC&hide_empty=0' );?>
<ul class="city-list">
<?php foreach($cities AS $city):?>
<li><a href="<?php echo get_term_link($city)?>"> <?php echo $city->name?></a> - <?php echo $city->count?></li>
<?php endforeach;?>
</ul>

<?php get_footer();