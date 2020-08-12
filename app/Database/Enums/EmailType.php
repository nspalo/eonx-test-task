<?php
declare(strict_types=1);

namespace App\Database\Enums;

use Doctrine\ORM\Mapping as ORM;
use App\Database\Enums;

/**
 * @ORM\Embeddable
 */
class EmailType extends Enum
{
    const TYPE_HTML = 'html';
    const TYPE_TXT = 'txt'; 
    
    /**
     * @return EmailType
     */
    public static function TYPE_HTML()
    {
        return new self(self::TYPE_HTML);
    }
    
    /**
     * @return EmailType
     */
    public static function TYPE_TXT()
    {
        return new self(self::TYPE_TXT);
    }    
}