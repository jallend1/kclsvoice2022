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

function standardizeStartTime($arr){
	// All day events have their start time stored as an array, while events with a start time have it stored as a string
	return is_array($arr) ? $arr['value'] : $arr;
}

function kcls_get_events($url){
	$ical = new iCalEasyReader();
	$lines = $ical->load(file_get_contents($url));
	// Sorts the two-dimensional array by the DTSTART key
	usort($lines['VEVENT'], function($a, $b) {
		if($a['DTSTART'] && $b['DTSTART']) {
			$firstEvent = standardizeStartTime($a['DTSTART']);
			$secondEvent = standardizeStartTime($b['DTSTART']);
			return $secondEvent <=> $firstEvent;
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
		$currentDateTime = new DateTime();
		return array('year' => $year, 'month' => $month, 'day' => $day, 'hour' => $hour, 'minute' => $minute, 'datetime' => $datetime, 'currentDateTime' => $currentDateTime);
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
			<header class="kcls-event-header">
				<div class="kcls-event-header-date">
					<div class="kcls-event-header-date-month"><?php echo $eventDate['month']; ?></div>
					<div class="kcls-event-header-date-day"><?php echo $eventDate['day']; ?></div>
				</div>
				<div>
					<h3 class="kcls-event-title"><?php echo $event['SUMMARY']; ?></h3>
				</div>
			</header>	
				<div class="kcls-event-body">
					<?php echo trim($event['DESCRIPTION']); ?>
					<p>When: <?php echo standardizeStartTime($event['DTSTART']); ?></p>
					<p>Until: <?php echo standardizeStartTime($event['DTEND']); ?></p>
					<!-- <p>Year: <?php echo $eventDate['year']; ?></p>
					<p>Month: <?php echo $eventDate['month']; ?></p>
					<p>Day: <?php echo $eventDate['day']; ?></p>
					<p>DateTime: <?php echo $eventDate['datetime']->format('Y-m-d H:i:s'); ?></p>
					<p>CurrentDateTime: <?php echo $eventDate['currentDateTime']->format('Y-m-d H:i:s'); ?></p> -->
					<!-- TODO:  -->
					<?php echo date_diff($eventDate['datetime'], $eventDate['currentDateTime'])->format('%r%a'); ?>
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

