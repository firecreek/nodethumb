<?php

  /**
   * Nodethumb Activation
   *
   * @package  Nodethumb
   * @author   Darren Moore <darren.m@firecreek.co.uk>
   * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
   * @link     http://www.firecreek.co.uk
   */
  class NodethumbActivation 
  {
  
    /**
     * Before activation of plugin
     *
     * @param  object $controller Controller
     * @return boolean
     */
    public function beforeActivation(&$controller)
    {
      return true;
    }
     

    /**
     * Activation of plugin
     *
     * @param object $controller Controller
     * @return void
     */
    public function onActivation(&$controller)
    {
      $controller->Setting->write('Nodethumb.max_width', '120', array('editable' => 1));
      $controller->Setting->write('Nodethumb.max_height', '80', array('editable' => 1));
      $controller->Setting->write('Nodethumb.quality', '90', array('editable' => '1'));
    }
    
    
    /**
     * Before deactivate plugin
     *
     * @param object $controller Controller
     * @return boolean
     */
    public function beforeDeactivation(&$controller)
    {
      return true;
    }
    
    
    /**
     * Deactivate plugin
     *
     * @param object $controller Controller
     * @return void
     */
    public function onDeactivation(&$controller)
    {
      $controller->Setting->deleteKey('Nodethumb.max_width');
      $controller->Setting->deleteKey('Nodethumb.max_height');
      $controller->Setting->deleteKey('Nodethumb.quality');
    }
    
    
  }
 
?>
