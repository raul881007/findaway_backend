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
use App\Controller\NPreferredTime\NPreferredTimeFrontendGetCollectionAction;
use App\Controller\NPreferredTime\NPreferredTimeFrontendGetItemAction;

/**
 * NPreferredTime
 *
 * @ORM\Table(name="npreferred_time")
 * @ORM\Entity(repositoryClass="App\Repository\NPreferredTimeRepository")
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"npreferred_time_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"npreferred_time_write", "is_active_write"}},
 *          "order"={"id": "DESC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_N_PREFERRED_TIME_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_N_PREFERRED_TIME_CREATE')"
 *          },
 *          "frontend"={
 *              "method"="GET",
 *              "path"="/frontend/npreferred_time",
 *              "controller"=NPreferredTimeFrontendGetCollectionAction::class,
 *              "defaults"={"_api_receive"=false},
 *              "normalization_context"={
 *                  "groups"={"npreferred_time_read_frontend", "slug"}
 *              },
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_N_PREFERRED_TIME_SHOW')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_N_PREFERRED_TIME_UPDATE')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_N_PREFERRED_TIME_DELETE')"
 *          },
 *          "frontend"={
 *              "method"="GET",
 *              "path"="/frontend/npreferred_time/{slug}",
 *              "controller"=NPreferredTimeFrontendGetItemAction::class,
 *              "defaults"={"_api_receive"=false},
 *              "normalization_context"={
 *                  "groups"={"npreferred_time_read_frontend", "slug"}
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
class NPreferredTime implements TranslatableInterface
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
     *     "npreferred_time_read",
     *     "member_read",
     *     "user_read",
     *     "user_write",
     *     "npreferred_time_read_frontend"
     * })
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NPreferredTimeTranslation", mappedBy="translatable", cascade={"persist"}, orphanRemoval=true)
     * @Groups({
     *     "npreferred_time_read",
     *     "npreferred_time_write",
     *     "npreferred_time_read_frontend"
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
     * @return Collection|NPreferredTimeTranslation[]
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(NPreferredTimeTranslation $translation): self
    {
        if (!$this->translations->contains($translation)) {
            $this->translations[] = $translation;
            $translation->setTranslatable($this);
        }

        return $this;
    }

    public function removeTranslation(NPreferredTimeTranslation $translation): self
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
     *     "npreferred_time_read",
     *     "member_read",
     *     "npreferred_time_read_frontend"
     * })
     */
    public function getName(): string
    {
        /** @var NPreferredTimeTranslation $translation */
        $translation = $this->getTranslation();

        return $translation->getName();
    }

}
