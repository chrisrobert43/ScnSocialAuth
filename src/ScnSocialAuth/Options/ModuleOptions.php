<?php

namespace ScnSocialAuth\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    protected $providers = array('facebook', 'google');

    /**
     * @var string
     */
    protected $userProviderEntityClass = 'ScnSocialAuth\Entity\UserProvider';

    /**
     * @var boolean
     */
    protected $facebookEnabled = false;

    /**
     * @var string
     */
    protected $facebookClientId;

    /**
     * @var string
     */
    protected $facebookSecret;

    /**
     * @var string
     */
    protected $facebookScope;

    /**
     * @var string
     */
    protected $facebookDisplay;

    /**
     * @var boolean
     */
    protected $googleEnabled = false;

    /**
     * @var string
     */
    protected $googleClientId;

    /**
     * @var string
     */
    protected $googleSecret;

    /**
     * @var string
     */
    protected $googleScope;

    /**
     * get an array of enabled providers
     *
     * @return array
     */
    public function getEnabledProviders()
    {
        $enabledProviders = array();
        foreach ($this->providers as $provider) {
            $method = 'get' . $provider . 'Enabled';
            if ($this->$method()) {
                $enabledProviders[] = $provider;
            }
        }
        return $enabledProviders;
    }

	/**
     * set user provider entity class
     *
     * @param string $userProviderEntityClass
     * @return ModuleOptions
     */
    public function setUserProviderEntityClass($userProviderEntityClass)
    {
        $this->userProviderEntityClass = (string) $userProviderEntityClass;
        return $this;
    }

    /**
     * get user provider entity class
     *
     * @return string
     */
    public function getUserProviderEntityClass()
    {
        return $this->userProviderEntityClass;
    }

    /**
     * set facebook enabled
     *
     * @param boolean $facebookEnabled
     * @return ModuleOptions
     */
    public function setFacebookEnabled($facebookEnabled)
    {
        $this->facebookEnabled = (boolean) $facebookEnabled;
        return $this;
    }

    /**
     * get facebook enabled
     *
     * @return string
     */
    public function getFacebookEnabled()
    {
        return $this->facebookEnabled;
    }

    /**
     * set facebook client id
     *
     * @param boolean $facebookClientId
     * @return ModuleOptions
     */
    public function setFacebookClientId($facebookClientId)
    {
        $this->facebookClientId = (string) $facebookClientId;
        return $this;
    }

    /**
     * get facebook client id
     *
     * @return string
     */
    public function getFacebookClientId()
    {
        return $this->facebookClientId;
    }

    /**
     * set facebook secret
     *
     * @param boolean $facebookSecret
     * @return ModuleOptions
     */
    public function setFacebookSecret($facebookSecret)
    {
        $this->facebookSecret = (string) $facebookSecret;
        return $this;
    }

    /**
     * get facebook secret
     *
     * @return string
     */
    public function getFacebookSecret()
    {
        return $this->facebookSecret;
    }

    /**
     * set facebook scope
     *
     * @param boolean $facebookScope
     * @return ModuleOptions
     */
    public function setFacebookScope($facebookScope)
    {
        $this->facebookScope = (string) $facebookScope;
        return $this;
    }

    /**
     * get facebook scope
     *
     * @return string
     */
    public function getFacebookScope()
    {
        return $this->facebookScope;
    }

    /**
     * set facebook display
     *
     * @param boolean $facebookDisplay
     * @return ModuleOptions
     */
    public function setFacebookDisplay($facebookDisplay)
    {
        $this->facebookDisplay = (string) $facebookDisplay;
        return $this;
    }

    /**
     * get facebook display
     *
     * @return string
     */
    public function getFacebookDisplay()
    {
        return $this->facebookDisplay;
    }

    /**
     * set google enabled
     *
     * @param boolean $googleEnabled
     * @return ModuleOptions
     */
    public function setGoogleEnabled($googleEnabled)
    {
        $this->googleEnabled = (boolean) $googleEnabled;
        return $this;
    }

    /**
     * get google enabled
     *
     * @return string
     */
    public function getGoogleEnabled()
    {
        return $this->googleEnabled;
    }

    /**
     * set google client id
     *
     * @param boolean $googleClientId
     * @return ModuleOptions
     */
    public function setGoogleClientId($googleClientId)
    {
        $this->googleClientId = (string) $googleClientId;
        return $this;
    }

    /**
     * get google client id
     *
     * @return string
     */
    public function getGoogleClientId()
    {
        return $this->googleClientId;
    }

    /**
     * set google secret
     *
     * @param boolean $googleSecret
     * @return ModuleOptions
     */
    public function setGoogleSecret($googleSecret)
    {
        $this->googleSecret = (string) $googleSecret;
        return $this;
    }

    /**
     * get google secret
     *
     * @return string
     */
    public function getGoogleSecret()
    {
        return $this->googleSecret;
    }

    /**
     * set google scope
     *
     * @param boolean $googleScope
     * @return ModuleOptions
     */
    public function setGoogleScope($googleScope)
    {
        $this->googleScope = (string) $googleScope;
        return $this;
    }

    /**
     * get google scope
     *
     * @return string
     */
    public function getGoogleScope()
    {
        return $this->googleScope;
    }
}
