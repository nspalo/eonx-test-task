<?php
declare(strict_types=1);

namespace App\Database\Enums;

use Doctrine\ORM\Mapping as ORM;
use App\Database\Enums;

/**
 * @ORM\Embeddable
 */
class MailChimpMemberStatus extends Enum
{
    const STATUS_SUBSCRIBED = 'subscribed';
    const STATUS_UNSUBSCRIBED = 'unsubscribed';
    const STATUS_CLEANED = 'cleaned';
    const STATUS_PENDING = 'pending';
    const STATUS_TRANSACTIONAL = 'transactional';
    const STATUS_ARCHIVED = 'archived';    
    
    /**
     * @return MailChimpMemberStatus
     */
    public static function status_subscribed()
    {
        return new self(self::STATUS_SUBSCRIBED);
    }
    
    /**
     * @return MailChimpMemberStatus
     */
    public static function status_unsubscribed()
    {
        return new self(self::STATUS_UNSUBSCRIBED);
    }
    
    /**
     * @return MailChimpMemberStatus
     */
    public static function status_cleaned()
    {
        return new self(self::STATUS_CLEANED);
    }
    
    /**
     * @return MailChimpMemberStatus
     */
    public static function status_pending()
    {
        return new self(self::STATUS_PENDING);
    }
    
    /**
     * @return MailChimpMemberStatus
     */
    public static function status_transactional()
    {
        return new self(self::STATUS_TRANSACTIONAL);
    }
    
    /**
     * @return MailChimpMemberStatus
     */
    public static function status_archived()
    {
        return new self(self::STATUS_ARCHIVED);
    }
}