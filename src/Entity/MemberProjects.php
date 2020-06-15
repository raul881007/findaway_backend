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

use App\Controller\Member\MemberAddProjectAction;
use App\Controller\Member\MemberPutProjectAction;

use App\Controller\Partner\PartnerAddMemberProjectAction;


/**
 * @ApiResource(attributes={
 *         "normalization_context"={"groups"={"member_projects_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"member_projects_write", "is_active_write"}},
 *          "order"={"order": "ASC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_MEMBER_PROJECTS_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_MEMBER_PROJECTS_CREATE')"
 *          },
 			"addProject"={
 *              "access_control"="is_granted('ROLE_MEMBER')",
 *              "method"="POST",
 *              "path"="/frontend/member/profile/project/add",
 *              "denormalization_context"={
 *                  "groups"={"member_projects_read"}
 *              },
 *              "controller"=MemberAddProjectAction::class,
 *              "defaults"={"_api_receive"=true},
 *          },
 *			"addPartnerToMemberProject"={
 *              "access_control"="is_granted('ROLE_PARTNER')",
 *              "method"="POST",
 *              "path"="/frontend/partner/profile/project/add",
 *              "denormalization_context"={
 *                  "groups"={"member_get_item"}
 *              },
 *              "controller"=PartnerAddMemberProjectAction::class,
 *              "defaults"={"_api_receive"=true},
 *          },
 *     },
 *     itemOperations={
 *         "get"={
 *              "access_control"="is_granted('ROLE_MEMBER_PROJECTS_SHOW')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_MEMBER_PROJECTS_UPDATE')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_MEMBER_PROJECTS_DELETE')"
 *          },
 *			"memberPutProject"={
 *              "access_control"="is_granted('ROLE_MEMBER')",
 *              "method"="PUT",
 *              "path"="/frontend/member/profile/project/update",
 *              "normalization_context"={
 *                  "groups"={"member_put_project"}
 *              },
 *              "controller"=MemberPutProjectAction::class,
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
 *     })
 
 * @ORM\Entity(repositoryClass="App\Repository\MemberProjectsRepository")
 */
class MemberProjects
{
	use Timestampable;
    use Blameable;
    use IsActive;
    /**
     * @var integer
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({
     *     "member_projects_read",
     *     "member_read",
     *     "user_read",
     *     "member_get_item",
     *     "user_write"
     * })

     */
    private $id;

    /**
     * @var integer
     * @ORM\Column(type="text")
     * @Groups({
     *     "member_projects_read",
     *     "member_read",
     *     "user_read",
     *     "member_get_item",
     *     "user_write"
     * })
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="nmemberProjects")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({
     *     "member_projects_read",
     *     "member_read",
     *     "user_read",
     *     "member_get_item",
     *     "user_write"
     * })
     */
    private $member;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({
     *     "member_projects_read",
     *     "member_read",
     *     "user_read",
     *     "member_get_item",
     *     "user_write"
     * })
     */
    private $isCompleted;

    /**
     * @ORM\Column(type="integer")
     * @Groups({
     *     "member_projects_read",
     *     "member_read",
     *     "user_read",
     *     "member_get_item",
     *     "user_write"
     * })
     */
    private $orderProject;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({
     *     "member_projects_read",
     *     "member_read",
     *     "user_read",
     *     "member_get_item",
     *     "user_write"
     * })
     */
    private $isArchieved;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partner", inversedBy="memberProjects")
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

    public function getOrderProject(): ?int
    {
        return $this->orderProject;
    }

    public function setOrderProject(int $orderProject): self
    {
        $this->orderProject = $orderProject;

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
