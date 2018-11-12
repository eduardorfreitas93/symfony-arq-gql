<?php
declare(strict_types=1);

namespace App\Service\User\Handler;

use App\Entity\Role;
use App\Entity\User;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use App\Service\HandlerInterface;
use App\Service\User\Command\CreateUserCommand;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateUserHandler implements HandlerInterface
{
    /** @var UserPasswordEncoderInterface */
    private $passwordEncoder;

    /** @var UserRepository */
    private $userRepository;

    /** @var RoleRepository */
    private $roleRepository;

    public function __construct(
        UserPasswordEncoderInterface $passwordEncoder,
        UserRepository $userRepository,
        RoleRepository $roleRepository
    ) {
        $this->passwordEncoder = $passwordEncoder;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function handle(CreateUserCommand $command): void
    {
        /** @var User $user */
        $user = new User();

        $user->setUsername($command->getName());
        $user->setEmail($command->getEmail());
        $user->setPassword($this->passwordEncoder->encodePassword($user, $command->getPassword()));

        /** @var Role $roles */
        $roles = $this->roleRepository->findByRole(Role::ADMINISTRATIVE_ROLES);

        /** @var Role $role */
        foreach ($roles as $role) {
            $user->addRole($role);
        }

        $this->userRepository->save($user);
    }
}
