<?php

namespace App\GraphQL\Mutations;

use App\DTO\UserWithSpecializationDTO;
use App\Models\Specialization;
use App\Models\User;
use App\Models\UserSpecialization;

final class CreateUserWithSpecialization
{
    /**
     * @param null $_
     * @param array{} $args
     */
    public function __invoke($_, array $args)
    {
        $dto = new UserWithSpecializationDTO($args);

        $user = User::create([
            'name' => $dto->getName(),
            'status_id' => $dto->getStatusId()
        ]);

        foreach ($dto->getSpecializations()['create'] as $specData) {

            $specialization = Specialization::create([
                'name' => $specData['name']
            ]);

            UserSpecialization::create([
                'user_id' => $user->id,
                'specialization_id' => $specialization->id
            ]);
        }

        return $user;
    }
}
