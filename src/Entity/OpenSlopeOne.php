<?php

declare(strict_types=1);

namespace Xearts\OpenSlopeOneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Xearts\OpenSlopeOneBundle\Repository\OpenSlopeOneRepository;

/**
 * @ORM\Table(name="open_slope_one")
 * @ORM\Entity(repositoryClass=OpenSlopeOneRepository::class)
 */
class OpenSlopeOne
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(type="integer", name="item1_id")
     */
    private $item1Id;

    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(type="integer", name="item2_id")
     */
    private $item2Id;

    /**
     * @var int
     * @ORM\Column(type="integer", name="times")
     */
    private $times;

    /**
     * @var string
     * @ORM\Column(type="decimal", name="rating", precision=18, scale=4)
     */
    private $rating;

    /**
     * @return int
     */
    public function getItem1Id(): int
    {
        return $this->item1Id;
    }

    /**
     * @param int $item1Id
     */
    public function setItem1Id(int $item1Id): self
    {
        $this->item1Id = $item1Id;

        return $this;
    }

    /**
     * @return int
     */
    public function getItem2Id(): int
    {
        return $this->item2Id;
    }

    /**
     * @param int $item2Id
     */
    public function setItem2Id(int $item2Id): self
    {
        $this->item2Id = $item2Id;

        return $this;
    }

    /**
     * @return int
     */
    public function getTimes(): int
    {
        return $this->times;
    }

    /**
     * @param int $times
     */
    public function setTimes(int $times): self
    {
        $this->times = $times;

        return $this;
    }

    /**
     * @return string
     */
    public function getRating(): string
    {
        return $this->rating;
    }

    /**
     * @param string $rating
     */
    public function setRating(string $rating): self
    {
        $this->rating = $rating;

        return $this;
    }
}
