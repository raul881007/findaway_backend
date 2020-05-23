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
 * Ratings
 *
 * @ORM\Table(name="ratings")
 * @ORM\Entity(repositoryClass="App\Repository\RatingsRepository")
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"ratings_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"ratings_write", "is_active_write"}},
 *          "order"={"id": "ASC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_RATINGS_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_RATINGS_CREATE')"
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_RATINGS_SHOW')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_RATINGS_UPDATE')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_RATINGS_DELETE')"
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
class Ratings
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
     *     "ratings_read",
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
     *     "ratings_read",
     *     "ratings_write",
     *     "partner_read",
     * })
     * @Assert\NotBlank()
     */
    private $note = '';

    /**
     * @ORM\Column(type="float", nullable=false)
     * @Groups({
     *     "ratings_read",
     *     "ratings_write",
     *     "partner_read",
     * })
     * @Assert\NotBlank()
     */
    private $score;

    /**
     * @ORM\ManyToMany(targetEntity="NCompliment")
     * @ORM\JoinTable(name="ncompliment_ratings",
     *      joinColumns={@ORM\JoinColumn(name="ratings_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="ncompliment_id", referencedColumnName="id")}
     *      )
     * @Groups({
     *     "ratings_read",
     *     "ratings_write",
     *     "partner_read",
     * })
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $nCompliment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partner", inversedBy="ratings")
     * @Groups({"ratings_read", "ratings_write"})
     */
    private $partner;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member")
     * @Groups({
     *     "ratings_read",
     *     "ratings_write",
     *     "partner_read",
     * })
     */
    private $member;


    /**
     * Ratings constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->nCompliment = new \Doctrine\Common\Collections\ArrayCollection();
    }

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

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(float $score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @return Collection|NCompliment[]
     */
    public function getNCompliment(): Collection
    {
        return $this->nCompliment;
    }

    public function addNCompliment(NCompliment $nCompliment): self
    {
        if (!$this->nCompliment->contains($nCompliment)) {
            $this->nCompliment[] = $nCompliment;
        }

        return $this;
    }

    public function removeNCompliment(NCompliment $nCompliment): self
    {
        if ($this->nCompliment->contains($nCompliment)) {
            $this->nCompliment->removeElement($nCompliment);
        }

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
