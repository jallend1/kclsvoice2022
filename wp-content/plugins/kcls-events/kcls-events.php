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
	// Sorts the two-dimensional array by the DSTART key
	usort($lines['VEVENT'], function($a, $b) {
		if($a['DTSTART'] && $b['DTSTART']) {
			return $b['DTSTART'] <=> $a['DTSTART'];
		}
	});
	// Returns the latest five events
	return array_slice($lines['VEVENT'], 0, 4);
}

function parse_ical_date($date){
	if(is_string($date)){
		$year = substr($date, 0, 4);
		$month = substr($date, 4, 2);
		$day = substr($date, 6, 2);
		$hour = substr($date, 9, 2);
		$minute = substr($date, 11, 2);
		$second = substr($date, 13, 2);
		$timezone = substr($date, 15, 6);
		$datetime = new DateTime($year . '-' . $month . '-' . $day . ' ' . $hour . ':' . $minute . ':' . $second . ' ' . $timezone);
		return array('year' => $year, 'month' => $month, 'day' => $day, 'hour' => $hour, 'minute' => $minute, 'datetime' => $datetime);
	}
}

 function kcls_events_block_renderer($attr){
	$events = kcls_get_events('https://calendar.google.com/calendar/ical/1857comms%40gmail.com/public/basic.ics');
	ob_start();
	?>
	<div class="kcls-event-container">
		<?php foreach($events as $event): 
			$eventDate = parse_ical_date($event['DTSTART']);
			?> 
			<div class="kcls-event">
				<h3><?php echo $event['SUMMARY']; ?></h3>
				<div class="kcls-event-body">
					<p>What: <?php echo $event['DESCRIPTION']; ?></p>
					<p>When: <?php echo $event['DTSTART']; ?></p>
					<p>Until: <?php echo $event['DTEND']; ?></p>
					<p>Year: <?php echo $eventDate['year']; ?></p>
					<p>Month: <?php echo $eventDate['month']; ?></p>
					<p>Day: <?php echo $eventDate['day']; ?></p>
					
				</div>
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
