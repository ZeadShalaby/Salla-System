<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        $data = [
            "id" => $user->id,
            "name" => $user->name,
            "email" => $user->email,
            "phone" => $user->phone,
            "role" => $user->getRoleName(),
        ];

        //? Add token only if it exists
        if (!empty($user->token)) {
            $data['token'] = $user->token;
        }

        return $data;
    }
}
