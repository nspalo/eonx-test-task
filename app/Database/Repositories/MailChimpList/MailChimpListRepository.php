<?php

namespace App\Database\Repositories\MailChimpList;

use Doctrine\ORM\EntityRepository;

/**
 * Class MailChimpListRepository
 */
class MailChimpListRepository extends EntityRepository implements IMailChimpListRepository
{
    public function findById($id)
    {
        return $this->findOneBy(['listId' => $id]);
    }
}
