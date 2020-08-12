<?php
declare(strict_types=1);

/** @var \Laravel\Lumen\Routing\Router $router */

// MailChimp group
$router->group(['prefix' => 'mailchimp', 'namespace' => 'MailChimp'], function () use ($router) {

    // Lists group
    $router->group(['prefix' => 'lists'], function () use ($router) {
        $router->post('/', 'ListsController@create');
        $router->get('/{listId}', 'ListsController@show');
        $router->put('/{listId}', 'ListsController@update');
        $router->delete('/{listId}', 'ListsController@remove');
    });

    // Members
    $router->group(['prefix' => 'lists/{listId}/members'], static function () use ($router) {
        $router->post('/', 'MemberController@create');
        $router->get('/{memberId}', 'MemberController@show');
        $router->put('/{memberId}', 'MemberController@update');
        $router->delete('/{memberId}', 'MemberController@remove');
    });

});
