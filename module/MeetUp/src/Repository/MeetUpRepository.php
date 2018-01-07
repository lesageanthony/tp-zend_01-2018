<?php

declare(strict_types=1);

namespace MeetUp\Repository;

use MeetUp\Entity\MeetUp;
use Doctrine\ORM\EntityRepository;

final class MeetUpRepository extends EntityRepository
{

    public function add($meetup) : void
    {
        $this->getEntityManager()->persist($meetup);
        $this->getEntityManager()->flush($meetup);
    }
    public function edit($meetup) : void
    {
        $this->getEntityManager()->persist($meetup);
        $this->getEntityManager()->flush($meetup);
    }
    public function delete($meetup) : void
    {
        $this->getEntityManager()->remove($meetup);
        $this->getEntityManager()->flush($meetup);

    }


    public function createMeetUp(string $name, string $description, string $begin, string $end)
    {
        return new MeetUp($name, $description, $begin, $end);
    }
    public function editMeetUp(MeetUp $oldMeetUp, string $name, string $description, string $begin, string $end)
    {
        $oldMeetUp->setTitle($name);
        $oldMeetUp->setDescription($description);
        $oldMeetUp->setBegin($begin);
        $oldMeetUp->setEnd($end);
        return ($oldMeetUp);
    }
}
