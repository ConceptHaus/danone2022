<?php
/**
 * View: Week View - Single Event Title Featured Icon
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/v2/week/grid-body/events-day/event/title/featured.php
 *
 * See more documentation about our views templating system.
 *
 * @link https://evnt.is/1aiy
 *
 * @since 5.1.1
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 *
 * @version 5.2.0
 */

if ( empty( $event->featured ) ) {
	return;
}
?>
<em
	class="tribe-events-pro-week-grid__event-title-featured-icon"
	title="<?php esc_attr_e( 'Featured', 'tribe-events-calendar-pro' ); ?>"
>
	<?php $this->template( 'components/icons/featured', [ 'classes' => [ 'tribe-events-pro-week-grid__event-title-featured-icon-svg' ] ] ); ?>
</em>
