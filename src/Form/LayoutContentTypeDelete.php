<?php

/**
 * @file
 * Contains \Drupal\page_manager_content_type\Form\LayoutContentTypeDelete.
 */

namespace Drupal\page_manager_content_type\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\EntityConfirmFormBase;
use Drupal\Core\Url;

class LayoutContentTypeDelete extends EntityConfirmFormBase {
  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to delete the page %name?', ['%name' => $this->entity->label()]);
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    //TODO: fixing "emtpy" string boolean
    $entity = $this->getEntity();
    $entity_bundle = $entity->get('entity_bundle');
    $entity_view_mode =  $entity->get('entity_view_mode');
    return new Url('page_manager_content_type.page_list', [
      'entity_bundle' => (!empty($entity_bundle)) ? $entity_bundle : 'empty',
      'entity_view_mode' => (!empty($entity_view_mode)) ? $entity_view_mode : 'empty'
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Delete');
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->entity->delete();
    drupal_set_message($this->t('The Layout content type %name has been removed.', ['%name' => $this->entity->label()]));
    $form_state->setRedirectUrl($this->getCancelUrl());
  }

}