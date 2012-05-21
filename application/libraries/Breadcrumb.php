<?php  if (!defined('APPPATH')) exit('No direct script access allowed');
/**
 * Breadcrumb Class
 *
 * Parses URIs and returns Breadcrumb with option to exclude segments
 * It is also possible to set an optional first crumb in the chain
 * 
 * for php5
 *
 * @package Code Ignitor
 * @subpackage Libraries
 * @name Breadcrumb
 * @version Breadcrumb v0.2
 * @copyright Copyright (c) 2006, Holger Lampe
 */
class Breadcrumb
{
    private $obj;
    public $breadcrumb = array();
    public $delimiter = '';
    public $exclude = array();
    public $first_crumb = '';
    private $base = '';
    private $segments = '';

    /**
     * Constructor - Sets Breadcrumb Preferences
     *
     * The constructor can be passed an array of config values
     *
     * @access public
     */
    public function __construct($config = array())
    {
        $this->obj =& get_instance();
        if ( count($config) > 0 )
        {
            $this->initialize($config);
        }
    }

    /**
	 * Initialize Preferences
	 *
	 * @access	public
	 * @param	array $config
	 * @return	void
	 */
    private function initialize($config = array())
    {
        foreach ( $config as $key => $val ) {
            $method = 'set'.$key;
            if ( method_exists($this, $method) )
            {
                $this->$method($val);
            }
        }
    }

    /**
     * Set Breadcrumb Delimiter
     *
     * @access public
     * @param string $delimiter
     * @return void
     */
    public function setDelimiter($delimiter = '&raquo;')
    {
        $this->delimiter = $delimiter;
    }

    /**
     * Set First Crumb
     *
     * @access public
     * @param string $first_crumb
     * @return void
     */
    public function setFirstCrumb($first_crumb = '')
    {
        $this->first_crumb = $first_crumb;
    }

    /**
     * Set Segments To Exclude
     *
     * @access public
     * @param array $exclude
     * @return void
     */
    public function setExcludeSegments($exclude = array())
    {
        $this->exclude = $exclude;
    }

    /**
     * Generates Breadcrumb
     *
     * @access public
     * @param array $exclude segments to exclude
     * @param bool $routed
     * @return array
     */
    public function generate($routed = false)
    {
        $this->segments = $this->getSegments($routed);

        if ( ! empty($this->first_crumb )) {
            array_unshift($this->segments, $this->segments[1]);
            $this->segments[1] = $this->first_crumb;
            $this->segments = array_unique($this->segments);
        } else {
            $this->segments = array_merge($this->segments);
        }

        for ( $i = 0; $i < count($this->segments); $i++ ) {
            if ($this->first_crumb && $i > 1) {
                $this->base = preg_replace('/'.$this->first_crumb.'\/?/', '', $this->base);
            }

            if ( ! in_array($this->segments[$i], $this->exclude )) {
                if ( $i < $this->getEndKey($this->segments )) {
                    $delimiter = $this->delimiter;
                } else {
                    $delimiter = '';
                }
                $this->breadcrumb[] = anchor($this->base.$this->segments[$i], humanize($this->segments[$i]))  . ' ' . $delimiter . ' ';
            }
            $this->base .= $this->segments[$i].'/';
        }
        return $this->breadcrumb;
    }

    /**
     * Fetch The (Routed) URI Segments
     *
     * @access private
     * @param bool $routed
     * @return array
     */
    private function getSegments($routed)
    {
        if ( ! $routed ) {
            return $this->obj->uri->segment_array();
        } else {
            return $this->obj->uri->rsegment_array();
        }
    }

    /**
     * Get Last Element Key
     *
     * @access  private
     * @param array $array
     * @return mixed
     */
    private function getEndKey($array)
    {
        end($array);
        return key($array);
    }
}
?>
