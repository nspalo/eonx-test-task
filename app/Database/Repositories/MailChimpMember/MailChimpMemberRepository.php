<?php

namespace App\Database\Repositories\MailChimpMember;

use Doctrine\ORM\EntityRepository;

/**
 * Class MailChimpMemberRepository
 */
class MailChimpMemberRepository extends EntityRepository implements IMailChimpMemberRepository
{
    public function findById($id)
    {
        return $this->findOneBy(['memberId' => $id]);
    }
}
