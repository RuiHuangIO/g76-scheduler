<?php
/**
 * @package G76Scheduler
 */

 class G76SchedulerPluginActivate
{
    public static function activate(){
        flush_rewrite_rules();
    }
}