<?php

  /**
   * Admin menu
   *
   * Link to settings
   */
  Croogo::hookAdminMenu('Nodethumb');


  /**
   * Admin tab
   *
   * Thumbnail tab addition to add and edit
   */
  Croogo::hookAdminTab('Nodes/admin_add', 'Thumbnail', 'nodethumb.admin_tab_node');
  Croogo::hookAdminTab('Nodes/admin_edit', 'Thumbnail', 'nodethumb.admin_tab_node');
  

  /**
   * Helper hook
   *
   * Add the thumbnail to the nodes
   */
  Croogo::hookHelper('Nodes', 'Nodethumb.Nodethumb');

?>
