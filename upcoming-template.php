<?php
/*
Template Name: Upcoming Template
*/

get_header();

// Today plus a little more than a day
$today = date('Y-m-d', time()+90000);

$args = array(
			'post_type' => 'journeys',
			'meta_key' => 'journey_date',
			'meta_compare' => '>',
			'meta_value' => $today,
			'orderby' => 'meta_value',
			'order' => 'ASC'
		);
		$upcoming = new WP_Query( $args );
		if( $upcoming->have_posts() ) {
			//echo "Posts!";
			
			$ups = $upcoming->get_posts();
			foreach($ups as $up){
				$usubt = get_post_meta($up->ID,"journey_subtitle",true);
				$udate = strtotime(get_post_meta($up->ID,"journey_date",true));
				$utime = get_post_meta($up->ID,"journey_time",true);
				$ulocstr = get_post_meta($up->ID,"journey_location_str",true);
				$ulocurl = get_post_meta($up->ID,"journey_location_url",true);
				$udeturl = get_post_meta($up->ID,"journey_event_details_url",true);
				$ufburl = get_post_meta($up->ID,"journey_facebook_url",true);
				$usfzurl = get_post_meta($up->ID,"journey_sfzero_url",true);?>
<div class="grid_6 alpha upcoming">
        <h1><a href="<?php echo get_permalink($up->ID)?>"><?php echo $up->post_title ?></a></h1>
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
</div>
<?} //foreach
		}
?>
<?php
get_footer();
?>