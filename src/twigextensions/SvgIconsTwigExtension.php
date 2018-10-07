<?php
/**
 * SVG Icons plugin for Craft CMS 3.x
 *
 * Twig extension to include SVGs from the Feather and Zondicons svg icon libraries directly in your templates.
 *
 * @link      https://michaelpierce.trade/
 * @copyright Copyright (c) 2018 Mike Pierce
 */

namespace monachilada\svgicons\twigextensions;

use monachilada\svgicons\SvgIcons;

use Craft;

/**
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators,
 * global variables, and functions. You can even extend the parser itself with
 * node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
 *
 * @author    Mike Pierce
 * @package   SvgIcons
 * @since     1.0.0
 */
class SvgIconsTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'SvgIcons';
    }

    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'key' | feather }} OR {{ 'key' | zondicons }}
     *
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('feather', [$this, 'getFeather']),
            new \Twig_SimpleFilter('zondicons', [$this, 'getZondicon']),
        ];
    }

    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = svgIcon('library', 'key') %}
     *
    * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('svgIcon', [$this, 'getIcon']),
        ];
    }

    /**
     * Our function called via Twig; it can do anything you want
     *
     * @param null $text
     *
     * @return string
     */
    public function getFeather($key = null)
    {
			return $this->getIcon('feather', $key);
    }
    
    public function getZondicon($key = null)
    {
			return $this->getIcon('zondicons', $key);
    }
    
    public function getIcon($library = null, $icon = null)
    {
	    $dir = SvgIcons::getInstance()->getBasePath();
	    $svg = "$dir/resources/icons/$library/$icon.svg";
	    
	    if(!file_exists($svg)) {
		    Craft::warning(
	          Craft::t(
	              'svgicons',
	              'SVG icon "{name}" doesn’t exist',
	              ['name' => $icon]
	          ),
	          __METHOD__
	      );
      } else {
	      return new \Twig_Markup(file_get_contents($svg), 'UTF-8');
      }
    }
}
