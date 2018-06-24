<?php
/**
 * @package G76Scheduler
 */
class G76SchedulerPluginDeactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}