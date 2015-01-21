<?php

namespace ArtprojectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ProductController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('ArtprojectBundle:Product:index.html.twig');
    }
    
    public function categoriesAction()
    {
        
        return $this->render('ArtprojectBundle:Product:categories.html.twig');
    }
    
    public function productsAction($categorie)
    {
        $repository = $this
                        ->getDoctrine()
                        ->getManager()
                        ->getRepository('ArtprojectBundle:Product');

        $listproduct = $repository->findByCategorie($categorie);
        $params = array(
            'listproduct' => $listproduct,
            'categorie' => $categorie
     );

       return $this->render('ArtprojectBundle:Product:products.html.twig', $params);   
    }
    public function detailsAction($id)
    {
        $repository = $this
                        ->getDoctrine()
                        ->getManager()
                        ->getRepository('ArtprojectBundle:Product');
        
        $detailproduct = $repository->find($id);
        $params = array(
            'detailproduct' => $detailproduct
        );
        
        return $this->render('ArtprojectBundle:Product:details.html.twig', $params);
    }
    
}

