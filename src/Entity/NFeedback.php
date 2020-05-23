<?php

namespace App\Entity;

use App\Interfaces\TranslatableInterface;
use App\Traits\TranslationSluggable;
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
use App\Controller\NFeedback\NFeedbackFrontendGetCollectionAction;
use App\Controller\NFeedback\NFeedbackFrontendGetItemAction;

/**
 * NFeedback
 *
 * @ORM\Table(name="nfeedback")
 * @ORM\Entity(repositoryClass="App\Repository\NFeedbackRepository")
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"nfeedback_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"nfeedback_write", "is_active_write"}},
 *          "order"={"id": "DESC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_N_FEEDBACK_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_N_FEEDBACK_CREATE')"
 *          },
 *          "frontend"={
 *              "method"="GET",
 *              "path"="/frontend/nfeedback",
 *              "controller"=NFeedbackFrontendGetCollectionAction::class,
 *              "defaults"={"_api_receive"=false},
 *              "normalization_context"={
 *                  "groups"={"nfeedback_read_frontend", "slug"}
 *              },
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_N_FEEDBACK_SHOW')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_N_FEEDBACK_UPDATE')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_N_FEEDBACK_DELETE')"
 *          },
 *          "frontend"={
 *              "method"="GET",
 *              "path"="/frontend/nfeedback/{slug}",
 *              "controller"=NFeedbackFrontendGetItemAction::class,
 *              "defaults"={"_api_receive"=false},
 *              "normalization_context"={
 *                  "groups"={"nfeedback_read_frontend", "slug"}
 *              },
 *          }
 *     })
 * @ApiFilter(DateFilter::class, properties={"createdAt", "updatedAt"})
 * @ApiFilter(SearchFilter::class, properties={
 *     "id": "exact",
 *     "translations.name": "ipartial",
 * })
 * @ApiFilter(
 *     OrderFilter::class,
 *     properties={
 *          "id",
 *          "translations.name",
 *          "createdAt",
 *          "updatedAt"
 *     }
 * )
 */
class NFeedback implements TranslatableInterface
{
    use Timestampable;
    use Blameable;
    use IsActive;
    use TranslationSluggable;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({
     *     "nfeedback_read",
     *     "member_read",
     *     "user_read",
     *     "user_write",
     *     "nfeedback_read_frontend"
     * })
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NFeedbackTranslation", mappedBy="translatable", cascade={"persist"}, orphanRemoval=true)
     * @Groups({
     *     "nfeedback_read",
     *     "nfeedback_write",
     *     "nfeedback_read_frontend"
     * })
     * @ORM\OrderBy({"id" = "ASC"})
     * @Assert\Valid()
     * @Assert\Count(min=1)
     */
    private $translations;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|NFeedbackTranslation[]
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(NFeedbackTranslation $translation): self
    {
        if (!$this->translations->contains($translation)) {
            $this->translations[] = $translation;
            $translation->setTranslatable($this);
        }

        return $this;
    }

    public function removeTranslation(NFeedbackTranslation $translation): self
    {
        if ($this->translations->contains($translation)) {
            $this->translations->removeElement($translation);
            // set the owning side to null (unless already changed)
            if ($translation->getTranslatable() === $this) {
                $translation->setTranslatable(null);
            }
        }

        return $this;
    }

    /**
     * @return string
     * @throws \Exception
     * @Groups({
     *     "nfeedback_read",
     *     "member_read",
     *     "nfeedback_read_frontend"
     * })
     */
    public function getName(): string
    {
        /** @var NFeedbackTranslation $translation */
        $translation = $this->getTranslation();

        return $translation->getName();
    }

}
