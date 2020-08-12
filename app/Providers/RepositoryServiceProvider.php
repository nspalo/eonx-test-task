<?php

namespace App\Providers;

// Laravel
use Illuminate\Support\ServiceProvider;

// Doctrine
use Doctrine\ORM\EntityManager;
use App\Database\Entities\MailChimp\MailChimpList;
use App\Database\Entities\MailChimp\MailChimpMember;
use App\Database\Repositories\MailChimpList\IMailChimpListRepository;
use App\Database\Repositories\MailChimpList\MailChimpListRepository;
use App\Database\Repositories\MailChimpMember\IMailChimpMemberRepository;
use App\Database\Repositories\MailChimpMember\MailChimpMemberRepository;

/**
 * Class RepositoryServiceProvider
 */
class RepositoryServiceProvider extends ServiceProvider
{    
    protected $repositories = [
        [
            'interface' => IMailChimpListRepository::class,
            'repository' => MailChimpListRepository::class,
            'entity' => MailChimpList::class
        ],
        [
            'interface' => IMailChimpMemberRepository::class,
            'repository' => MailChimpMemberRepository::class,
            'entity' => MailChimpMember::class
        ],
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $aRepository) {
            $this->app->bind($aRepository['interface'], function ($app) use ($aRepository) {
                /** @var EntityManager $entityManager */
                $entityManager = $app['em'];
                return new $aRepository['repository'](
                    $entityManager,
                    $entityManager->getClassMetaData($aRepository['entity'])
                );
            });
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
