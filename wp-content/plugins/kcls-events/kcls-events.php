<?php
/**
 * Plugin Name:       KCLS Events
 * Description:       Block that displays upcoming union events from the Google Calendar
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Two Dogs Web Development
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       kcls-events
 *
 * @package           create-block
 */

include 'iCalEasyReader.php';

function kcls_get_events($url){
	$ical = new iCalEasyReader();
	$lines = $ical->load(file_get_contents($url));
	return $lines['VEVENT'];
}


 function kcls_events_block_renderer($attr){
	$events = kcls_get_events('https://calendar.google.com/calendar/ical/1857comms%40gmail.com/public/basic.ics');	
	// print_r(kcls_get_events('https://calendar.google.com/calendar/ical/1857comms%40gmail.com/public/basic.ics'));
	ob_start();
	?>
	<div class="kcls-event-container">
		<?php foreach($events as $event): ?> 
			<div class="kcls-event">
				<h3><?php echo $event['SUMMARY']; ?></h3>
				<p>What: <?php echo $event['DESCRIPTION']; ?></p>
				<p>When: <?php echo $event['DTSTART']; ?></p>
				
				<p>Until: <?php echo $event['DTEND']; ?></p>
			</div>
		<?php endforeach; ?>
	</div>
	<?php
	return ob_get_clean();
}

 function create_block_kcls_events_block_init() {
	register_block_type( __DIR__ . '/build', [
		'render_callback' => 'kcls_events_block_renderer',
	] );
}

add_action( 'init', 'create_block_kcls_events_block_init' );
