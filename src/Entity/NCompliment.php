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
use App\Controller\NCompliment\NComplimentFrontendGetCollectionAction;
use App\Controller\NCompliment\NComplimentFrontendGetItemAction;

/**
 * NCompliment
 *
 * @ORM\Table(name="ncompliment")
 * @ORM\Entity(repositoryClass="App\Repository\NComplimentRepository")
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"ncompliment_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"ncompliment_write", "is_active_write"}},
 *          "order"={"id": "DESC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_N_COMPLIMENT_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_N_COMPLIMENT_CREATE')"
 *          },
 *          "frontend"={
 *              "method"="GET",
 *              "path"="/frontend/ncompliment",
 *              "controller"=NComplimentFrontendGetCollectionAction::class,
 *              "defaults"={"_api_receive"=false},
 *              "normalization_context"={
 *                  "groups"={"ncompliment_read_frontend", "slug"}
 *              },
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_N_COMPLIMENT_SHOW')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_N_COMPLIMENT_UPDATE')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_N_COMPLIMENT_DELETE')"
 *          },
 *          "frontend"={
 *              "method"="GET",
 *              "path"="/frontend/ncompliment/{slug}",
 *              "controller"=NComplimentFrontendGetItemAction::class,
 *              "defaults"={"_api_receive"=false},
 *              "normalization_context"={
 *                  "groups"={"ncompliment_read_frontend", "slug"}
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
class NCompliment implements TranslatableInterface
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
     *     "ncompliment_read",
     *     "ncompliment_write",
     *     "ncompliment_read_frontend",
     *     "member_read",
     *     "user_read",
     *     "user_write",
     *     "partner_read",
     *     "partner_write",
     *     "partner_read_collection",
     *     "partner_get_item",
     *     "partner_put_item",
     * })
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NComplimentTranslation", mappedBy="translatable", cascade={"persist"}, orphanRemoval=true)
     * @Groups({
     *     "ncompliment_read",
     *     "ncompliment_write",
     *     "ncompliment_read_frontend",
     *     "partner_read",
     *     "partner_write",
     *     "partner_read_collection",
     *     "partner_get_item",
     *     "partner_put_item",
     *     "user_read",
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
     * @return Collection|NComplimentTranslation[]
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(NComplimentTranslation $translation): self
    {
        if (!$this->translations->contains($translation)) {
            $this->translations[] = $translation;
            $translation->setTranslatable($this);
        }

        return $this;
    }

    public function removeTranslation(NComplimentTranslation $translation): self
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
     *     "ncompliment_read",
     *     "member_read",
     *     "ncompliment_read_frontend"
     * })
     */
    public function getName(): string
    {
        /** @var NComplimentTranslation $translation */
        $translation = $this->getTranslation();

        return $translation->getName();
    }

}
