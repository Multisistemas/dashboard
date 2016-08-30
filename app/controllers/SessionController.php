<?php

class SessionController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Sign Up/Sign In');
        parent::initialize();
    }

    public function indexAction()
    {
    	        echo "<h1>Hello!</h1>";
    }

    /**
     * Register an authenticated user into session data
     *
     * @param Users $user
     */
    private function _registerSession(Users $user)
    {
        $this->session->set('auth', array(
            'id' => $user->id,
            'name' => $user->name
        ));
    }

    public function signupAction()
    {
    	if ($this->request->isPost()) {
            if ($this->request->getPost()) {
                $user = new Users();

                $user->assign(array(
                        'username' => $this->request->getPost('username', 'striptags'),
                        'email' => $this->request->getPost('email'),
                        'password' => $this->security->hash($this->request->getPost('password')),
                        'fullName' => $this->request->getPost('fullName')
                ));
                if ($user->save()) {
                    return $this->dispatcher->forward(array(
                            'controller' => 'session',
                            'action' => 'index'
                    ));
            	}

                $this->flash->error($user->getMessages());
                
            }
            
        }
    }
    public function loginAction()
    {
        echo " <h2> You Login Form </h2>";
    }
    public function loginOpauthAction()
    {
        $this->session->set('opauth',$this->auth->login());
/*
         var_dump($this->auth);
         $this->view->disable();
*/

    }
    public function successAction()
    {
         $auths = $this->session->get('opauth');
         if($auths['auth']['raw']['hd'] != 'multisistemas.com.sv')
         {
             $this->view->pick('session/invalid');
             $this->view->message = "Only Multisistemas employees allowed!";
         }
         else
         {
             $this->view->pick('session/success');
             $modules = array( 'modules' => array(
                    'ERP: Entreprise Resources Planning' => 'https://mseicorp.com/erp',
                    'DMS: Document Management System' => 'https://mseicorp.com/wiki',
                    'LMS: Learning Management System' => 'https://mseicorp.com/lms',
                    'Multisistemas Website' => 'http://multisistemas.com.sv',
                    'Gestión Total Website' => 'http://gestiontotal.net',
                    'Google Drive' => 'http://docs.multisistemas.com.sv',
                    'Google Mail' => 'https://mail.google.com',
                    'Manuales' => '#',
                    'Manual de Usuario ERP' => 'http://manualdolibarr.com/guia-dolibarr37.php',
                    'Manual de Usuario DMS' => 'https://www.dokuwiki.org/start?id=es:manual',
                    'Guía rápida LMS' => 'https://docs.moodle.org/all/es/Gu%C3%ADa_r%C3%A1pida_del_usuario',
             ));
             $this->view->auths = array_merge($auths, $modules);

         }

/*
         var_dump($this->view->message);
         $this->view->disable();
*/
    }

    /**
         * Confirms an e-mail, if the user must change its password then changes it
    */
    public function confirmEmailAction()
    {
            $code = $this->dispatcher->getParam('code');

            $confirmation = EmailConfirmations::findFirstByCode($code);
            if (!$confirmation) {
                    return $this->dispatcher->forward(array(
                            'controller' => 'index',
                            'action' => 'index'
                    ));
            }
            if ($confirmation->confirmed <> 'N') {
                $this->flash->success('The email was successfully confirmed. Now you must change your password');
                return $this->dispatcher->forward(array(
                        'controller' => 'session',
                        'action' => 'login'
                ));
            }
            //confirmation
            $confirmation->confirmed = 'Y';
            $confirmation->user->active = 'Y';

            /**
            * Change the confirmation to 'confirmed' and update the user to 'active'
            */
            if ($confirmation->save()) {
                    return $this->dispatcher->forward(array(
                            'controller' => 'session',
                            'action' => 'login'
                    ));
            }
            else{
                foreach ($confirmation->getMessages() as $message) {
                        $this->flash->error($message);
                }
            }
    }

    /**
     * Finishes the active session redirecting to the index
     *
     * @return unknown
     */
    public function endAction()
    {
        $this->session->remove('auth');
        $this->flash->success('Goodbye!');
        return $this->forward('index/index');
    }

}

