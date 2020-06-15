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

use App\Controller\Member\MemberAddGoalAction;
use App\Controller\Member\MemberPutGoalAction;
use App\Controller\Partner\PartnerAddMemberGoalAction;

/**
 * MemberGoals
 *
 * @ORM\Entity
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"member_goals_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"member_goals_write", "is_active_write"}},
 *          "order"={"order": "ASC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_MEMBER_GOALS_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_MEMBER_GOALS_CREATE')"
 *          },
 			"addGoal"={
 *              "access_control"="is_granted('ROLE_MEMBER')",
 *              "method"="POST",
 *              "path"="/frontend/member/profile/goal/add",
 *              "denormalization_context"={
 *                  "groups"={"member_get_item"}
 *              },
 *              "controller"=MemberAddGoalAction::class,
 *              "defaults"={"_api_receive"=true},
 *          },
 *			"addPartnerToMemberGoal"={
 *              "access_control"="is_granted('ROLE_PARTNER')",
 *              "method"="POST",
 *              "path"="/frontend/partner/profile/goal/add",
 *              "denormalization_context"={
 *                  "groups"={"member_get_item"}
 *              },
 *              "controller"=PartnerAddMemberGoalAction::class,
 *              "defaults"={"_api_receive"=true},
 *          },
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
 *          },
 *			"memberPutGoal"={
 *              "access_control"="is_granted('ROLE_MEMBER')",
 *              "method"="PUT",
 *              "path"="/frontend/member/profile/goal/update",
 *              "normalization_context"={
 *                  "groups"={"member_put_goal"}
 *              },
 *              "controller"=MemberPutGoalAction::class,
 *              "defaults"={"_api_receive"=false},
 *          },
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
     *     "member_get_item",
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
     *     "member_get_item",
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
     *     "member_get_item",
     *     "user_read"
     * })
     */
    private $member;
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({
     *     "is_active_read",
     *     "member_goals_read",
     *     "member_get_item",
     *     "is_active_write"
     * })
     */
    protected $isCompleted = false;
    
      /**
     * @var integer
     *
     * @ORM\Column(name="order_goal", type="integer",nullable = true)
     * @Groups({
     *     "is_active_read",
     *     "member_goals_read",
     *     "member_get_item",
     *     "is_active_write"
     * })
     */
    private $ordergoal;

    /**
     * @ORM\Column(type="boolean")
     + @Groups({
     *     "is_active_read",
     *     "member_goals_read",
     *     "member_get_item",
     *     "is_active_write"
     * })
     */
    private $isArchieved;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partner", inversedBy="memberGoals")
     */
    private $partner;


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
    
      public function getIsCompleted(): ?bool
    {
        return $this->isCompleted;
    }

    public function setIsCompleted(bool $isCompleted): self
    {
        $this->isCompleted = $isCompleted;

        return $this;
    }
    
       public function getOrderGoal(): ?int
    {
        return $this->ordergoal;
    }

    public function setOrderGoal(int $ordergoal): self
    {
        $this->ordergoal = $ordergoal;

        return $this;
    }

    public function getIsArchieved(): ?bool
    {
        return $this->isArchieved;
    }

    public function setIsArchieved(bool $isArchieved): self
    {
        $this->isArchieved = $isArchieved;

        return $this;
    }

    public function getPartner(): ?Partner
    {
        return $this->partner;
    }

    public function setPartner(?Partner $partner): self
    {
        $this->partner = $partner;

        return $this;
    }


}
