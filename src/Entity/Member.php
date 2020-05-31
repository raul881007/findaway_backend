<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Interfaces\MemberInterface;
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
use App\Controller\Member\MemberLoginByTokenCollectionAction;
use App\Controller\Member\MemberGetItemAction;
use App\Controller\Member\MemberPutItemController;
use App\Controller\Member\MemberSignupPostCollectionController;
use App\Controller\Member\MemberSignupMovPostCollectionController;
use App\Controller\Member\MemberRemindPasswordCollectionController;
use App\Controller\SearchAction;
/**
 * Member
 *
 * @ORM\Table(name="member")
 * @ORM\Entity(repositoryClass="App\Repository\MemberRepository")
 * @UniqueEntity(fields={"username"}, errorPath="email", message="Email already exists")
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"member_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"member_write", "is_active_write"}},
 *          "order"={"id": "DESC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "normalization_context"={
 *                  "groups"={"member_read_collection", "read", "is_active_read"}
 *              },
 *              "access_control"="is_granted('ROLE_MEMBER_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_MEMBER_CREATE')"
 *          },
 * 			"memberGet"={
 *              "access_control"="is_granted('ROLE_MEMBER')",
 *              "method"="GET",
 *              "path"="/frontend/member/profile/me",
 *              "normalization_context"={
 *                  "groups"={"member_get_item"}
 *              },
 *              "controller"=MemberGetItemAction::class,
 *              "defaults"={"_api_receive"=false},
 *          },
 
 *          "signup"={
 *              "method"="POST",
 *              "path"="/frontend/member/signup",
 *              "denormalization_context"={
 *                  "groups"={"signup_collection"}
 *              },
 *              "controller"=MemberSignupPostCollectionController::class,
 *              "defaults"={"_api_receive"=true},
 *          },
 *          "signupMov"={
 *              "method"="POST",
 *              "path"="/frontend/member/signup-mov",
 *              "denormalization_context"={
 *                  "groups"={"signup_collection"}
 *              },
 *              "controller"=MemberSignupMovPostCollectionController::class,
 *              "defaults"={"_api_receive"=true},
 *          },
 *          "searchGet"={
 *              "access_control"="is_granted('ROLE_OTHER_SEARCH')",
 *              "method"="GET",
 *              "path"="/search",
 *              "controller"=SearchAction::class,
 *              "normalization_context"={
 *                  "groups"={"Default"}
 *              },
 *          }
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
 *         
 *          "memberPut"={
 *              "access_control"="is_granted('ROLE_MEMBER')",
 *              "method"="PUT",
 *              "path"="/frontend/member/profile/me",
 *              "normalization_context"={
 *                  "groups"={"member_put_item"}
 *              },
 *              "controller"=MemberPutItemController::class,
 *              "defaults"={"_api_receive"=false},
 *          },
 *          "loginByToken"={
 *              "method"="GET",
 *              "path"="/frontend/member/login/{token}",
 *              "controller"=MemberLoginByTokenCollectionAction::class,
 *              "defaults"={"_api_receive"=false},
 *          },
 *          "remindPassword"={
 *              "method"="POST",
 *              "path"="/frontend/member/remind/password",
 *              "controller"=MemberRemindPasswordCollectionController::class,
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
 *     "description": "ipartial"
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
class Member implements MemberInterface, SearchInterface, UserInterface
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
     *     "member_read",
     *     "member_read_collection",
     *     "task_read",
     *     "member_get_item",
     *     "user_read",
     *     "user_write",
     *     "partner_read",
     * })
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Groups({
     *     "member_read",
     *     "member_read_collection",
     *     "member_write",
     *	   "member_get_notification",
     *     "task_read",
     *     "member_get_item",
     *     "member_put_item",
     *     "signup_collection",
     *     "partner_read",
     * })
     * @Assert\NotBlank()
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Groups({
     *     "member_read",
     *     "member_read_collection",
     *     "member_write",
     *     "task_read",
     *	   "member_get_notification",
     *     "member_get_item",
     *     "member_put_item",
     *     "signup_collection",
     *     "partner_read",
     * })
     * @Assert\NotBlank()
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     * @Groups({
     *     "member_read",
     *     "member_read_collection",
     *     "member_write",
     *     "task_read",
     *     "member_get_item",
     *     "member_put_item",
     *     "signup_collection",
     *     "partner_read",
     * })
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, unique=true)
     * @Groups({
     *     "member_read",
     *     "member_write",
     *     "member_get_item",
     *     "member_put_item",
     *     "signup_collection",
     * })
     * @Assert\Email()
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({
     *     "member_read",
     *     "member_write",
     *     "member_get_item",
     *     "member_put_item",
     *     "member_read_collection",
     *     "signup_collection",
     *     "partner_read",
     * })
     * @Assert\NotBlank()
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @Groups({
     *     "member_write",
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
     * @var int
     *
     * @ORM\Column(name="preference_sexo", type="integer", nullable=true, options={"comment"="0 - No preference
    1 - Man
    2 - Woman"})
     */
    private $preferenceSexo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Language")
     * @Groups({
     *     "member_read",
     *     "member_write",
     *     "member_get_item",
     *     "member_read_collection",
     * })
     */
    private $language;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MemberGoals", mappedBy="member", cascade={"persist"})
     * @Groups({
     *     "document_read",
     *     "member_read",
     *     "member_write",
     *     "member_get_item"
     * })
     * @ORM\OrderBy({"ordergoal" = "ASC"})
     */
    private $memberGoals;
    
      /**
     * @ORM\OneToMany(targetEntity="App\Entity\MemberAvailability", mappedBy="member", cascade={"persist"})
     * @Groups({
     *     "document_read",
     *     "member_read",
     *     "member_write",
	 *     "member_get_item"
     * })
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $memberAvailability;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MemberTask", mappedBy="member", cascade={"persist"})
     * @Groups({
     *     "document_read",
     *     "member_read",
     *     "member_get_item",
     *     "member_write"
     * })
     * @ORM\OrderBy({"ordertask" = "ASC"})
     */
    private $memberTask;

    /**
     * @ORM\ManyToMany(targetEntity="NGoals")
     * @ORM\JoinTable(name="ngoals_member",
     *      joinColumns={@ORM\JoinColumn(name="member_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="ngoals_id", referencedColumnName="id")}
     *      )
     * @Groups({
     *     "document_read",
     *     "member_read",
     *     "member_get_item",
     *     "member_write"
     * })
     * @ORM\OrderBy({"id" = "ASC"})
     * @ApiSubresource()
     */
    private $nGoals;

    /**
     * @ORM\ManyToMany(targetEntity="NTask")
     * @ORM\JoinTable(name="ntask_member",
     *      joinColumns={@ORM\JoinColumn(name="member_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="ntask_id", referencedColumnName="id")}
     *      )
     * @Groups({
     *     "document_read",
     *     "member_read",
     *     "member_get_item",
     *     "member_write"
     * })
     * @ORM\OrderBy({"id" = "ASC"})
     * @ApiSubresource()
     */
    private $nTask;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NAvailable")
     * @Groups({
     *     "member_read",
     *     "member_get_item",
     *     "member_write"
     * })
     */
    private $nAvailable;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NPersonalityStyle")
     * @Groups({
     *     "member_read",
     *     "member_get_item",
     *     "member_write"
     * })
     */
    private $nPersonalityStyle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partner", inversedBy="members")
     * @Groups({"member_read", "member_write", "member_read_collection", "task_read"})
     * @ApiSubresource()
     */
    private $partner;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MemberNotifications", mappedBy="member")
     * @Groups({
     *     "member_read",
     *     "member_read_collection",
	 *     "member_get_item",
     * })
     * @ORM\OrderBy({"id" = "ASC"})
     * @Assert\Valid()
     */
    private $memberNotification;

    /**
     * Member constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->members = new ArrayCollection();
        $this->memberGoals = new ArrayCollection();
        $this->memberTask = new ArrayCollection();
        $this->memberNotification = new ArrayCollection();
        $this->nGoals = new \Doctrine\Common\Collections\ArrayCollection();
        $this->nTask = new \Doctrine\Common\Collections\ArrayCollection();
        $this->password = \bin2hex(\random_bytes(32));
        $this->memberNotification = new ArrayCollection();
    }

    /**
     * @return Member
     */
    public function getMember(): Member
    {
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getSearchText();
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
        return ['ROLE_MEMBER'];
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

    /**
     * @return Collection|MemberGoals[]
     */
    public function getMemberGoals(): Collection
    {
        return $this->memberGoals;
    }

    public function addMemberGoal(MemberGoals $memberGoal): self
    {
        if (!$this->memberGoals->contains($memberGoal)) {
            $this->memberGoals[] = $memberGoal;
            $memberGoal->setMember($this);
        }

        return $this;
    }

    public function removeMemberGoal(MemberGoals $memberGoal): self
    {
        if ($this->memberGoals->contains($memberGoal)) {
            $this->memberGoals->removeElement($memberGoal);
            // set the owning side to null (unless already changed)
            if ($memberGoal->getMember() === $this) {
                $memberGoal->setMember(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MemberTask[]
     */
    public function getMemberTask(): Collection
    {
        return $this->memberTask;
    }

    public function addMemberTask(MemberTask $memberTask): self
    {
        if (!$this->memberTask->contains($memberTask)) {
            $this->memberTask[] = $memberTask;
            $memberTask->setMember($this);
        }

        return $this;
    }

    public function removeMemberTask(MemberTask $memberTask): self
    {
        if ($this->memberTask->contains($memberTask)) {
            $this->memberTask->removeElement($memberTask);
            // set the owning side to null (unless already changed)
            if ($memberTask->getMember() === $this) {
                $memberTask->setMember(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|NGoals[]
     */
    public function getNGoals(): Collection
    {
        return $this->nGoals;
    }

    public function addNGoal(NGoals $nGoal): self
    {
        if (!$this->nGoals->contains($nGoal)) {
            $this->nGoals[] = $nGoal;
        }

        return $this;
    }

    public function removeNGoal(NGoals $nGoal): self
    {
        if ($this->nGoals->contains($nGoal)) {
            $this->nGoals->removeElement($nGoal);
        }

        return $this;
    }

    /**
     * @return Collection|NTask[]
     */
    public function getNTask(): Collection
    {
        return $this->nTask;
    }

    public function addNTask(NTask $nTask): self
    {
        if (!$this->nTask->contains($nTask)) {
            $this->nTask[] = $nTask;
        }

        return $this;
    }

    public function removeNTask(NTask $nTask): self
    {
        if ($this->nTask->contains($nTask)) {
            $this->nTask->removeElement($nTask);
        }

        return $this;
    }

    public function getPreferenceSexo(): ?int
    {
        return $this->preferenceSexo;
    }

    public function setPreferenceSexo(int $preferenceSexo): self
    {
        $this->preferenceSexo = $preferenceSexo;

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

    public function getPartner(): ?Partner
    {
        return $this->partner;
    }

    public function setPartner(?Partner $partner): self
    {
        $this->partner = $partner;

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
            $memberNotification->setMember($this);
        }

        return $this;
    }

    public function removeMemberNotification(MemberNotifications $memberNotification): self
    {
        if ($this->memberNotification->contains($memberNotification)) {
            $this->memberNotification->removeElement($memberNotification);
            // set the owning side to null (unless already changed)
            if ($memberNotification->getMember() === $this) {
                $memberNotification->setMember(null);
            }
        }

        return $this;
    }


}
