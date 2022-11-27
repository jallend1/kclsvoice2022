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
		return $firstEventDistance <=> $secondEventDistance;
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
		$year = substr($date, 0, 4);
		$month = substr($date, 4, 2);
		$day = substr($date, 6, 2);
		$hour = substr($date, 9, 2);
		$minute = substr($date, 11, 2);
		$second = substr($date, 13, 2);
		$timezone = substr($date, 15, 6);
		// $eventDateTime = new DateTime($year . '-' . $month . '-' . $day . ' ' . $hour . ':' . $minute . ':' . $second . ' ' . $timezone);
		$datetime = new DateTime($year . '-' . $month . '-' . $day);
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
			$eventStartDate = parse_ical_date($event['DTSTART']);
			$eventEndDate = parse_ical_date($event['DTEND']);
			$dateObject = DateTime::createFromFormat('!m', $eventStartDate['month']);
			$prettyMonth = $dateObject->format('M');
			?> 
			<div class="kcls-event">
			<header class="kcls-event-header">
				<div class="kcls-event-header-date">
					<div class="kcls-event-header-date-month"><?php echo $prettyMonth; ?></div>
					<div class="kcls-event-header-date-day"><?php echo $eventStartDate['day']; ?></div>
				</div>
				<div>
					<h3 class="kcls-event-title"><?php echo $event['SUMMARY']; ?></h3>
					<h4 class="kcls-event-time"><?php echo $eventStartDate['hour'] . ':' . $eventStartDate['minute'] . ' - ' . $eventEndDate['hour'] . ':' . $eventEndDate['minute']; ?></h4>
					
				</div>
			</header>	
				<div class="kcls-event-body">
					<?php echo str_replace("<br>", "", $event['DESCRIPTION']); ?>
					<!-- <p>When: <?php echo standardizeStartTime($event['DTSTART']); ?></p>
					<p>Until: <?php echo standardizeStartTime($event['DTEND']); ?></p> -->
					<!-- <p>Year: <?php echo $eventStartDate['year']; ?></p>
					<p>Month: <?php echo $eventStartDate['month']; ?></p>
					<p>Day: <?php echo $eventStartDate['day']; ?></p>
					<p>DateTime: <?php echo $eventStartDate['datetime']->format('Y-m-d H:i:s'); ?></p>
					<p>CurrentDateTime: <?php echo $eventStartDate['currentDateTime']->format('Y-m-d H:i:s'); ?></p> -->
					<!-- TODO:  -->
					<!-- <?php echo date_diff($eventStartDate['datetime'], $eventStartDate['currentDateTime'])->format('%r%a'); ?> -->
				</div>
			</div>
		<?php endforeach; ?>
	</div>
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

