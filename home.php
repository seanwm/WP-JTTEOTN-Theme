<?
$today = date('Y-m-d');
$upcoming_journeys = array();
$args = array(
			'post_type' => 'journeys',
			'meta_key' => 'journey_date',
			'meta_compare' => '>',
			'meta_value' => $today,
			'orderby' => 'journey_date'
		);
		$upcoming = new WP_Query( $args );
		if( $upcoming->have_posts() ) {
			//echo "Posts!";
			
			$ups = $upcoming->get_posts();
			foreach($ups as $up)
			{
				//print_r($up);
				$start_date = get_post_meta($up->ID, 'journey_date', true);
				//die("Start date: ".$start_date);
				if (!isset($upcoming_journeys[$start_date]))
				{
					$upcoming_journeys[$start_date] = array();
				}
				$upcoming_journeys[$start_date][] = $up;
			}
		}?>
		
		
		<div class="grid_5 omega">
			<h1>Journey to the End of the Night is a free street game of epic proportion run by volunteer masterminds in cities around the world.</h1>

			<h1>It is a race/chase through city streets at night.</h1>

		<h2>
		<?php if (count($upcoming_journeys)>0): ?>
		It is about to be played in
		<?php //print_r($upcoming_journeys);?>
			<?php foreach($upcoming_journeys as $up):?>
				<?php foreach($up as $upj ):?>
					<?php //echo $upj->post_title;
						$last_date = get_post_meta($upj->ID, 'journey_date', true);
						$cats = wp_get_object_terms($upj->ID,'journey_city');
						echo "<a href=\"".get_permalink($upj->ID)."\">". $cats[0]->name."</a>";
					?>
				<?php endforeach;?>
				on <?php echo date("Y-m-d", strtotime($last_date));?>
			<?php endforeach;?>
		<?php endif;?>
		</h2>
		<h3><u>IMPORTANT</u>: We're asking all players to please pre-register for the San Francisco Journey, to reduce everyone's time spent waiting in a line.
		<a 
		href="http://journey2012.heroku.com/">So sign up here</a>, print out your waiver, and bring it with you on Nov 10th!</h3>
		</div>



		<div class="grid_5 alpha gray">

			<p style="margin-top:0;">The city spreads out before you. Rushing from point to point, lit by the slow strobe of fluorescent buses and dark streets. Stumbling into situations for a stranger's signature. Fleeing unknown pursuers, breathing hard, admiring the landscape and the multitude of worlds hidden in it. </p>
			<p>For one night, drop your relations, your work and leisure activities, and all your usual motives for movement and action, and let yourself be drawn by the attractions of the chase and the encounters you find there.</p>

		</div>

		<style type="text/css" media="screen">
			.gray {
				font-size:20px;
				color:#B1B1B1;
			}
			.gray p {
				padding-left:20px;

			}
		</style>
		