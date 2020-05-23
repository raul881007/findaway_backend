<?php

namespace App\Controller\Partner;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\Partner;
use App\Entity\Ratings;
use App\Entity\Language;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class PartnerSignupMovPostCollectionController
 * @package App\Controller\User
 */
class PartnerSignupMovPostCollectionController extends BaseUserController
{
    /**
     * @param Request $request
     * @param Partner $data
     * @param ValidatorInterface $validator
     * @param ParameterBagInterface $params
     * @param EntityManagerInterface $em
     * @return Partner
     * @throws \Exception
     */
    public function __invoke(
        Request $request,
        Partner $data,
        ValidatorInterface $validator,
        ParameterBagInterface $params,
        EntityManagerInterface $em
    ): Partner {
        $data->setToken(\bin2hex(\random_bytes(32)));
        $data->setTokenCreatedAt(new \DateTime());

        /** @var Partner $data */
        $data = $this->encodePassword($data);
        $params = json_decode($request->getContent());
        $language = $em->getRepository(Language::class)->findOneBy(['code' => $params->language]);
        $data->setLanguage($language);
        $validator->validate($data, ['groups' => 'signup']);
        $em->flush();


        return $data;
    }


    /**
     * @Route("/frontend/partner/list", name="partners_list", methods={"POST"})

     */

    //Metodo que obtiene la lista de los partners
    //@request tiene la lista de filtros que debe cumplir el partner



    public function getPartners(Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();
        
        $response = $entityManager->getRepository(Partner::class)->findAllArray();

        //Contains the partner gender typed by user
        /*$gender=$request->request->get('gender');

        //Contains the industry typed by user
        $industry=$request->request->get('industry');

        //Availability time for calls and messages selected by user
        $time=$request->request->get('time_calls_messages');

        //Partner personality selected by user
        $personality=$request->request->get('personality_selected');



        $resultmatches = $entityManager->getRepository(Partner::class)->getFilteredPartners($gender,$industry,$time,$personality);
        $resultunmatches = $entityManager->getRepository(Partner::class)->getFilteredPartners($gender,$industry,$time,$personality);
        $response=array('matches'=> $resultmatches,'unmatches'=> $resultunmatches); */

        

        return new JsonResponse($response, 200);

    }
}
