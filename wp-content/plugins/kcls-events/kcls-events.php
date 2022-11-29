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

function convertICStoDateTime($icsDate){
	$eventDate = standardizeStartTime($icsDate);
	// Convert the date from the ics file to a DateTime object
	$year = substr($eventDate, 0, 4);
	$month = substr($eventDate, 4, 2);
	$day = substr($eventDate, 6, 2);
	$eventDateTime = new DateTime($year . '-' . $month . '-' . $day);
	return $eventDateTime;
}

function kcls_sort_events($a, $b){
	$currentDateTime = new DateTime();
	if($a['DTSTART'] && $b['DTSTART']) {
		// Converts ICS date to PHP DateTime object
		$firstEvent = convertICStoDateTime($a['DTSTART']);
		$secondEvent = convertICStoDateTime($b['DTSTART']);
		// Sort the array by distance to the current date
		$firstEventDistance = date_diff($firstEvent, $currentDateTime)->format('%r%a');
		$secondEventDistance = date_diff($secondEvent, $currentDateTime)->format('%r%a');
		return $secondEventDistance <=> $firstEventDistance ;
	}
}

function filter_passed_events($event){
	// Filter out events that have already passed
	$currentDateTime = new DateTime();
	$eventDateTime = convertICStoDateTime($event['DTSTART']);
	$eventDistance = date_diff($eventDateTime, $currentDateTime)->format('%r%a');
	return $eventDistance <= 0;
}

function kcls_get_events($url){
	$ics = new iCalEasyReader();
	$lines = $ics->load(file_get_contents($url));
	usort($lines['VEVENT'], 'kcls_sort_events');
	$filteredEvents = array_filter($lines['VEVENT'], 'filter_passed_events');	
	$latestEvents = array_slice($filteredEvents, 0, 4);
	return $latestEvents;
}
	
function parse_ical_date($date){
	if(is_string($date)){
		$calendarDate = substr($date, 0, 8);
		$time = substr($date, 9, 6);
		$datetime = date_create($calendarDate . ' ' . $time);
		$datetime->setTimezone(new DateTimeZone('America/Los_Angeles'));
		return $datetime;
	}
}

 function kcls_events_block_renderer($attr){
	$events = kcls_get_events('https://calendar.google.com/calendar/ical/1857comms%40gmail.com/public/basic.ics');
	ob_start();
	if(count($events) === 0): ?>
		<h4 class="kcls-events-none">No events have been found at this time. If you believe this is in error, please reach out to the eBoard for more details.</h4>
	<?php else: ?>
		<div class="kcls-event-container">	
			<?php foreach($events as $event): 
				$eventStartDate = parse_ical_date($event['DTSTART']);
				$eventEndDate = parse_ical_date($event['DTEND']);
				?> 
				<div class="kcls-event">
					<header class="kcls-event-header">
						<div class="kcls-event-header-date">
							<div class="kcls-event-header-date-month">
								<?php echo date_format($eventStartDate, 'M'); ?>
							</div>
							<div class="kcls-event-header-date-day">
								<?php echo date_format($eventStartDate, 'd'); ?>
							</div>
						</div>
						<div>
							<h3 class="kcls-event-title"><?php echo $event['SUMMARY']; ?></h3>
							<h4 class="kcls-event-time">
								<?php echo date_format($eventStartDate, 'g:i a') . ' - ' . date_format($eventEndDate, 'g:i a'); ?>
							</h4>
						</div>
					</header>	
					<div class="kcls-event-body">
						<?php echo str_replace("<br>", "", $event['DESCRIPTION']); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?> 
	<?php
	return ob_get_clean();
}

function create_block_kcls_events_block_init() { 
	wp_register_script('kcls-events-block', plugins_url('build/index.js', __FILE__), array('wp-blocks', 'wp-element', 'wp-editor'));
	register_block_type( __DIR__ . '/build', [
		'editor_script' => 'kcls-events-block',
	]);

	register_block_type('kcls/events-core', [
		'render_callback' => 'kcls_events_block_renderer',
	]);
}

add_action( 'init', 'create_block_kcls_events_block_init' );

