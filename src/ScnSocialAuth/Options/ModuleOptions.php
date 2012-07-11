<?php

namespace ScnSocialAuth\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
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
     * get an array of enabled providers
     *
     * @return array
     */
    public function getEnabledProviders()
    {
        $providers = array('facebook');
        $enabledProviders = array();
        foreach ($providers as $provider) {
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
}
