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
     * @ORM\Column(type="integer", name="item_id1")
     */
    private $itemId1;

    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(type="integer", name="item_id2")
     */
    private $itemId2;

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
    public function getItemId1(): int
    {
        return $this->itemId1;
    }

    /**
     * @param int $itemId1
     */
    public function setItemId1(int $itemId1): self
    {
        $this->itemId1 = $itemId1;

        return $this;
    }

    /**
     * @return int
     */
    public function getItemId2(): int
    {
        return $this->itemId2;
    }

    /**
     * @param int $itemId2
     */
    public function setItemId2(int $itemId2): self
    {
        $this->itemId2 = $itemId2;

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
