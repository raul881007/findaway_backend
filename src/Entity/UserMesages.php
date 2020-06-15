<?php

namespace App\Entity;


use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiSubresource;
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

use App\Controller\Member\MemberAddGoalAction;
use App\Controller\Member\MemberPutGoalAction;

use App\Controller\Partner\PartnerAddMemberMessageAction;


/**
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"member_message_read", "read", "is_active_read"}},
 *          "denormalization_context"={"groups"={"member_message_write", "is_active_write"}},
 *          "order"={"order": "ASC"}
 *     },
 *     collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_MEMBER_MESSAGE_LIST')"
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_MEMBER_MESSAGE_CREATE')"
 *          },
 *			"addMessagePartnerToMember"={
 *              "access_control"="is_granted('ROLE_PARTNER')",
 *              "method"="POST",
 *              "path"="/frontend/partner/profile/message_member/add_message",
 *              "denormalization_context"={
 *                  "groups"={"partner_read"}
 *              },
 *              "controller"=PartnerAddMemberMessageAction::class,
 *              "defaults"={"_api_receive"=true},
 *          },
 *			
 *     },
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('ROLE_MEMBER_MESSAGE_SHOW')"
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_MEMBER_MESSAGE_UPDATE')"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('ROLE_MEMBER_MESSAGE_DELETE')"
 *          },
 *     })
 * @ApiFilter(DateFilter::class, properties={"createdAt", "updatedAt"})
 * @ApiFilter(SearchFilter::class, properties={
 *     "id": "exact",
 *     "member.name": "ipartial",
 *     "name": "ipartial"
 * })
 * @ApiFilter(
 *     OrderFilter::class,
 *     properties={
 *          "id",
 *          "member.name",
 *          "name",
 *          "createdAt",
 *          "updatedAt"
 *     }

 * )
 * @ORM\Entity(repositoryClass="App\Repository\UserMesagesRepository")
 */
class UserMesages
{
	/**
	 * @Groups({
     *     "partner_read",
     * })
	*/
	use Timestampable;
    /**
	 * @Groups({
     *     "partner_read",
     * })
	*/
    use Blameable;
    /**
	 * @Groups({
     *     "partner_read",
     * })
	*/
    use IsActive;
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({
     *     "partner_read",
     * })
     */
    private $text;

    /**
    
     * @ORM\ManyToOne(targetEntity="App\Entity\UserConversations", inversedBy="userMesages")
      * @Groups({
     *     "partner_read",
     * })
     */
    private $userConversation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getUserConversation(): ?UserConversations
    {
        return $this->userConversation;
    }

    public function setUserConversation(?UserConversations $userConversation): self
    {
        $this->userConversation = $userConversation;

        return $this;
    }
}
