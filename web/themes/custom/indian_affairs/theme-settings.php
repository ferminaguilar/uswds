<?php

/**
 * @file
 * Theme settings form alter for Indian Affairs theme.
 */

use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function indian_affairs_form_system_theme_settings_alter(&$form, FormStateInterface &$form_state, $form_id = NULL) {

  // USWDS Identifier Settings.
  $form['identifier_settings'] = [
    '#type' => 'details',
    '#title' => t('Identifier (USWDS)'),
    '#description' => t('The identifier communicates a site’s parent agency and official status, required by the 21st Century IDEA Act. See <a href="@url" target="_blank">USWDS Identifier Component</a> for specifications.', [
      '@url' => 'https://designsystem.digital.gov/components/identifier/',
    ]),
    '#open' => TRUE,
    '#weight' => 25,
  ];

  $form['identifier_settings']['uswds_identifier_enabled'] = [
    '#type' => 'checkbox',
    '#title' => t('Enable USWDS Identifier'),
    '#default_value' => theme_get_setting('uswds_identifier_enabled') ?? TRUE,
  ];

  $form['identifier_settings']['uswds_identifier_variant'] = [
    '#type' => 'select',
    '#title' => t('Identifier Variant'),
    '#description' => t('Choose between the standard single parent identifier and the multiple parents / multiple logos variant.'),
    '#options' => [
      'default' => t('Default (Single Parent & Logo)'),
      'multiple' => t('Multiple Parents and Logos'),
    ],
    '#default_value' => theme_get_setting('uswds_identifier_variant') ?? 'default',
    '#states' => [
      'visible' => [
        ':input[name="uswds_identifier_enabled"]' => ['checked' => TRUE],
      ],
    ],
  ];

  $form['identifier_settings']['uswds_identifier_domain'] = [
    '#type' => 'textfield',
    '#title' => t('Identity Domain'),
    '#description' => t('The domain name displayed in the identifier (e.g. <code>bia.gov</code>). Leave blank to auto-detect from the current website domain.'),
    '#default_value' => theme_get_setting('uswds_identifier_domain') ?? '',
    '#states' => [
      'visible' => [
        ':input[name="uswds_identifier_enabled"]' => ['checked' => TRUE],
      ],
    ],
  ];

  $form['identifier_settings']['uswds_identifier_agency_shortname'] = [
    '#type' => 'textfield',
    '#title' => t('Agency Short Name / Acronym'),
    '#description' => t('Used in required links like "About [Agency]" (e.g. <code>Indian Affairs</code> or <code>BIA</code>).'),
    '#default_value' => theme_get_setting('uswds_identifier_agency_shortname') ?? 'Indian Affairs',
    '#states' => [
      'visible' => [
        ':input[name="uswds_identifier_enabled"]' => ['checked' => TRUE],
      ],
    ],
  ];

  // Primary Parent Agency.
  $form['identifier_settings']['primary_parent'] = [
    '#type' => 'fieldset',
    '#title' => t('Primary Parent Agency'),
    '#states' => [
      'visible' => [
        ':input[name="uswds_identifier_enabled"]' => ['checked' => TRUE],
      ],
    ],
  ];

  $form['identifier_settings']['primary_parent']['uswds_identifier_parent_name'] = [
    '#type' => 'textfield',
    '#title' => t('Parent Agency Name'),
    '#default_value' => theme_get_setting('uswds_identifier_parent_name') ?? 'U.S. Department of the Interior',
  ];

  $form['identifier_settings']['primary_parent']['uswds_identifier_parent_url'] = [
    '#type' => 'textfield',
    '#title' => t('Parent Agency URL'),
    '#default_value' => theme_get_setting('uswds_identifier_parent_url') ?? 'https://www.doi.gov',
  ];

  $form['identifier_settings']['primary_parent']['uswds_identifier_parent_logo'] = [
    '#type' => 'textfield',
    '#title' => t('Parent Agency Logo Path or URL'),
    '#description' => t('Relative to theme folder (e.g. <code>assets/uswds/img/circle-gray-20.svg</code>) or full URL. Leave blank for default placeholder.'),
    '#default_value' => theme_get_setting('uswds_identifier_parent_logo') ?? '',
  ];

  $form['identifier_settings']['primary_parent']['uswds_identifier_parent_logo_alt'] = [
    '#type' => 'textfield',
    '#title' => t('Parent Agency Logo Alt Text'),
    '#description' => t('Defaults to "[Agency Name] logo" if left blank.'),
    '#default_value' => theme_get_setting('uswds_identifier_parent_logo_alt') ?? '',
  ];

  // Secondary Parent Agency (Multiple Parents variant).
  $form['identifier_settings']['secondary_parent'] = [
    '#type' => 'fieldset',
    '#title' => t('Secondary Parent / Sub-Agency (Multiple Parents Variant)'),
    '#states' => [
      'visible' => [
        ':input[name="uswds_identifier_enabled"]' => ['checked' => TRUE],
        ':input[name="uswds_identifier_variant"]' => ['value' => 'multiple'],
      ],
    ],
  ];

  $form['identifier_settings']['secondary_parent']['uswds_identifier_parent2_name'] = [
    '#type' => 'textfield',
    '#title' => t('Second Agency Name'),
    '#default_value' => theme_get_setting('uswds_identifier_parent2_name') ?? 'Bureau of Indian Affairs',
  ];

  $form['identifier_settings']['secondary_parent']['uswds_identifier_parent2_url'] = [
    '#type' => 'textfield',
    '#title' => t('Second Agency URL'),
    '#default_value' => theme_get_setting('uswds_identifier_parent2_url') ?? 'https://www.bia.gov',
  ];

  $form['identifier_settings']['secondary_parent']['uswds_identifier_parent2_logo'] = [
    '#type' => 'textfield',
    '#title' => t('Second Agency Logo Path or URL'),
    '#description' => t('Relative to theme folder or full URL.'),
    '#default_value' => theme_get_setting('uswds_identifier_parent2_logo') ?? '',
  ];

  $form['identifier_settings']['secondary_parent']['uswds_identifier_parent2_logo_alt'] = [
    '#type' => 'textfield',
    '#title' => t('Second Agency Logo Alt Text'),
    '#default_value' => theme_get_setting('uswds_identifier_parent2_logo_alt') ?? '',
  ];

  // Tertiary Parent Agency (Optional extra).
  $form['identifier_settings']['tertiary_parent'] = [
    '#type' => 'fieldset',
    '#title' => t('Third Agency (Optional for Multiple Parents)'),
    '#states' => [
      'visible' => [
        ':input[name="uswds_identifier_enabled"]' => ['checked' => TRUE],
        ':input[name="uswds_identifier_variant"]' => ['value' => 'multiple'],
      ],
    ],
  ];

  $form['identifier_settings']['tertiary_parent']['uswds_identifier_parent3_name'] = [
    '#type' => 'textfield',
    '#title' => t('Third Agency Name'),
    '#default_value' => theme_get_setting('uswds_identifier_parent3_name') ?? '',
  ];

  $form['identifier_settings']['tertiary_parent']['uswds_identifier_parent3_url'] = [
    '#type' => 'textfield',
    '#title' => t('Third Agency URL'),
    '#default_value' => theme_get_setting('uswds_identifier_parent3_url') ?? '',
  ];

  $form['identifier_settings']['tertiary_parent']['uswds_identifier_parent3_logo'] = [
    '#type' => 'textfield',
    '#title' => t('Third Agency Logo Path or URL'),
    '#default_value' => theme_get_setting('uswds_identifier_parent3_logo') ?? '',
  ];

  $form['identifier_settings']['tertiary_parent']['uswds_identifier_parent3_logo_alt'] = [
    '#type' => 'textfield',
    '#title' => t('Third Agency Logo Alt Text'),
    '#default_value' => theme_get_setting('uswds_identifier_parent3_logo_alt') ?? '',
  ];

  // Taxpayer Disclaimer.
  $form['identifier_settings']['taxpayer'] = [
    '#type' => 'fieldset',
    '#title' => t('Taxpayer Disclaimer'),
    '#states' => [
      'visible' => [
        ':input[name="uswds_identifier_enabled"]' => ['checked' => TRUE],
      ],
    ],
  ];

  $form['identifier_settings']['taxpayer']['uswds_identifier_taxpayer_disclaimer'] = [
    '#type' => 'checkbox',
    '#title' => t('Display taxpayer disclaimer text'),
    '#default_value' => theme_get_setting('uswds_identifier_taxpayer_disclaimer') ?? FALSE,
  ];

  $form['identifier_settings']['taxpayer']['uswds_identifier_taxpayer_text'] = [
    '#type' => 'textfield',
    '#title' => t('Taxpayer disclaimer text'),
    '#default_value' => theme_get_setting('uswds_identifier_taxpayer_text') ?? 'Produced and published at taxpayer expense.',
    '#states' => [
      'visible' => [
        ':input[name="uswds_identifier_taxpayer_disclaimer"]' => ['checked' => TRUE],
      ],
    ],
  ];

  // Required Links.
  $form['identifier_settings']['required_links'] = [
    '#type' => 'details',
    '#title' => t('Required Links (21st Century IDEA Act)'),
    '#open' => FALSE,
    '#states' => [
      'visible' => [
        ':input[name="uswds_identifier_enabled"]' => ['checked' => TRUE],
      ],
    ],
  ];

  $links = [
    'about' => ['title' => t('About [Agency] Link URL'), 'default' => '#about'],
    'accessibility' => ['title' => t('Accessibility Statement URL'), 'default' => '#accessibility'],
    'foia' => ['title' => t('FOIA Requests URL'), 'default' => '#foia'],
    'nofear' => ['title' => t('No FEAR Act Data URL'), 'default' => '#no-fear-act'],
    'oig' => ['title' => t('Office of the Inspector General (OIG) URL'), 'default' => '#oig'],
    'performance' => ['title' => t('Performance Reports URL'), 'default' => '#performance'],
    'privacy' => ['title' => t('Privacy Policy URL'), 'default' => '#privacy'],
  ];

  foreach ($links as $key => $info) {
    $form['identifier_settings']['required_links']['uswds_identifier_link_' . $key] = [
      '#type' => 'textfield',
      '#title' => $info['title'],
      '#default_value' => theme_get_setting('uswds_identifier_link_' . $key) ?? $info['default'],
    ];
  }

  // USA.gov Section.
  $form['identifier_settings']['usagov'] = [
    '#type' => 'fieldset',
    '#title' => t('USA.gov Section'),
    '#states' => [
      'visible' => [
        ':input[name="uswds_identifier_enabled"]' => ['checked' => TRUE],
      ],
    ],
  ];

  $form['identifier_settings']['usagov']['uswds_identifier_usagov_enabled'] = [
    '#type' => 'checkbox',
    '#title' => t('Display "Looking for U.S. government information and services? Visit USA.gov" section'),
    '#default_value' => theme_get_setting('uswds_identifier_usagov_enabled') ?? TRUE,
  ];

  $form['identifier_settings']['usagov']['uswds_identifier_usagov_url'] = [
    '#type' => 'textfield',
    '#title' => t('USA.gov URL'),
    '#default_value' => theme_get_setting('uswds_identifier_usagov_url') ?? 'https://www.usa.gov/',
    '#states' => [
      'visible' => [
        ':input[name="uswds_identifier_usagov_enabled"]' => ['checked' => TRUE],
      ],
    ],
  ];
}
