<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	public function initialize()
	{
		$this->view->setTemplateBefore('public');
		$this->loadDefaultAssets();
	}

    /**
     * loadDefaultAssets function.
     *
     * @access private
     * @return void
     */
    private function loadDefaultAssets()
    {
        $this->assets
            ->addCss(
                '//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
                false
            )//rollback from 3.2.0 - changes on tables
            ->addCss('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css', false)
            ->addCss('//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', false)
//            ->addCss('css/bootstrap/bootstrap.min.css')
            ->addCss('css/bootstrap/bootstrap-theme.min.css')
            ->addCss('css/bootstrap/docs.min.css')
            ->addCss('css/css.css')
            ->addCss('css/dashboard.css');

        $this->assets
            ->addJs('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', false)
            ->addJs('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js', false)
            ->addJs('//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', false)
            ->addJs('js/bootstrap/bootstrap.min.js');
    }
}