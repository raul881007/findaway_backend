<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Traits\Blameable;
use App\Traits\IsActive;
use App\Traits\Timestampable;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;

/**
 * MemberGoals
 *
 * @ORM\Entity
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"member_goals_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"member_goals_write", "is_active_write"}},
 *          "order"={"id": "DESC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_MEMBER_GOALS_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_MEMBER_GOALS_CREATE')"
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_MEMBER_GOALS_SHOW')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_MEMBER_GOALS_UPDATE')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_MEMBER_GOALS_DELETE')"
 *          }
 *     })
 * @ApiFilter(DateFilter::class, properties={"createdAt", "updatedAt"})
 * @ApiFilter(SearchFilter::class, properties={
 *     "id": "exact",
 *     "member.name": "ipartial",
 *     "name": "ipartial"
 * })
 * @ApiFilter(
 *     OrderFilter::class,
 *     properties={
 *          "id",
 *          "member.name",
 *          "name",
 *          "createdAt",
 *          "updatedAt"
 *     }
 * )
 */
class MemberGoals
{
    use Timestampable;
    use Blameable;
    use IsActive;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({
     *     "member_goals_read",
     *     "member_read",
     *     "user_read",
     *     "user_write"
     * })
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Groups({
     *     "member_goals_read",
     *     "member_goals_write",
     *     "user_read",
     *     "project_read",
     *     "project_write"
     * })
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="memberGoals")
     * @Groups({
     *     "member_goals_read",
     *     "member_goals_write",
     *     "user_read"
     * })
     */
    private $member;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMember(): ?Member
    {
        return $this->member;
    }

    public function setMember(?Member $member): self
    {
        $this->member = $member;

        return $this;
    }


}
