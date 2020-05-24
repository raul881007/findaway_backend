<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Interfaces\PartnerInterface;
use App\Interfaces\SearchInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Traits\Blameable;
use App\Traits\IsActive;
use App\Traits\Timestampable;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use App\Controller\Partner\PartnerLoginByTokenCollectionAction;
use App\Controller\Partner\PartnerGetItemAction;
use App\Controller\Partner\PartnerPutItemController;
use App\Controller\Partner\PartnerSignupPostCollectionController;
use App\Controller\Partner\PartnerSignupMovPostCollectionController;
use App\Controller\Partner\PartnerRemindPasswordCollectionController;
use JMS\Serializer\Annotation\MaxDepth;

/**
 * Partner
 *
 * @ORM\Table(name="partner")
 * @ORM\Entity(repositoryClass="App\Repository\PartnerRepository")
 * @UniqueEntity(fields={"username"}, errorPath="email", message="Email already exists")
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"partner_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"partner_write", "is_active_write"}},
 *          "order"={"id": "DESC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "normalization_context"={
 *                  "groups"={"partner_read_collection", "read", "is_active_read"}
 *              },
 *              "access_control"="is_granted('ROLE_PARTNER_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_PARTNER_CREATE')"
 *          },
 *          "signup"={
 *              "method"="POST",
 *              "path"="/frontend/partner/signup",
 *              "denormalization_context"={
 *                  "groups"={"signup_collection"}
 *              },
 *              "controller"=PartnerSignupPostCollectionController::class,
 *              "defaults"={"_api_receive"=true},
 *          },
 *          "signupMov"={
 *              "method"="POST",
 *              "path"="/frontend/partner/signup-mov",
 *              "denormalization_context"={
 *                  "groups"={"signup_collection"}
 *              },
 *              "controller"=PartnerSignupMovPostCollectionController::class,
 *              "defaults"={"_api_receive"=true},
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_PARTNER_SHOW')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_PARTNER_UPDATE')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_PARTNER_DELETE')"
 *          },
 *          "partnerGet"={
 *              "access_control"="is_granted('ROLE_PARTNER')",
 *              "method"="GET",
 *              "path"="/frontend/partner/profile/me",
 *              "normalization_context"={
 *                  "groups"={"partner_get_item"}
 *              },
 *              "controller"=PartnerGetItemAction::class,
 *              "defaults"={"_api_receive"=false},
 *          },
 *          "partnerPut"={
 *              "access_control"="is_granted('ROLE_PARTNER')",
 *              "method"="PUT",
 *              "path"="/frontend/partner/profile/me",
 *              "normalization_context"={
 *                  "groups"={"partner_put_item"}
 *              },
 *              "controller"=PartnerPutItemController::class,
 *              "defaults"={"_api_receive"=false},
 *          },
 *          "loginByToken"={
 *              "method"="GET",
 *              "path"="/frontend/partner/login/{token}",
 *              "controller"=PartnerLoginByTokenCollectionAction::class,
 *              "defaults"={"_api_receive"=false},
 *          },
 *          "remindPassword"={
 *              "method"="POST",
 *              "path"="/frontend/partner/remind/password",
 *              "controller"=PartnerRemindPasswordCollectionController::class,
 *              "defaults"={"_api_receive"=false},
 *          }
 *     }
 * )
 * @ApiFilter(DateFilter::class, properties={"createdAt", "updatedAt"})
 * @ApiFilter(SearchFilter::class, properties={
 *     "id": "exact",
 *     "firstname": "ipartial",
 *     "lastname": "ipartial",
 *     "email": "exact",
 *     "phone": "ipartial"
 * })
 * @ApiFilter(
 *     OrderFilter::class,
 *     properties={
 *          "id",
 *          "firstname",
 *          "email",
 *          "description",
 *          "createdAt",
 *          "updatedAt"
 *     }
 * )
 */
