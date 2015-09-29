<?php

/**
 * @file
 * Contains \Drupal\page_manager_content_type\Form\LayoutContentTypeAdd.
 */

namespace Drupal\page_manager_content_type\Form;

use Drupal\Core\Form\FormStateInterface;

class LayoutContentTypeAdd extends LayoutContentTypeBase{
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
    //TODO: fix 'node.' if other entity type's also supported
    $form_state->setValueForElement($form['id'], 'node.' . $form_state->getValue('entity_bundle') . '.' . $form_state->getValue('entity_view_mode') . '.' . $form_state->getValue('id'));
  }


}