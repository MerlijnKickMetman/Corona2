<?php

namespace App\Controller;

use App\Entity\FoodOrders;
use App\Form\FoodOrdersType;
use App\Repository\FoodOrdersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/foodorders")
 */
class FoodOrdersController extends AbstractController
{
    /**
     * @Route("/", name="food_orders_index", methods={"GET"})
     */
    public function index(FoodOrdersRepository $foodOrdersRepository): Response
    {
        return $this->render('food_orders/index.html.twig', [
            'food_orders' => $foodOrdersRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="food_orders_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $foodOrder = new FoodOrders();
        $form = $this->createForm(FoodOrdersType::class, $foodOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($foodOrder);
            $entityManager->flush();

            return $this->redirectToRoute('food_orders_index');
        }

        return $this->render('food_orders/new.html.twig', [
            'food_order' => $foodOrder,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="food_orders_show", methods={"GET"})
     */
    public function show(FoodOrders $foodOrder): Response
    {
        return $this->render('food_orders/show.html.twig', [
            'food_order' => $foodOrder,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="food_orders_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FoodOrders $foodOrder): Response
    {
        $form = $this->createForm(FoodOrdersType::class, $foodOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('food_orders_index');
        }

        return $this->render('food_orders/edit.html.twig', [
            'food_order' => $foodOrder,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="food_orders_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FoodOrders $foodOrder): Response
    {
        if ($this->isCsrfTokenValid('delete'.$foodOrder->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($foodOrder);
            $entityManager->flush();
        }

        return $this->redirectToRoute('food_orders_index');
    }
}
