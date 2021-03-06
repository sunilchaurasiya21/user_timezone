<?php

/**
 * @file
 * This file is created to add form.
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

namespace Drupal\user_timezone\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * @class
 * Class userTimezone.
 * 
 * @category Form
 * @package  Form
 * @author   Sunil Chaurasiya <chaurasiyasunil7@gmail.com>
 * @license  GNU General Public License version 2 or later; see LICENSE
 * @link     http://arctg.com
 */
class UserTimezone extends ConfigFormBase
{

    /**
     * {@inheritdoc}
     * 
     * @return bool
     */
    protected function getEditableConfigNames()
    {
        return [
        'user_timezone.usertimezone',
        ];
    }

    /**
     * {@inheritdoc}
     * 
     * @return bool
     */
    public function getFormId()
    {
        return 'user_timezone';
    }

    /**
     * {@inheritdoc}
     * 
     * @return bool
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $config = $this->config('user_timezone.usertimezone');
        $form['country'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Country'),
        '#description' => $this->t('Please enter country name.'),
        '#maxlength' => 64,
        '#size' => 64,
        '#required' => true,
        '#default_value' => $config->get('country'),
        ];
        $form['city'] = [
        '#type' => 'textfield',
        '#title' => $this->t('City'),
        '#description' => $this->t('Please enter city name'),
        '#maxlength' => 64,
        '#size' => 64,
        '#required' => true,
        '#default_value' => $config->get('city'),
        ];
        $form['timezone'] = [
        '#type' => 'select',
        '#title' => $this->t('Timezone'),
        '#description' => $this->t('Select timezone.'),
        '#options' => ['' => $this->t('Options in the select list'),
            'America/Chicago' => $this->t('America/Chicago'),
            'America/New_York' => $this->t('America/New_York'),
            'Asia/Tokyo' => $this->t('Asia/Tokyo'),
            'Asia/Dubai' => $this->t('Asia/Dubai'),
            'Asia/Kolkata' => $this->t('Asia/Kolkata'),
            'Europe/Amsterdam' => $this->t('Europe/Amsterdam'), 
            'Europe/Oslo' => $this->t('Europe/Oslo'),
            'Europe/London' => $this->t('Europe/London')],
            '#required' => true,
            '#default_value' => $config->get('timezone'),
        ];
        return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        parent::submitForm($form, $form_state);

        $this->config('user_timezone.usertimezone')
            ->set('country', $form_state->getValue('country'))
            ->set('city', $form_state->getValue('city'))
            ->set('timezone', $form_state->getValue('timezone'))
            ->save();
    }

}
