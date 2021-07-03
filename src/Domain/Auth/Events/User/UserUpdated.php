<?php

namespace Domain\Auth\Events\User;

use Illuminate\Queue\SerializesModels;
use Domain\Auth\Models\User;

/**
 * Class UserUpdated.
 */
class UserUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $user;

    /**
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
