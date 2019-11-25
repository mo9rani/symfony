<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Entity\ProductAvis;
use App\Form\ProductAvisType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    /**
     * @Route("/avis", name="avis")
     */
    public function index()
    {

        $repository = $this->getDoctrine()->getRepository(ProductAvis::class);


        $products = $repository->findBy( array (), array () , $limit = 9, $offset = 0);

//        dump($products);
//        die();

        return $this->render('avis/index.html.twig', [
            'products' => $products,
        ]);
    }


    /**
     * @Route("/aviso/{i}", name="avispage")
     */
    public function avispage($i)
    {

        $repository = $this->getDoctrine()->getRepository(ProductAvis::class);

$offs = $i * 10;
        $products = $repository->findBy( array (), array () , $limit = 9, $offset = $offs);

//        dump($products);
//        die();

        return $this->render('avis/index.html.twig', [
            'products' => $products,
        ]);
    }



    /**
     * @Route("/addproduitavis", name="addproduitavis")
     */
    public function addproduitavis(Request $request)
    {

//        $entityManager = $this->getDoctrine()->getManager();
//        $product = new ProductAvis();
//        $form = $this->createForm(ProductAvisType::class, $product);
//
//
//        $form ->handleRequest($request);
//
//        if($form->isSubmitted() && $form->isValid() )
//        {
//            $entityManager->persist($product);
//        $entityManager->flush();
//
//
//
//        }
        return $this->render('avis/newavis.twig', [
            'controller_name' => 'AvisController',
        ]);
    }






    /**
     * @Route("/nouveauproduitwithavis", name="nouveauproduitwithavis")
     */
    public function nouveauproduitwithavis(Request $request)
    {
//
//        $lat = $request->request->get('name');
//        dump($lat);
//        die();
        $name = $request->request->get('name');
        $categorie = $request->request->get('categorie');
        $note = $request->request->get('note');
        $note = (int)$note;
        $description = $request->request->get('description');
        $avis = $request->request->get('avis');
        $date = new \DateTime();

$id_user=$this->getUser()->getId();
$pseudo_user=$this->getUser()->getpseudo();
        $repository = $this->getDoctrine()->getRepository(ProductAvis::class);

        $product = $repository->findOneBy([
            'name' => $name,

        ]);
if($product==null){
    $entityManager = $this->getDoctrine()->getManager();

    $ProductAvis = new ProductAvis();
    $ProductAvis->setName($name);
    $ProductAvis->setNote($note);
    $ProductAvis->setDescription($description);
    $ProductAvis->setCategorie($categorie);
    $ProductAvis->setDatecreate($date);
    $ProductAvis->setDateupdate($date);

    $entityManager->persist($ProductAvis);
    $entityManager->flush();

    $id_product = $ProductAvis->getId();


    $Avis = new Avis();
    $Avis->setAvis($avis);
    $Avis->setNote($note);
    $Avis->setIdUser($id_user);
    $Avis->setIdprod($id_product);
    $Avis->setpseudo($pseudo_user);
    $Avis->setDatecreate($date);



    $entityManager->persist($Avis);


    $entityManager->flush();

}


//        dump($product );
//        die();
        return $this->redirectToRoute('addproduitavis');
    }



}
