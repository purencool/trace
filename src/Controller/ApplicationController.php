<?php
/**
 * Routes the html requests to the correct twig
 * template files
 *
 * @package    Trace
 * @category
 * @author     Purencool Website Development
 * @license    GPL3
 */
namespace Controller;

use Silex\Application;
use Forms\LoginForm;
use Forms\BuildAWebsite;
use ProcessForms\ProcessBuildAWebsite;
use Symfony\Component\HttpFoundation\Request;


class ApplicationController {



    /**
     *  Build login form
     *
     *  @param array $app application container
     *  @return array building login form
     *
     */
    private function loginForm(Application $app)
    {
        $data = array();
        $formBuild = $app['form.factory']->createBuilder(new LoginForm(), $data);
        $form = $formBuild->getForm();
        $form_view = $form->createView();

        return $param = array(
            'login_form' => $form_view,
        );
    }



    /**
     *  Index action controller
     *
     *  @param array $app application container
     *  @return array for twig templating file
     *
     */
    public function indexAction(Application $app)
    {
        $param = $this->loginForm($app);
        return $app['twig']->render('index.html.twig', $param);
    }

    /**
     *  Contact action controller
     *
     *  @param array $app application container
     *  @return array for twig templating file
     *
     */
    public function contactAction(Application $app)
    {
        $param = $this->loginForm($app);
        return $app['twig']->render('contact.html.twig', $param);
    }

    /**
     *  About action controller
     *
     *  @param array $app application container
     *  @return array for twig templating file
     *
     */
    public function aboutAction(Application $app)
    {
        $param = $this->loginForm($app);
        return $app['twig']->render('about.html.twig', $param);

    }
  
}
