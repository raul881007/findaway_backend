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
use App\Controller\NTask\NTaskFrontendGetCollectionAction;
use App\Controller\NTask\NTaskFrontendGetItemAction;

/**
 * NTask
 *
 * @ORM\Table(name="ntask")
 * @ORM\Entity(repositoryClass="App\Repository\NTaskRepository")
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"ntask_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"ntask_write", "is_active_write"}},
 *          "order"={"id": "DESC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_N_TASK_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_N_TASK_CREATE')"
 *          },
 *          "frontend"={
 *              "method"="GET",
 *              "path"="/frontend/ntasks",
 *              "controller"=NTaskFrontendGetCollectionAction::class,
 *              "defaults"={"_api_receive"=false},
 *              "normalization_context"={
 *                  "groups"={"ntask_read_frontend", "slug"}
 *              },
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_N_TASK_SHOW')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_N_TASK_UPDATE')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_N_TASK_DELETE')"
 *          },
 *          "frontend"={
 *              "method"="GET",
 *              "path"="/frontend/ntasks/{slug}",
 *              "controller"=NTaskFrontendGetItemAction::class,
 *              "defaults"={"_api_receive"=false},
 *              "normalization_context"={
 *                  "groups"={"ntask_read_frontend", "slug"}
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
class NTask implements TranslatableInterface
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
     *     "ntask_read",
     *     "member_read",
     *     "user_read",
     *     "user_write",
     *     "ntask_read_frontend"
     * })
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NTaskTranslation", mappedBy="translatable", cascade={"persist"}, orphanRemoval=true)
     * @Groups({
     *     "ntask_read",
     *     "ntask_write",
     *     "ntask_read_frontend",
     *	   "ngoals_read",
     *     "ngoals_write",
     *     "ngoals_read_frontend"
     * })
     * @ORM\OrderBy({"id" = "ASC"})
     * @Assert\Valid()
     * @Assert\Count(min=1)
     */
    private $translations;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NGoals", inversedBy="tasks")
     * 
     */
    protected $ngoal;
    
    

    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|NTaskTranslation[]
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(NTaskTranslation $translation): self
    {
        if (!$this->translations->contains($translation)) {
            $this->translations[] = $translation;
            $translation->setTranslatable($this);
        }

        return $this;
    }


	public function getNGoal(): NGoals
    {
        return $this->ngoal;
    }

    public function setNGoal(NGoals $ngoal): self
    {
        $this->ngoal = $ngoal;

        return $this;
    }
    
    
    public function removeTranslation(NTaskTranslation $translation): self
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
     *     "ntask_read",
     *     "member_read",
     *     "ntask_read_frontend"
     * })
     */
    public function getName(): string
    {
        /** @var NTaskTranslation $translation */
        $translation = $this->getTranslation();

        return $translation->getName();
    }

}
