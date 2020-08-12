<?php
declare(strict_types=1);

namespace App\Database\Entities\MailChimp;

use Doctrine\ORM\Mapping as ORM;
use EoneoPay\Utils\Str;
use App\Database\Enums\EmailType;
use App\Database\Enums\MailChimpMemberStatus;

/**
 * Class MailChimpMember
 * @ORM\Entity
 */
class MailChimpMember extends MailChimpEntity
{    
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     * 
     * @var string
     */
    private $memberId;

    /**
     * @ORM\Column(name="list_id", type="string", nullable=false)
     * @var string
     */
    private $listId;

    /**
     * @ORM\Column(name="email_address", type="string", length=100, unique=true, nullable=false )
     * 
     * @var string
     */
    private $emailAddress;

    /**
     * @ORM\Embedded(class = "App\Database\Enums\EmailType")
     * @var EmailType $emailType
     */
    private $emailType;

    /**
     * @ORM\Embedded(class = "App\Database\Enums\MailChimpMemberStatus")
     * @var MailChimpMemberStatus $status
     */
    private  $status;

    /**
     * @ORM\Column(name="language", type="string", nullable=true)
     * @var string|null
     */
    private $language;
    
    /**
     * 
     * @ORM\Column(name="vip", type="boolean", nullable=true)
     * @var bool
     */
    private $vip;

    /**
     * Member Id
     * 
     * @return string
     */
    public function getMemberId(): string
    {
        return $this->memberId;
    }

    /**
     * get List Id
     * 
     * @return string
     */
    public function getListId(): string
    {
        return $this->listId;
    }

    /**
     * Set List Id
     * 
     * @param string $listId
     */
    public function setListId(string $listId): void
    {        
        $this->listId = $listId;
    }

    /**
     * get Email Address
     * 
     * @return string
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    /**
     * set Email Address
     * 
     * @param string $emailAddress
     */
    public function setEmailAddress(string $emailAddress): void
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * get Email Type
     * 
     * @return EmailType
     */
    public function getEmailTypeObject(): EmailType
    {
        return $this->emailType;
    }

    /**
     * get Email Type
     * 
     * @return string
     */
    public function getEmailType(): string
    {
        return $this->getEmailTypeObject()->getSelectedOption();
    }

    /**
     * set Email Type
     * 
     * @param string $emailType
     */
    public function setEmailType(string $emailType): void
    {
        $this->emailType = EmailType::findByValue($emailType);
    }

    /**
     * get getMemberStatus
     * 
     * @return MailChimpMemberStatus
     */
    public function getMemberStatus(): MailChimpMemberStatus
    {
        return $this->status;
    }

    /**
     * get Status
     * 
     * @return string
     */
    public function getStatus(): string
    {
        return $this->getMemberStatus()->getSelectedOption();
    }
        
    /**
     * set Status
     * 
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = MailChimpMemberStatus::findByValue($status);
    }
    
    /**
     * get Language
     * 
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * set Language
     * 
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        if(empty($language)) {
            $language = null;
        }

        $this->language = $language;
    }

    /**
     * get Vip
     * 
     * @return string
     */
    public function getVip(): string
    {
        return $this->vip;
    }

    /**
     * set Vip
     * 
     * @param bool $vip
     */
    public function setVip(bool $vip): void
    {
        if(empty($vip)) {
            $vip = false;
        }

        $this->vip = $vip;
    }

    /**
     * Get validation rules for mailchimp entity.
     *
     * @return array
     */
    public function getValidationRules(): array
    {
        return [
            'list_id' => 'nullable|string',
            'email_address' => 'required|email',
            'email_type' => 'required',
            'status' => 'required',
            'language' => 'nullable|string',
            'vip' => 'required|bool',
        ];
    }

    /**
     * Get array representation of entity.
     *
     * @return array
     */
    public function toArray(): array
    {
        $array = [];
        $str = new Str();

        foreach (\get_object_vars($this) as $property => $value) {
            $array[$str->snake($property)] = $value;
        }

        return $array;
    }
}