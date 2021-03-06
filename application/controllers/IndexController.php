<?php

namespace Icinga\Module\Map\Controllers;

use Icinga\Web\Controller\ModuleActionController;

class IndexController extends ModuleActionController
{
    public function indexAction()
    {
        // preserve parameters for dashlets
        //if($this->view->compact) {
        $parameters = $this->filterArray($this->getAllParams(), "^([_]{0,1}(host|service))|\("); //

        array_walk($parameters, function (&$a, $b) {
            $a = "$b=$a";
        });
        //}

        $this->view->id = uniqid();
        $this->view->host = $this->params->get("showHost");
        $this->view->expand = $this->params->get("expand");
        $this->view->fullscreen = ($this->params->get("showFullscreen") == 1);

        $this->view->url_parameters = join("&", $parameters);

        $config = $this->Config();
        $this->view->default_zoom = $this->params->get("default_zoom") ? $this->params->get("default_zoom") : $config->get('map',
            'default_zoom', '4');
        $this->view->default_long = $this->params->get("default_long") ? $this->params->get("default_long") : $config->get('map',
            'default_long', '13.377485');
        $this->view->default_lat = $this->params->get("default_lat") ? $this->params->get("default_lat") : $config->get('map',
            'default_lat', '52.515855');

        $this->view->min_zoom = $this->params->get("min_zoom") ? $this->params->get("min_zoom") : $config->get('map',
            'min_zoom', '2');
        $this->view->max_zoom = $this->params->get("max_zoom") ? $this->params->get("max_zoom") : $config->get('map',
            'max_zoom', '19');

        $this->view->dashletHeight = $config->get('map', 'dashlet_height', '300');
    }

    function filterArray($array, $pattern)
    {
        $matches = preg_grep("/$pattern/", array_keys($array));
        return array_intersect_key($array, array_flip($matches));
    }
}
