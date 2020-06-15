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

use App\Controller\Partner\PartnerAddMemberTaskAction;

use App\Controller\Member\MemberAddTaskAction;
use App\Controller\Member\MemberPutTaskAction;

/**
 * MemberTask
 *
 * @ORM\Entity
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"member_task_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"member_task_write", "is_active_write"}},
 *          "order"={"order": "ASC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_MEMBER_TASK_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_MEMBER_TASK_CREATE')"
 *          },
 *			"addTask"={
 *              "access_control"="is_granted('ROLE_MEMBER')",
 *              "method"="POST",
 *              "path"="/frontend/member/profile/task/add",
 *              "denormalization_context"={
 *                  "groups"={"member_get_item"}
 *              },
 *              "controller"=MemberAddTaskAction::class,
 *              "defaults"={"_api_receive"=true},
 *          },
 *			"addPartnerToMemberTask"={
 *              "access_control"="is_granted('ROLE_PARTNER')",
 *              "method"="POST",
 *              "path"="/frontend/partner/profile/task/add",
 *              "denormalization_context"={
 *                  "groups"={"member_get_item"}
 *              },
 *              "controller"=PartnerAddMemberTaskAction::class,
 *              "defaults"={"_api_receive"=true},
 *          },
 *     },
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_MEMBER_TASK_SHOW')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_MEMBER_TASK_UPDATE')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_MEMBER_TASK_DELETE')"
 *          },
 *			"memberPutTask"={
 *              "access_control"="is_granted('ROLE_MEMBER')",
 *              "method"="PUT",
 *              "path"="/frontend/member/profile/task/update",
 *              "normalization_context"={
 *                  "groups"={"member_put_task"}
 *              },
 *              "controller"=MemberPutTaskAction::class,
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
class MemberTask
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
     *     "member_task_read",
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
     *     "member_task_read",
     *     "member_task_write",
     *     "user_read",
     *     "project_read",
     *     "member_get_item",
     *     "project_write"
     * })
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="memberTask")
     * @Groups({
     *     "member_task_read",
     *     "member_task_write",
     *     "member_get_item",
     *     "user_read"
     * })
     * @Assert\NotBlank()
     */
    private $member;
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({
     *     "is_active_read",
     *     "member_get_item",
     *     "is_active_write"
     * })
     */
    protected $isCompleted = false;
    
     /**
     * @var integer
     *
     * @ORM\Column(name="order_task", type="integer",nullable = true)
     * @Groups({
     *     "is_active_read",
     *     "member_get_item",
     *     "is_active_write"
     * })
     */
    private $ordertask;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({
     *     "is_active_read",
     *     "member_get_item",
     *     "is_active_write"
     * })
     */
    private $isArchieved;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partner", inversedBy="memberTasks")
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
    
     public function getOrderTask(): ?int
    {
        return $this->ordertask;
    }

    public function setOrderTask(int $ordertask): self
    {
        $this->ordertask = $ordertask;

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
