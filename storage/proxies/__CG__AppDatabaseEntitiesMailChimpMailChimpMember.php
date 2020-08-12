<?php

namespace DoctrineProxies\__CG__\App\Database\Entities\MailChimp;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class MailChimpMember extends \App\Database\Entities\MailChimp\MailChimpMember implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpMember' . "\0" . 'memberId', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpMember' . "\0" . 'listId', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpMember' . "\0" . 'emailAddress', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpMember' . "\0" . 'emailType', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpMember' . "\0" . 'status', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpMember' . "\0" . 'language', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpMember' . "\0" . 'vip'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpMember' . "\0" . 'memberId', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpMember' . "\0" . 'listId', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpMember' . "\0" . 'emailAddress', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpMember' . "\0" . 'emailType', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpMember' . "\0" . 'status', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpMember' . "\0" . 'language', '' . "\0" . 'App\\Database\\Entities\\MailChimp\\MailChimpMember' . "\0" . 'vip'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (MailChimpMember $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getMemberId(): string
    {
        if ($this->__isInitialized__ === false) {
            return  parent::getMemberId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMemberId', []);

        return parent::getMemberId();
    }

    /**
     * {@inheritDoc}
     */
    public function getListId(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getListId', []);

        return parent::getListId();
    }

    /**
     * {@inheritDoc}
     */
    public function setListId(string $listId): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setListId', [$listId]);

        parent::setListId($listId);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmailAddress(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmailAddress', []);

        return parent::getEmailAddress();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmailAddress(string $emailAddress): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmailAddress', [$emailAddress]);

        parent::setEmailAddress($emailAddress);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmailTypeObject(): \App\Database\Enums\EmailType
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmailTypeObject', []);

        return parent::getEmailTypeObject();
    }

    /**
     * {@inheritDoc}
     */
    public function getEmailType(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmailType', []);

        return parent::getEmailType();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmailType(string $emailType): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmailType', [$emailType]);

        parent::setEmailType($emailType);
    }

    /**
     * {@inheritDoc}
     */
    public function getMemberStatus(): \App\Database\Enums\MailChimpMemberStatus
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMemberStatus', []);

        return parent::getMemberStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', []);

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus(string $status): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', [$status]);

        parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getLanguage(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLanguage', []);

        return parent::getLanguage();
    }

    /**
     * {@inheritDoc}
     */
    public function setLanguage(string $language): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLanguage', [$language]);

        parent::setLanguage($language);
    }

    /**
     * {@inheritDoc}
     */
    public function getVip(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVip', []);

        return parent::getVip();
    }

    /**
     * {@inheritDoc}
     */
    public function setVip(bool $vip): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVip', [$vip]);

        parent::setVip($vip);
    }

    /**
     * {@inheritDoc}
     */
    public function getValidationRules(): array
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getValidationRules', []);

        return parent::getValidationRules();
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toArray', []);

        return parent::toArray();
    }

    /**
     * {@inheritDoc}
     */
    public function toMailChimpArray(): array
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toMailChimpArray', []);

        return parent::toMailChimpArray();
    }

    /**
     * {@inheritDoc}
     */
    public function fill(array $data): \App\Database\Entities\Entity
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'fill', [$data]);

        return parent::fill($data);
    }

}