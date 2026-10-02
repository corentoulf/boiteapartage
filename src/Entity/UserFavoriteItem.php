<?php

namespace App\Entity;

use App\Repository\UserFavoriteItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: UserFavoriteItemRepository::class)]
// #[UniqueEntity(
//     fields: ['item', 'user'],
//     message: 'Cet objet est déjà dans vos favoris.',
//     errorPath: 'user',
// )]
#[ORM\UniqueConstraint(name: 'UNIQ_ITEM_PER_USER', fields: ['user', 'item'])]
#[UniqueEntity(fields: ['user', 'item'], message: 'L\'objet est déjà dans les favoris')]
class UserFavoriteItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'userFavoriteItems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'itemFavoriteItems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Item $item = null;

    #[ORM\Column]
    private ?\DateTime $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): static
    {
        $this->item = $item;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }
}
