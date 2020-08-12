<?php
declare(strict_types=1);

namespace App\Database\Enums;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Enum
 * @ORM\Embeddable
 */
abstract class Enum
{
    /**
     * @ORM\Column(type="string")
     * @var bool|float|int|null|string
     */
    protected $value;

    /** 
     * __construct()
     * @param $value
     */
    protected function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return bool|float|int|null|string
     */
    public function getSelectedOption()
    {
        return $this->value;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public static function getAvailableOptions()
    {
        $reflection = new \ReflectionClass(get_called_class());
        return $reflection->getConstants();
    }
    
    /**
     * @param $value
     * @return static
     */
    public static function findByValue($value)
    {
        return new static($value);
    }
}