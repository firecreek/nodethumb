<?php

  /**
   * Nodethumb Helper
   *
   * To output the thumbnail
   *
   * @category Helper
   * @package  Nodethumb
   * @author   Darren Moore <darren.m@firecreek.co.uk>
   * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
   * @link     http://www.firecreek.co.uk
   */
  class NodethumbHelper extends AppHelper
  {
    /**
     * Helpers
     *
     * @access public
     * @var array
     */
    public $helpers = array('Layout','Html');
    
    /**
     * Position where the thumbnail should be shown
     *
     * @access public
     * @var string
     */
    public $position = 'beforeNodeInfo';


    public function thumbnail()
    {
      if(!$this->Layout->node('CustomFields.thumb')) { return false; }
      
      return '<div class="thumbnail">'.$this->Html->image('nodethumb/'.$this->Layout->node('CustomFields.thumb')).'</div>';
    }

    /**
     * Called before LayoutHelper::nodeInfo()
     *
     * @return string
     */
    public function beforeNodeInfo()
    {
      if($this->position == 'beforeNodeInfo')
      {
        return $this->thumbnail();
      }
    }
  
  
    /**
     * Called after LayoutHelper::nodeInfo()
     *
     * @return string
     */
    public function afterNodeInfo()
    {
      if($this->position == 'afterNodeInfo')
      {
        return $this->thumbnail();
      }
    }
      
      
    /**
     * Called before LayoutHelper::nodeBody()
     *
     * @return string
     */
    public function beforeNodeBody()
    {
      if($this->position == 'beforeNodeBody')
      {
        return $this->thumbnail();
      }
    }
      
      
    /**
     * Called after LayoutHelper::nodeBody()
     *
     * @return string
     */
    public function afterNodeBody()
    {
      if($this->position == 'afterNodeBody')
      {
        return $this->thumbnail();
      }
    }
    
      
    /**
     * Called before LayoutHelper::nodeMoreInfo()
     *
     * @return string
     */
    public function beforeNodeMoreInfo()
    {
      if($this->position == 'beforeNodeMoreInfo')
      {
        return $this->thumbnail();
      }
    }
    
    
    /**
     * Called after LayoutHelper::nodeMoreInfo()
     *
     * @return string
     */
    public function afterNodeMoreInfo()
    {
      if($this->position == 'afterNodeMoreInfo')
      {
        return $this->thumbnail();
      }
    }
    
  }
  
?>
