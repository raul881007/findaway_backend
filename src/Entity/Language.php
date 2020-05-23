<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Traits\Blameable;
use App\Traits\IsActive;
use App\Traits\Timestampable;
use App\Controller\Languages\LanguagesFrontendGetCollectionAction;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;

/**
 * Language
 *
 * @ORM\Table(name="language")
 * @ORM\Entity(repositoryClass="App\Repository\LanguageRepository")
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"language_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"language_write", "is_active_write"}},
 *          "order"={"id": "ASC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_LANGUAGE_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_LANGUAGE_CREATE')"
 *          },
 *          "frontend"={
 *              "method"="GET",
 *              "path"="/frontend/languages",
 *              "controller"=LanguagesFrontendGetCollectionAction::class,
 *              "defaults"={"_api_receive"=false},
 *              "normalization_context"={
 *                  "groups"={"language_read_frontend", "name"}
 *              },
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_LANGUAGE_SHOW')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_LANGUAGE_UPDATE')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_LANGUAGE_DELETE')"
 *          }
 *     })
 * @ApiFilter(DateFilter::class, properties={"createdAt", "updatedAt"})
 * @ApiFilter(SearchFilter::class, properties={
 *     "id": "exact",
 *     "name": "ipartial",
 *     "code": "ipartial",
 * })
 * @ApiFilter(
 *     OrderFilter::class,
 *     properties={
 *          "id",
 *          "name",
 *          "code",
 *          "createdAt",
 *          "updatedAt"
 *     }
 * )
 */
class Language
{
    use Timestampable;
    use Blameable;
    use IsActive;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({
     *     "language_read",
     *     "language_read_frontend",
     *     "ntask_read_frontend",
     *     "ngoals_read_frontend",
     *     "user_read",
     *     "user_write",
     *     "ngoals_read",
     *     "ngoals_write",
     *     "ntask_read",
     *     "ntask_write",
     *     "member_read",
     *     "member_write"
     * })
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Groups({
     *     "language_read",
     *     "language_write",
     *     "member_read",
     *     "user_read",
     *     "ngoals_read",
     *     "ntask_read",
     *     "member_read_collection",
     *     "ngoals_read_frontend",
     *     "ntask_read_frontend",
     *     "language_read_frontend",
     * })
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Groups({
     *     "language_read",
     *     "language_write",
     *     "member_read",
     *     "user_read",
     *     "ngoals_read",
     *     "ntask_read",
     *     "ngoals_read_frontend",
     *     "ntask_read_frontend",
     *     "language_read_frontend",
     * })
     * @Assert\NotBlank()
     */
    private $code;

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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }


}
