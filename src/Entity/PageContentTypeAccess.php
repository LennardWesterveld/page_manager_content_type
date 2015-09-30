<?php
/**
 * @file
 * Contains \Drupal\page_manager\Entity\PageAccess.
 */

namespace Drupal\page_manager_content_type\Entity;

use Drupal\Core\Access\AccessResult;
use Drupal\page_manager\Entity\PageAccess;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines the access control handler for the page entity type.
 */
class PageContentTypeAccess extends PageAccess {


  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, $langcode, AccountInterface $account) {
    return AccessResult::allowed();
  }

}
