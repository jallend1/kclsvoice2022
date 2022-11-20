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

// Sorts events by start date
function kcls_sort_events($a, $b) {
	return $a['DTSTART'] <=> $b['DTSTART'];
}

// function kcls_sort_events_by_closest($a, $b) {
// 	// If $a and $b have a value, compare them
// 	if ($a['DTSTART'] && $b['DTSTART']) {
// 		$now = new DateTime();
// 		$a_start = new DateTime($a['DTSTART']);
// 		$b_start = new DateTime($b['DTSTART']);
// 		$a_diff = $a_start->diff($now);
// 		$b_diff = $b_start->diff($now);
// 		return $a_diff <=> $b_diff;
// 	}
// }

function kcls_get_events($url){
	$ical = new iCalEasyReader();
	$lines = $ical->load(file_get_contents($url));
	usort($lines['VEVENT'], 'kcls_sort_events');
	return $lines['VEVENT'];
}

function parse_ical_date($date){
	$year = substr($date, 0, 4);
	$month = substr($date, 4, 2);
	$day = substr($date, 6, 2);
	$hour = substr($date, 9, 2);
	$minute = substr($date, 11, 2);
	return array('year' => $year, 'month' => $month, 'day' => $day, 'hour' => $hour, 'minute' => $minute);
	
}

 function kcls_events_block_renderer($attr){
	$events = kcls_get_events('https://calendar.google.com/calendar/ical/1857comms%40gmail.com/public/basic.ics');	
	// print_r(kcls_get_events('https://calendar.google.com/calendar/ical/1857comms%40gmail.com/public/basic.ics'));
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
