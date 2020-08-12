<?php

namespace App\Services\Discount;

use Doctrine\ORM\EntityManager;

/**
 * Class AbstractMailChimpMemberService
 */
abstract class AbstractMailChimpMemberService
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * AbstractDiscountService constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    // /**
    //  * @param Discount $discount
    //  * @param IUpdateDiscountRequest $updateDiscountRequest
    //  * @return Discount
    //  * @throws \Exception
    //  */
    // public function populateFields(Discount $discount, IUpdateDiscountRequest $updateDiscountRequest)
    // {
    //     $discount->setName($updateDiscountRequest->getName());
    //     $discount->setDescription($updateDiscountRequest->getDescription());

    //     return $discount;
    // }
}