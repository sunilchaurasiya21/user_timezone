<?php

/**
 * @file
 * This file is created to add Block.
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

namespace Drupal\user_timezone\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\user_timezone\TimezoneService;

/**
 * Provides a 'TimezoneBlock' block.
 *
 * @Block(
 *  id = "timezone_block",
 *  admin_label = @Translation("Timezone block"),
 * )
 */

 /**
  * @class
  * Class TimezoneBlock.
  * 
  * @category Form
  * @package  Form
  * @author   Sunil Chaurasiya <chaurasiyasunil7@gmail.com>
  * @license  GNU General Public License version 2 or later; see LICENSE
  * @link     http://arctg.com
  */

class TimezoneBlock extends BlockBase implements ContainerFactoryPluginInterface
{

    /**
     * The Timezone Service
     *
     * @var \Drupal\user_timezone\TimezoneService
     */

    protected $timezoneservice;

    /**
     * @param array $configuration
     * @param string $plugin_id
     * @param mixed $plugin_definition
     * @param \Drupal\user_timezone\TimezoneService $timezoneservice
     * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
     */

    /**
     * {@inheritdoc}
     * 
     * @return bool
     */
    public function __construct(array $configuration, $plugin_id, $plugin_definition, TimezoneService $timezoneservice)
    {
        parent::__construct($configuration, $plugin_id, $plugin_definition);
        $this->timezoneservice = $timezoneservice;
    }
    
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     * @param array $configuration
     * @param string $plugin_id
     * @param mixed $plugin_definition
     */

    /**
     * {@inheritdoc}
     * 
     * @return bool
     */
    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition)
    {
        return new static(
            $configuration,
            $plugin_id,
            $plugin_definition,
            $container->get('user_timezone.time_zone')
        );
    }

    /**
     * {@inheritdoc}
     * 
     * @return bool
     */
    public function build()
    {

        $config = \Drupal::config('user_timezone.usertimezone');
        $city = $config->get('city');
        $country = $config->get('country');

        $renderable = [
        '#theme' => 'render_timezone_data',
        '#city' => $city,
        '#country' => $country,
        '#time' => $this->timezoneservice->getTime(),
        '#cache' => [
        //'tags' => [$this->timezoneservice->getTime()],
        'max-age' => 10,
        ],
        ];

        return $renderable;

    }

}
