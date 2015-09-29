<?php

/**
 * @file
 * Contains \Drupal\page_manager\Entity\Page.
 */

namespace Drupal\page_manager_content_type\Entity;

use Drupal\page_manager\PageInterface;
use Drupal\Core\Condition\ConditionPluginCollection;
use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\page_manager\Plugin\VariantAwareTrait;
use Drupal\page_manager\Entity\Page;

/**
 * Defines a Page entity class.
 *
 * @ConfigEntityType(
 *   id = "page_manager_content_type",
 *   label = @Translation("Page"),
 *   handlers = {
 *     "access" = "Drupal\page_manager_content_type\Entity\PageContentTypeAccess",
 *     "list_builder" = "Drupal\page_manager_content_type\Entity\PageContentTypeListBuilder",
 *     "view_builder" = "Drupal\page_manager\Entity\PageViewBuilder",
 *     "form" = {
 *       "add" = "Drupal\page_manager_content_type\Form\LayoutContentTypeAdd",
 *       "edit" = "Drupal\page_manager_content_type\Form\LayoutContentTypeEdit",
 *       "delete" = "Drupal\page_manager_content_type\Form\LayoutContentTypeDelete",
 *     }
 *   },
 *   admin_permission = "administer pages",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "status" = "status",
 *     "entity_type" = "entity_type",
 *     "entity_bundle" = "entity_bundle",
 *     "view_mode" = "view_mode",
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "entity_view_mode",
 *     "entity_type",
 *     "entity_bundle",
 *     "view_mode",
 *     "use_admin_theme",
 *     "display_variants",
 *     "access_logic",
 *     "access_conditions",
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/types/manage/{entity_bundle}/layout/{entity_view_mode}/add",
 *     "edit-form" = "/admin/structure/types/manage/{entity_bundle}/page_manager/edit/{page_manager_content_type}",
 *     "delete-form" = "/admin/structure/types/manage/{entity_bundle}/page_manager/delete/{page_manager_content_type}",
 *   }
 * )
 */

class PageContentType extends Page implements PageInterface {

  /**
   * {@inheritdoc}
   */
  public function urlInfo($rel = 'edit-form', array $options = []) {
    $uri = parent::urlInfo($rel, $options);
    $entity_bundle = $this->get('entity_bundle');
    $entity_view_mode =  $this->get('entity_view_mode');

    $uri->setRouteParameter('entity_bundle', (!empty($entity_bundle)) ? $entity_bundle : 'empty');
    $uri->setRouteParameter('entity_view_mode', (!empty($entity_view_mode)) ? $entity_view_mode : 'empty');

    return $uri;
  }

}
