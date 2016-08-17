<?php

/**
 * @file
 * Hooks provided by the Field Permission module.
 */

/**
 * Defines the owner of an entity.
 *
 * Because not all entities have uids, this hook allows other modules to specify
 * one.
 *
 * @param int $uid
 *   The userid that will be checked against the current user's account->uid.
 * @param object $entity
 *   The entity this field belongs to.
 */
function hook_field_permissions_userid_ENTITY_TYPE_alter(&$uid, $entity) {
  // This example always assigns user 15 as the owner of an entity.
  $uid = 15;
}
