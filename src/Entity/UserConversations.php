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

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\UserConversationsRepository")
 */
class UserConversations
{
	use Timestampable;
    use Blameable;
    use IsActive;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({
     *     "partner_read",
     * })
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partner", inversedBy="userConversations")
     * @Groups({
     *     "partner_read",
     * })
     */
    private $partner;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Supervisor", inversedBy="userConversations")
     * @Groups({
     *     "partner_read",
     * })
     */
    private $supervisor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="userConversations")
     * @Groups({
     *     "partner_read",
     * })
     */
    private $member;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserMesages", mappedBy="userConversation")
     * @Groups({
     *     "partner_read",
     * })
     */
    private $userMesages;

    public function __construct()
    {
        $this->userMesages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSupervisor(): ?Supervisor
    {
        return $this->supervisor;
    }

    public function setSupervisor(?Supervisor $supervisor): self
    {
        $this->supervisor = $supervisor;

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

    /**
     * @return Collection|UserMesages[]
     */
    public function getUserMesages(): Collection
    {
        return $this->userMesages;
    }

    public function addUserMesage(UserMesages $userMesage): self
    {
        if (!$this->userMesages->contains($userMesage)) {
            $this->userMesages[] = $userMesage;
            $userMesage->setUserConversation($this);
        }

        return $this;
    }

    public function removeUserMesage(UserMesages $userMesage): self
    {
        if ($this->userMesages->contains($userMesage)) {
            $this->userMesages->removeElement($userMesage);
            // set the owning side to null (unless already changed)
            if ($userMesage->getUserConversation() === $this) {
                $userMesage->setUserConversation(null);
            }
        }

        return $this;
    }
}
