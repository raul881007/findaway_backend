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

/**
 * MemberNotifications
 *
 * @ORM\Table(name="member_availability")
 * @ORM\Entity(repositoryClass="App\Repository\MemberAvailabilityRepository")
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"member_availability_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"member_availability_write", "is_active_write"}},
 *          "order"={"id": "ASC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_MEMBER_NOTIFICATIONS_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_MEMBER_NOTIFICATIONS_CREATE')"
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_MEMBER_NOTIFICATIONS_SHOW')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_MEMBER_NOTIFICATIONS_UPDATE')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_MEMBER_NOTIFICATIONS_DELETE')"
 *          }
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
class MemberAvailability
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
     *     "member_availability_read",
     *     "member_availability_write",
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
     *     "member_availability_read",
     *     "member_availability_write",
     *     "partner_read",
     * })
     * @Assert\NotBlank()
     */
    private $scheduledCallDays = '';
    
      /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Groups({
     *     "member_availability_read",
     *     "member_availability_write",
     *     "partner_read",
     * })
     * @Assert\NotBlank()
     */
    private $currentAvailability = '';
    
     /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Groups({
     *     "member_availability_read",
     *     "member_availability_write",
     *     "partner_read",
     * })
     * @Assert\NotBlank()
     */
    private $scheduledCallTime = '';


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="memberAvailability")
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

    public function getScheduledCallDays(): ?string
    {
        return $this->scheduledCallDays;
    }

    public function setScheduledCallDays(string $scheduledCallDays): self
    {
        $this->scheduledCallDays = $scheduledCallDays;

        return $this;
    }

 	public function getCurrentAvailability(): ?string
    {
        return $this->currentAvailability;
    }

    public function setCurrentAvailability(string $currentAvailability): self
    {
        $this->currentAvailability = $currentAvailability;

        return $this;
    }
    
 	public function getScheduledCallTime(): ?string
    {
        return $this->scheduledCallTime;
    }

    public function setScheduledCallTime(string $scheduledCallTime): self
    {
        $this->scheduledCallTime = $scheduledCallTime;

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
