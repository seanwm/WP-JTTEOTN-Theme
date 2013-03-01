<?php
 /*Template Name: New Template
 */
 
get_header(); ?>
<div id="primary">
    <div id="content" role="main">
    <?php while(have_posts()):?>
		<?php the_post();
				$usubt = get_post_meta(get_the_ID(),"journey_subtitle",true);
				$udate = strtotime(get_post_meta(get_the_ID(),"journey_date",true));
				$utime = get_post_meta(get_the_ID(),"journey_time",true);
				$ulocstr = get_post_meta(get_the_ID(),"journey_location_str",true);
				$ulocurl = get_post_meta(get_the_ID(),"journey_location_url",true);
				$udeturl = get_post_meta(get_the_ID(),"journey_event_details_url",true);
				$ufburl = get_post_meta(get_the_ID(),"journey_facebook_url",true);
				$usfzurl = get_post_meta(get_the_ID(),"journey_sfzero_url",true);

		?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <!-- Display featured image in right-aligned floating div -->
                <div style="float: right; margin: 10px">
                    <?php the_post_thumbnail( array( 100, 100 ) ); ?>
                </div>
				<h1 class="journey_title single"><a href="<?php echo get_permalink(get_the_ID())?>"><?php echo the_title() ?></a></h1>
<?php
$cities = wp_get_object_terms(get_the_ID(), 'cities');
if(!empty($cities)){
  if(!is_wp_error( $cities )){?>
	<h3 class="citycrumb">
<?php
    foreach($cities as $city){
      echo ' <a href="'.get_term_link($city->slug, 'cities').'">'.$city->name.'</a> '; 
    }?>
</h3><?php
  }
}
?>
					<?php if (isset($usubt) && $usubt!=""):?>
						<h3><?php echo $usubt?></h3>
					<?php endif;?>
					<p class="big" style="font-size:18px">
					<?php echo date('F j, Y', $udate)?> <?php echo $utime?><br>
					<?php if ($ulocstr!=null && $ulocstr!=""):?>Location:<? endif;?>
					<?php if ($ulocurl!=null && $ulocurl!=""):?>
						<a href="<?php echo $ulocurl?>">
					<?php endif;?>
					<?php if ($ulocstr!=null && $ulocstr!=""):?>
					<?php echo $ulocstr?>
					<?php endif;?>
					<?php if ($ulocurl!=null && $ulocurl!=""):?>
						</a>
					<?php endif;?><br>
        				</p>

			<?php if ($udeturl!=null && $udeturl!=""):?>		
    			    <p style="font-size:small">
                		<strong>More info:</strong><br>
                		<a href="<?php echo $udeturl?>"><?php echo $udeturl?></a><br><br>
        			</p>
			<?php endif;?>
			<?php if ($ufburl!=null && $ufburl!=""):?>		
        			<p style="font-size:small">
                		<strong>Facebook:</strong><br>
                		<a href="<?php echo $ufburl?>"><?php echo $ufburl?></a><br><br>
        			</p>
			<?php endif;?>
			<?php if ($usfzurl!=null && $usfzurl!=""):?>		
        			<p style="font-size:small">
             		<strong>SFZero:</strong><br>
                		<a href="<?php echo $usfzurl?>"><?php echo $usfzurl?></a><br><br>
        		</p>
			<?php endif;?> 
            </header>
 
            <!-- Display movie review contents -->
            <div class="entry-content"><?php the_content(); ?></div>
        </article>
	<?php endwhile;?>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>