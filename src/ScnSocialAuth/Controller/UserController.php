<?php
namespace ScnSocialAuth\Controller;

use Hybrid_Auth;
use ScnSocialAuth\Options\ModuleOptions;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ModelInterface;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
    /**
     * @var Hybrid_Auth
     */
    protected $hybridAuth;

    /**
     * @var ModuleOptions
     */
    protected $options;

    public function facebookLoginAction()
    {
        $hybridAuth = $this->getHybridAuth();
        $provider = 'facebook';
        //TODO Replace with route assembly
        $redirectUrl = '/user/authenticate?provider=' . $provider;
        $adapter = $hybridAuth->authenticate(
            $provider,
            array(
                'hauth_return_to' => $redirectUrl,
            )
        );
        return $this->redirect()->toUrl($redirectUrl);
    }

    public function loginAction()
    {
        $zfcUserLogin = $this->forward()->dispatch('zfcuser', array('action' => 'login'));
        if (!$zfcUserLogin instanceof ModelInterface) {
            return $zfcUserLogin;
        }
        $viewModel = new ViewModel();
        $viewModel->addChild($zfcUserLogin, 'zfcUserLogin');
        $viewModel->setVariable('options', $this->getOptions());
        return $viewModel;
    }

    public function logoutAction()
    {
        Hybrid_Auth::logoutAllProviders();
        return $this->forward()->dispatch('zfcuser', array('action' => 'logout'));
    }

    /**
     * Get the Hybrid_Auth object
     *
     * @return Hybrid_Auth
     */
    public function getHybridAuth()
    {
        if (!$this->hybridAuth) {
            $this->hybridAuth = $this->getServiceLocator()->get('HybridAuth');
        }
        return $this->hybridAuth;
    }

    /**
     * Set the Hybrid_Auth object
     *
     * @param Hybrid_Auth $hybridAuth
     * @return UserController
     */
    public function setHybridAuth(Hybrid_Auth $hybridAuth)
    {
        $this->hybridAuth = $hybridAuth;
        return $this;
    }

	/**
     * set options
     *
     * @param ModuleOptions $options
     * @return UserController
     */
    public function setOptions(ModuleOptions $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * get options
     *
     * @return UserControllerOptionsInterface
     */
    public function getOptions()
    {
        if (!$this->options instanceof ModuleOptions) {
            $this->setOptions($this->getServiceLocator()->get('ScnSocialAuth-ModuleOptions'));
        }
        return $this->options;
    }
}
