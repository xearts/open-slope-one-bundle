<?php

declare(strict_types=1);

namespace Xearts\OpenSlopeOneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Xearts\OpenSlopeOneBundle\Repository\OpenSlopeOneRatingRepository;

#[ORM\Table(name: 'open_slope_one_rating')]
#[ORM\Entity(repositoryClass: OpenSlopeOneRatingRepository::class)]
class OpenSlopeOneRating
{
    #[ORM\Id]
    #[ORM\Column(name: 'item_id', type: 'integer', nullable: false)]
    private int $itemId;

    #[ORM\Id]
    #[ORM\Column(name: 'user_id', type: 'integer', nullable: false)]
    private int $userId;

    #[ORM\Column(name: 'rating', type: 'decimal', precision: 18, scale: 4)]
    private string $rating;

    public function __construct(int $itemId, int $userId)
    {
        $this->itemId = $itemId;
        $this->userId = $userId;
        $this->rating = "0";
    }

    public final function getItemId(): int
    {
        return $this->itemId;
    }

    public final function setItemId(int $itemId): self
    {
        $this->itemId = $itemId;

        return $this;
    }

    public final function getUserId(): int
    {
        return $this->userId;
    }

    public final function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public final function getRating(): string
    {
        return $this->rating;
    }

    public final function setRating(string $rating): self
    {
        $this->rating = $rating;

        return $this;
    }
}
