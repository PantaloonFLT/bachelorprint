<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Dennis
 * Date: 03.05.17
 * Time: 18:43
 * To change this template use File | Settings | File Templates.
 */

acf_add_local_field_group(array (
	'key' => 'reminder_mail',
	'title' => 'Bewertung an Kunden',
	'fields' => array (
		array (
			'key' => 'reminder_mail_sent',
			'label' => '',
			'name' => 'reminder_mail_sent',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'1' => 'Mail gesendet, bzw. nicht senden',
			),
			'default_value' => array (
			),
			'layout' => 'vertical',
			'toggle' => 0,
			'return_format' => 'value',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'shop_order',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));


