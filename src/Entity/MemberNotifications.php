<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Traits\Blameable;
use App\Traits\Timestampable;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;


use App\Controller\Member\MemberGetNotificationAction;

/**
 * MemberNotifications
 *
 * @ORM\Table(name="member_notification")
 * @ORM\Entity(repositoryClass="App\Repository\MemberNotificationsRepository")
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"member_notification_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"member_notification_write", "is_active_write"}},
 *          "order"={"id": "ASC"}
 *     },
 *     collectionOperations={
 *         "get"={
 *              "normalization_context"={
 *                  "groups"={"member_read_collection", "read", "is_active_read"}
 *              },
 *              "access_control"="is_granted('ROLE_MEMBER_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_MEMBER_CREATE')"
 *          },
		    
 *     },
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_MEMBER_SHOW')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_MEMBER_UPDATE')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_MEMBER_DELETE')"
 *          },
 			"notificationGet"={
 *              "access_control"="is_granted('ROLE_MEMBER')",
 *              "method"="GET",
 *              "path"="/frontend/members/notifications",
 *              "normalization_context"={
 *                  "groups"={"member_get_item"}
 *              },
 *              "controller"=MemberGetNotificationAction::class,
 *              "defaults"={"_api_receive"=false},
 *          },
 
 			
 			
 *     })
 * @ApiFilter(DateFilter::class, properties={"createdAt", "updatedAt"})
 * @ApiFilter(SearchFilter::class, properties={
 *     "id": "exact",
 *     "member.id": "exact",
 *     "nCompliment.id": "exact",
 *     "note": "ipartial",
 * })
 * @ApiFilter(
 *     OrderFilter::class,
 *     properties={
 *          "id",
 *          "score",
 *          "note",
 *          "createdAt",
 *          "updatedAt"
 *     }
 * )
 */
class MemberNotifications
{
    use Timestampable;
    use Blameable;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({
     *     "member_notification_read",
     *     "member_notification_write",
	 *     "member_get_notification",
     *     "member_read",
     *     "partner_read",
     * })
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Groups({
     *     "member_notification_read",
     *     "member_notification_write",
     *     "partner_read",
     * })
     * @Assert\NotBlank()
     */
    private $note = '';

    /**
     * @ORM\Column(type="boolean")
     * @Groups({
     *     "is_active_read",
     *     "is_active_write"
     * })
     */
    protected $isSeen = false;

    /**
     * @ORM\Column(type="float", nullable=false)
     * @Groups({
     *     "member_notification_read",
     *     "member_notification_write",
     *     "partner_read",
     * })
     * @Assert\NotBlank()
     */
    private $score;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Supervisor", inversedBy="memberMotification")
     * @Groups({"member_notification_read", "member_notification_write"})
     */
    private $supervisor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partner", inversedBy="memberMotification")
     * @Groups({"member_notification_read", "member_notification_write"})
     */
    private $partner;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="memberMotification")
     * @Groups({"member_notification_read", "member_notification_write"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="memberMotification")
     * @Groups({
     *     "member_notification_read",
     *     "member_notification_write",
     * })
     */
    private $member;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getIsSeen(): ?bool
    {
        return $this->isSeen;
    }

    public function setIsSeen(bool $isSeen): self
    {
        $this->isSeen = $isSeen;

        return $this;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(float $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getSupervisor(): ?Supervisor
    {
        return $this->supervisor;
    }

    public function setSupervisor(?Supervisor $supervisor): self
    {
        $this->supervisor = $supervisor;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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
