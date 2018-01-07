<?php

declare(strict_types=1);

namespace MeetUp\Controller;

use MeetUp\Entity\MeetUp;
use MeetUp\Form\MeetUpForm;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

final class IndexControllerFactory
{
    public function __invoke(ContainerInterface $container) : IndexController
    {
        $meetUpRepository = $container->get(EntityManager::class)->getRepository(MeetUp::class);
        $meetUpForm = $container->get(MeetUpForm::class);

        return new IndexController($meetUpRepository, $meetUpForm);
    }
}
