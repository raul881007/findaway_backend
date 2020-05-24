<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Interfaces\SupervisorInterface;
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
use App\Controller\Supervisor\SupervisorLoginByTokenCollectionAction;
use App\Controller\Supervisor\SupervisorGetItemAction;
use App\Controller\Supervisor\SupervisorPutItemController;
use App\Controller\Supervisor\SupervisorSignupPostCollectionController;
use App\Controller\Supervisor\SupervisorSignupMovPostCollectionController;
use App\Controller\Supervisor\SupervisorRemindPasswordCollectionController;

/**
 * Supervisor
 *
 * @ORM\Table(name="supervisor")
 * @ORM\Entity(repositoryClass="App\Repository\SupervisorRepository")
 * @UniqueEntity(fields={"username"}, errorPath="email", message="Email already exists")
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"supervisor_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"supervisor_write", "is_active_write"}},
 *          "order"={"id": "DESC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "normalization_context"={
 *                  "groups"={"supervisor_read_collection", "read", "is_active_read"}
 *              },
 *              "access_control"="is_granted('ROLE_SUPERVISOR_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_SUPERVISOR_CREATE')"
 *          },
 *          "signup"={
 *              "method"="POST",
 *              "path"="/frontend/supervisor/signup",
 *              "denormalization_context"={
 *                  "groups"={"signup_collection"}
 *              },
 *              "controller"=SupervisorSignupPostCollectionController::class,
 *              "defaults"={"_api_receive"=true},
 *          },
 *          "signupMov"={
 *              "method"="POST",
 *              "path"="/frontend/supervisor/signup-mov",
 *              "denormalization_context"={
 *                  "groups"={"signup_collection"}
 *              },
 *              "controller"=SupervisorSignupMovPostCollectionController::class,
 *              "defaults"={"_api_receive"=true},
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_SUPERVISOR_SHOW')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_SUPERVISOR_UPDATE')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_SUPERVISOR_DELETE')"
 *          },
 *          "supervisorGet"={
 *              "access_control"="is_granted('ROLE_SUPERVISOR')",
 *              "method"="GET",
 *              "path"="/frontend/supervisor/profile/me",
 *              "normalization_context"={
 *                  "groups"={"supervisor_get_item"}
 *              },
 *              "controller"=SupervisorGetItemAction::class,
 *              "defaults"={"_api_receive"=false},
 *          },
 *          "supervisorPut"={
 *              "access_control"="is_granted('ROLE_SUPERVISOR')",
 *              "method"="PUT",
 *              "path"="/frontend/supervisor/profile/me",
 *              "normalization_context"={
 *                  "groups"={"supervisor_put_item"}
 *              },
 *              "controller"=SupervisorPutItemController::class,
 *              "defaults"={"_api_receive"=false},
 *          },
 *          "loginByToken"={
 *              "method"="GET",
 *              "path"="/frontend/supervisor/login/{token}",
 *              "controller"=SupervisorLoginByTokenCollectionAction::class,
 *              "defaults"={"_api_receive"=false},
 *          },
 *          "remindPassword"={
 *              "method"="POST",
 *              "path"="/frontend/supervisor/remind/password",
 *              "controller"=SupervisorRemindPasswordCollectionController::class,
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
 *     "labels.id": "exact",
 *     "contacts.value": "ipartial",
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
class Supervisor implements SupervisorInterface, SearchInterface, UserInterface
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
     *     "supervisor_read",
     *     "supervisor_read_collection",
     *     "task_read",
     *     "supervisor_get_item"
     * })
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Groups({
     *     "supervisor_read",
     *     "supervisor_read_collection",
     *     "supervisor_write",
     *     "task_read",
     *     "supervisor_get_item",
     *     "supervisor_put_item",
     *     "signup_collection",
     * })
     * @Assert\NotBlank()
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Groups({
     *     "supervisor_read",
     *     "supervisor_read_collection",
     *     "supervisor_write",
     *     "task_read",
     *     "supervisor_get_item",
     *     "supervisor_put_item",
     *     "signup_collection",
     * })
     * @Assert\NotBlank()
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     * @Groups({
     *     "supervisor_read",
     *     "supervisor_read_collection",
     *     "supervisor_write",
     *     "task_read",
     *     "supervisor_get_item",
     *     "supervisor_put_item",
     *     "signup_collection",
     * })
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, unique=true)
     * @Groups({
     *     "supervisor_read",
     *     "supervisor_write",
     *     "supervisor_get_item",
     *     "supervisor_put_item",
     *     "signup_collection",
     * })
     * @Assert\Email()
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({
     *     "supervisor_read",
     *     "supervisor_write",
     *     "supervisor_get_item",
     *     "supervisor_put_item",
     *     "signup_collection",
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
     *     "supervisor_write",
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
     *     "supervisor_read",
     *     "supervisor_write"
     * })
     * @Assert\NotNull()
     */
    private $language;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MemberNotifications", mappedBy="supervisor")
     * @Groups({
     *     "supervisor_read",
     *     "supervisor_read_collection",
     * })
     * @ORM\OrderBy({"id" = "ASC"})
     * @Assert\Valid()
     */
    private $memberNotification;

    /**
     * Supervisor constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->supervisors = new ArrayCollection();
        $this->password = \bin2hex(\random_bytes(32));
        $this->memberNotification = new ArrayCollection();
    }

    /**
     * @return Supervisor
     */
    public function getSupervisor(): Supervisor
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
        return ['ROLE_SUPERVISOR'];
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
            $memberNotification->setSupervisor($this);
        }

        return $this;
    }

    public function removeMemberNotification(MemberNotifications $memberNotification): self
    {
        if ($this->memberNotification->contains($memberNotification)) {
            $this->memberNotification->removeElement($memberNotification);
            // set the owning side to null (unless already changed)
            if ($memberNotification->getSupervisor() === $this) {
                $memberNotification->setSupervisor(null);
            }
        }

        return $this;
    }

}
