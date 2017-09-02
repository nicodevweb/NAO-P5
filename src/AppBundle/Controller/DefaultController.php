<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class DefaultController extends Controller
{
    const NB_PER_PAGE = 3;

    /**
     * @Route("/", name ="NAO_home")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Observation');

        $validatedList = $repository->findObservations(1, self::NB_PER_PAGE, 1);

        return $this->render('default/index.html.twig', array(
            'validatedList' => $validatedList
        ));
    }

    /**
     * @Route("/contact", name ="NAO_contact")
     * @Method({"GET","POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function contactAction(Request $request)
    {

        return $this->render('default/contact.html.twig');
    }

    /**
     * @Route("/about", name ="NAO_about")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function aboutAction(Request $request)
    {

        return $this->render('default/about.html.twig');
    }

}