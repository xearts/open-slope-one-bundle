<?php

declare(strict_types=1);

namespace Xearts\OpenSlopeOneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Xearts\OpenSlopeOneBundle\Repository\OpenSlopeOneRatingRepository;

/**
 * @ORM\Table(name="open_slope_one_ratings")
 * @ORM\Entity(repositoryClass=OpenSlopeOneRatingRepository::class)
 */
class OpenSlopeOneRating
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(type="integer", name="item_id", nullable=false)
     */
    private $itemId;

    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(type="integer", name="user_id", nullable=false)
     */
    private $userId;

    /**
     * @var string
     * @ORM\Column(type="decimal", name="rating", precision=18, scale=4)
     */
    private $rating;

    /**
     * @param int $itemId
     * @param int $userId
     */
    public function __construct(int $itemId, int $userId)
    {
        $this->itemId = $itemId;
        $this->userId = $userId;
        $this->rating = "0";
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function setItemId(int $itemId): self
    {
        $this->itemId = $itemId;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

    public function setRating(string $rating): self
    {
        $this->rating = $rating;

        return $this;
    }
}
