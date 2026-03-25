<?php

declare(strict_types=1);

namespace Xearts\OpenSlopeOneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Xearts\OpenSlopeOneBundle\Repository\OpenSlopeOneRepository;

#[ORM\Table(name: 'open_slope_one')]
#[ORM\Entity(repositoryClass: OpenSlopeOneRepository::class)]
class OpenSlopeOne
{
    #[ORM\Id]
    #[ORM\Column(name: 'item_id1', type: 'integer')]
    private ?int $itemId1 = null;

    #[ORM\Id]
    #[ORM\Column(name: 'item_id2', type: 'integer')]
    private ?int $itemId2 = null;

    #[ORM\Column(name: 'times', type: 'integer')]
    private ?int $times = null;

    #[ORM\Column(name: 'rating', type: 'decimal', precision: 18, scale: 4)]
    private ?string $rating = null;

    public final function getItemId1(): ?int
    {
        return $this->itemId1;
    }

    public final function setItemId1(int $itemId1): self
    {
        $this->itemId1 = $itemId1;

        return $this;
    }

    public final function getItemId2(): ?int
    {
        return $this->itemId2;
    }

    public final function setItemId2(int $itemId2): self
    {
        $this->itemId2 = $itemId2;

        return $this;
    }

    public final function getTimes(): ?int
    {
        return $this->times;
    }

    public final function setTimes(int $times): self
    {
        $this->times = $times;

        return $this;
    }

    public final function getRating(): ?string
    {
        return $this->rating;
    }

    public final function setRating(string $rating): self
    {
        $this->rating = $rating;

        return $this;
    }
}
