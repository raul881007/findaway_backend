<?php

namespace App\Entity;

use App\Traits\Blameable;
use App\Traits\IsActive;
use App\Traits\Timestampable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;

/**
 * @ORM\Table(name="nlevel_urgency_translation", uniqueConstraints={
 *     @ORM\UniqueConstraint(
 *          name="nlevel_urgency_language_translatable_idx",
 *          columns={
 *              "language_id",
 *              "translatable_id"
 *          }
 *     )
 * })
 * @ORM\Entity(repositoryClass="App\Repository\NLevelUrgencyTranslationRepository")
 * @UniqueEntity(fields={"language", "translatable"}, errorPath="language")
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"nlevel_urgency_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"nlevel_urgency_write", "is_active_write"}},
 *          "order"={"id": "DESC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_N_LEVEL_URGENCY_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_N_LEVEL_URGENCY_CREATE')"
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_N_LEVEL_URGENCY_SHOW')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_N_LEVEL_URGENCY_UPDATE')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_N_LEVEL_URGENCY_DELETE')"
 *          }
 *     })
 * @ApiFilter(DateFilter::class, properties={"createdAt", "updatedAt"})
 * @ApiFilter(SearchFilter::class, properties={
 *     "id": "exact",
 *     "name": "ipartial",
 *     "parent.name": "ipartial",
 * })
 * @ApiFilter(
 *     OrderFilter::class,
 *     properties={
 *          "id",
 *          "name",
 *          "createdAt",
 *          "updatedAt"
 *     }
 * )
 */
class NLevelUrgencyTranslation
{
    use Timestampable;
    use Blameable;
    use IsActive;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({
     *     "nlevel_urgency_read",
     *     "nlevel_urgency_write",
     *     "user_read",
     * })
     */
    private $id;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NLevelUrgency", inversedBy="translations")
     * @Assert\NotBlank()
     */
    protected $translatable;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Language")
     * @Assert\NotBlank()
     * @Groups({
     *     "nlevel_urgency_read",
     *     "nlevel_urgency_write",
     *     "member_read",
     *     "nlevel_urgency_read_frontend",
     *     "user_read",
     * })
     */
    protected $language;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Groups({
     *     "nlevel_urgency_read",
     *     "nlevel_urgency_write",
     *     "member_read",
     *     "nlevel_urgency_read_frontend",
     *     "user_read",
     * })
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({
     *     "nlevel_urgency_read",
     *     "nlevel_urgency_write",
     *     "member_read",
     *     "user_read",
     * })
     */
    private $description;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string
     * @return null
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  string
     * @return null
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTranslatable(): NLevelUrgency
    {
        return $this->translatable;
    }

    public function setTranslatable(NLevelUrgency $translatable): self
    {
        $this->translatable = $translatable;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
