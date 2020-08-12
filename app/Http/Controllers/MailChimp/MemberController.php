<?php
declare(strict_types=1);

namespace App\Http\Controllers\MailChimp;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Mailchimp\Mailchimp;
use Doctrine\ORM\EntityManagerInterface;
use App\Http\Controllers\Controller;
use App\Database\Entities\MailChimp\MailChimpMember;
use App\Database\Repositories\MailChimpList\IMailChimpListRepository;
use App\Database\Repositories\MailChimpMember\IMailChimpMemberRepository;

/**
 * Class MemberController
 */
class MemberController extends Controller
{
    /**
     * @var \Mailchimp\Mailchimp
     */
    private $mailChimp;

    /**
     * @var $mailChimpMember
     */
    private $mailChimpMember;

    /**
     * @var $mailChimpListRepository
     */
    private $mailChimpListRepository;

    /**
     * @var $mailChimpMemberRepository
     */
    private $mailChimpMemberRepository;

    /**
     * User MemberController.
     * @param EntityManagerInterface $entityManager
     * @param Mailchimp $mailchimp,
     * @param IMailChimpListRepository $mailChimpListRepository,
     * @param IMailChimpMemberRepository $mailChimpMemberRepository
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        Mailchimp $mailchimp,
        IMailChimpListRepository $mailChimpListRepository,
        IMailChimpMemberRepository $mailChimpMemberRepository
    )
    {
        parent::__construct($entityManager);
        $this->mailChimp = $mailchimp;
        $this->mailChimpListRepository = $mailChimpListRepository;
        $this->mailChimpMemberRepository = $mailChimpMemberRepository;
    }

    /**
     * Create MailChimp Member.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $listId
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request, string $listId): JsonResponse
    {
        if (null === ($list = $this->mailChimpListRepository->findById($listId))) {
            return $this->errorResponse(
                ['message' => \sprintf('MailChimpList[%s] not found', $listId)],
                404
            );
        }

        $member = new MailChimpMember($request->all());
        
        $validator = $this->getValidationFactory()->make(
            $member->toMailChimpArray(),
            $member->getValidationRules()
        );
        
        if ($validator->fails()) {
            // Return error response if validation failed
            return $this->errorResponse([
                'message' => 'Invalid data given',
                'errors' => $validator->errors()->toArray()
            ]);
        }

        try {

            // Save list into db
            $this->saveEntity($member);

            // Save list into MailChimp
            $response = $this->mailChimp->post(
                "lists/{$list->getMailChimpId()}/members",
                $member->toMailChimpArray()
            );

            // Set MailChimp id on the list and save list into db
            $this->saveEntity($member->setMailChimpId($response->get('id')));

        } catch (Exception $exception) {

            // Return error response if something goes wrong
            return $this->errorResponse(['message' => $exception->getMessage()]);
        }

        return $this->successfulResponse($member->toArray());
    }

    /**
     * Remove MailChimp Member.
     *
     * @param string $memberId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(string $memberId): JsonResponse
    {
        if (null === ($member = $this->mailChimpMemberRepository->findById($memberId))) {
            return $this->errorResponse(
                ['message' => \sprintf('MailChimpMember[%s] not found', $memberId)],
                404
            );
        }

        try {

            // Remove member from database
            $this->removeEntity($member);

            // Remove member from MailChimp
            $this->mailChimp->delete(
                \sprintf(
                    'lists/%s/members/%s',
                    $member->getListId(),
                    $member->getMemberId()
                )
            );

        } catch (Exception $exception) {
            return $this->errorResponse(['message' => $exception->getMessage()]);
        }

        return $this->successfulResponse(['message' => 'member have been deleted.']);
    }

    /**
     * Retrieve and return MailChimp Member.
     *
     * @param string $memberId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $memberId): JsonResponse
    {
        if (null === ($member  = $this->mailChimpMemberRepository->findById($memberId))) {
            return $this->errorResponse(
                ['message' => \sprintf('MailChimpMember[%s] not found', $memberId)],
                404
            );
        }

        return $this->successfulResponse($member->toArray());
    }

    /**
     * Update MailChimp Member.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $listId
     * @param string $memberId
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $listId, string $memberId): JsonResponse
    {
        if (null === ($member  = $this->mailChimpMemberRepository->findById($memberId))) {
            return $this->errorResponse(
                ['message' => \sprintf('MailChimpMember[%s] not found', $memberId)],
                404
            );
        }

        // Update list properties
        $member->fill($request->all());

        // Validate entity
        $validator = $this->getValidationFactory()->make(
            $member->toMailChimpArray(),
            $member->getValidationRules()
        );

        if ($validator->fails()) {
            // Return error response if validation failed
            return $this->errorResponse([
                'message' => 'Invalid data given',
                'errors' => $validator->errors()->toArray()
            ]);
        }

        try {

            // Update list into database
            $this->saveEntity($member);

            // Update list into MailChimp
            $this->mailChimp->patch(
                \sprintf('lists/%s',
                    $member->getMemberId()
                ),
                $member->toMailChimpArray()
            );

        } catch (Exception $exception) {

            return $this->errorResponse(['message' => $exception->getMessage()]);
        }

        return $this->successfulResponse($list->toArray());     
    }
}
