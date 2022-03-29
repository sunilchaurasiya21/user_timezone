<?php

namespace Drupal\user_timezone;

use Drupal\Core\Datetime\DrupalDateTime;

/**
 * Class TimezoneService.
 */
class TimezoneService
{

    /**
     * Constructs a new TimezoneService object.
     */
    public function __construct()
    {
    
    }

    public function getTime()
    {
        $config = \Drupal::config('user_timezone.usertimezone');
        $timezone = $config->get('timezone');
        $date = new DrupalDateTime();
        $date->setTimezone(new \DateTimeZone($timezone)); 
        $date_time = $date->format('dS M Y g:i A');
        return $date_time;

    }

}
