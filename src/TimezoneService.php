<?php

/**
 * @file
 * This file is created to add Service.
 * php version 7.2.10
 * 
 * Form file comment.
 * 
 * @category Form
 * @package  Form
 * @author   Sunil Chaurasiya <chaurasiyasunil7@gmail.com>
 * @license  GNU General Public License version 2 or later; see LICENSE
 * @link     http://arctg.com
 */

namespace Drupal\user_timezone;

use Drupal\Core\Datetime\DrupalDateTime;

/**
 * @class
 * Class TimezoneService.
 * 
 * @category Form
 * @package  Form
 * @author   Sunil Chaurasiya <chaurasiyasunil7@gmail.com>
 * @license  GNU General Public License version 2 or later; see LICENSE
 * @link     http://arctg.com
 */
class TimezoneService
{

    /**
     * Constructs a new TimezoneService object.
     */
    public function __construct()
    {
    
    }

    /**
     * {@inheritdoc}
     * 
     * @return bool
     */
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