class Partner implements PartnerInterface, SearchInterface, UserInterface
{
    use Timestampable;
    use Blameable;
    use IsActive;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({
     *     "partner_read",
     *     "partner_read_collection",
     *     "task_read",
     *     "partner_get_item",
     *     "user_read",
     *     "user_write",
     *     "member_read",
     * })
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Groups({
     *     "partner_read",
     *     "partner_read_collection",
     *     "partner_write",
     *     "task_read",
     *     "partner_get_item",
     *     "partner_put_item",
     *     "signup_collection",
     *     "member_read",
     *     "member_read_collection",
     * })
     * @Assert\NotBlank()
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Groups({
     *     "partner_read",
     *     "partner_read_collection",
     *     "partner_write",
     *     "task_read",
     *     "partner_get_item",
     *     "partner_put_item",
     *     "signup_collection",
     *     "member_read",
     * })
     * @Assert\NotBlank()
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     * @Groups({
     *     "partner_read",
     *     "partner_read_collection",
     *     "partner_write",
     *     "task_read",
     *     "partner_get_item",
     *     "partner_put_item",
     *     "signup_collection",
     *     "member_read",
     * })
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, unique=true)
     * @Groups({
     *     "partner_read",
     *     "partner_read_collection",
     *     "partner_write",
     *     "partner_get_item",
     *     "partner_put_item",
     *     "signup_collection",
     *     "user_read",
     *     "member_read",
     * })
     * @Assert\Email()
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({
     *     "partner_read",
     *     "partner_write",
     *     "partner_read_collection",
     *     "partner_get_item",
     *     "partner_put_item",
     *     "signup_collection",
     *     "member_read",
     * })
     * @Assert\NotBlank()
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=true)
     * @Groups({
     *     "partner_read",
     *     "partner_write",
     *     "partner_read_collection",
     *     "partner_get_item",
     *     "partner_put_item",
     *     "signup_collection",
     *     "member_read",
     * })
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @Groups({
     *     "partner_write",
     *     "signup_collection",
     * })
     * @Assert\NotBlank(groups={"signup"})
     */
    private $plainPassword;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $token;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $tokenCreatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Language")
     * @Groups({
     *     "partner_read",
     *     "partner_write"
     * })
     * @Assert\NotNull()
     */
    private $language;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ratings", mappedBy="partner")
     * @Groups({
     *     "partner_read",
     *     "partner_read_collection",
     * })
     * @ORM\OrderBy({"id" = "ASC"})
     * @Assert\Valid()
     */
    private $ratings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MemberNotifications", mappedBy="partner")
     * @Groups({
     *     "partner_read",
     *     "partner_read_collection",
     * })
     * @ORM\OrderBy({"id" = "ASC"})
     * @Assert\Valid()
     */
    private $memberNotification;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NAvailable")
     * @Groups({
     *     "partner_read",
     *     "partner_write"
     * })
     */
    private $nAvailable;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NPersonalityStyle")
     * @Groups({
     *     "partner_read",
     *     "partner_write"
     * })
     */
    private $nPersonalityStyle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Member", mappedBy="partner")
     * @Groups({
     *     "partner_read"
     * })
     * @ORM\OrderBy({"id" = "ASC"})
     * @Assert\Valid()
     */
    private $members;

    /**
     * Partner constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->partners = new ArrayCollection();
        $this->password = \bin2hex(\random_bytes(32));
        $this->ratings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->members = new \Doctrine\Common\Collections\ArrayCollection();
        $this->memberNotification = new ArrayCollection();
    }

    /**
     * @return Partner
     */
    public function getPartner(): Partner
    {
        return $this;
    }

    /**
     * Search text
     *
     * @return string
     */
    public function getSearchText(): string
    {
        return implode(
            ' ',
            [
                $this->getFirstname(),
                $this->getLastname(),
            ]
        );
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
        $this->email = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     */
    public function setPlainPassword($plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }

    public function getSalt()
    {
        return null;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return ['ROLE_PARTNER'];
    }

    public function eraseCredentials()
    {
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTokenCreatedAt(): \DateTime
    {
        return $this->tokenCreatedAt;
    }

    /**
     * @param \DateTime $tokenCreatedAt
     */
    public function setTokenCreatedAt(\DateTime $tokenCreatedAt): void
    {
        $this->tokenCreatedAt = $tokenCreatedAt;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getLanguage(): Language
    {
        return $this->language;
    }

    public function setLanguage(Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return Collection|Ratings[]
     */
    public function getRatings(): Collection
    {
        return $this->ratings;
    }

    public function addRating(Ratings $rating): self
    {
        if (!$this->ratings->contains($rating)) {
            $this->ratings[] = $rating;
            $rating->setPartner($this);
        }

        return $this;
    }

    public function removeRating(Ratings $rating): self
    {
        if ($this->ratings->contains($rating)) {
            $this->ratings->removeElement($rating);
            // set the owning side to null (unless already changed)
            if ($rating->getPartner() === $this) {
                $rating->setPartner(null);
            }
        }

        return $this;
    }

    public function getNAvailable(): ?NAvailable
    {
        return $this->nAvailable;
    }

    public function setNAvailable(?NAvailable $nAvailable): self
    {
        $this->nAvailable = $nAvailable;

        return $this;
    }

    public function getNPersonalityStyle(): ?NPersonalityStyle
    {
        return $this->nPersonalityStyle;
    }

    public function setNPersonalityStyle(?NPersonalityStyle $nPersonalityStyle): self
    {
        $this->nPersonalityStyle = $nPersonalityStyle;

        return $this;
    }

    /**
     * @return Collection|Member[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Member $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->setPartner($this);
        }

        return $this;
    }

    public function removeMember(Member $member): self
    {
        if ($this->members->contains($member)) {
            $this->members->removeElement($member);
            // set the owning side to null (unless already changed)
            if ($member->getPartner() === $this) {
                $member->setPartner(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MemberNotifications[]
     */
    public function getMemberNotification(): Collection
    {
        return $this->memberNotification;
    }

    public function addMemberNotification(MemberNotifications $memberNotification): self
    {
        if (!$this->memberNotification->contains($memberNotification)) {
            $this->memberNotification[] = $memberNotification;
            $memberNotification->setPartner($this);
        }

        return $this;
    }

    public function removeMemberNotification(MemberNotifications $memberNotification): self
    {
        if ($this->memberNotification->contains($memberNotification)) {
            $this->memberNotification->removeElement($memberNotification);
            // set the owning side to null (unless already changed)
            if ($memberNotification->getPartner() === $this) {
                $memberNotification->setPartner(null);
            }
        }

        return $this;
    }

}
