<?php

declare(strict_types=1);

namespace MeetUp\Entity;

use Ramsey\Uuid\Uuid;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class MeetUp
 *
 * Attention : Doctrine génère des classes proxy qui étendent les entités, celles-ci ne peuvent donc pas être finales !
 *
 * @package Application\EntityF
 * @ORM\Entity(repositoryClass="\MeetUp\Repository\MeetUpRepository")
 * @ORM\Table(name="meetups")
 */
class MeetUp
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     **/
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=2000, nullable=false)
     */
    private $description = '';

    /**
     * @ORM\Column(type="string", length=30, nullable=false)
     */
    private $begin;

    /**
     * @ORM\Column(type="string", length=30, nullable=false)
     */
    private $end;

    public function __construct(string $title, string $description = '', string $begin = '', string $end = '')
    {
        $this->id = Uuid::uuid4()->toString();
        $this->title = $title;
        $this->description = $description;
        $this->begin = $begin;
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getBegin() : string
    {
        return $this->begin;
    }

    /**
     * @return string
     */
    public function getEnd() : string
    {
        return $this->end;
    }

    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }
    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }
    public function setBegin(string $begin) : void
    {
        $this->begin = $begin;
    }
    public function setEnd(string $end) : void
    {
        $this->end = $end;
    }
}
