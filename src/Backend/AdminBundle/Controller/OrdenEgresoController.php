<?php

namespace Backend\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Backend\AdminBundle\Entity\OrdenEgreso;
use Backend\AdminBundle\Entity\Ingreso;
use Backend\AdminBundle\Form\OrdenIngresoType;
use Backend\AdminBundle\Entity\Modelo;

/**
 * OrdenEgreso controller.
 *
 */
class OrdenEgresoController extends Controller
{

     public function generateSQL($search){
     
        $dql="SELECT u FROM BackendAdminBundle:OrdenEgreso u where u.isDelete=false"  ;
        $search=mb_convert_case($search,MB_CASE_LOWER);
        
       /*
        if ($search)
          $dql.=" and u.descripcion like '%$search%' ";
          
        $dql .=" order by u.descripcion"; 
        */
        return $dql;
     
     }

    /**
     * Lists all OrdenEgreso entities.
     *
     */
    public function indexAction(Request $request,$search)
    {
       if ( $this->get('security.context')->isGranted('ROLE_VIEWARTICULO')) {
        $em = $this->getDoctrine()->getManager();
        
        $dql=$this->generateSQL($search);
        $query = $em->createQuery($dql);
        
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $query,
        $this->get('request')->query->get('page', 1)/*page number*/,
        $this->container->getParameter('max_on_listepage')/*limit per page*/
    );
        
        $deleteForm = $this->createDeleteForm(0);
        return $this->render('BackendAdminBundle:OrdenEgreso:index.html.twig', 
        array('pagination' => $pagination,
        'delete_form' => $deleteForm->createView(),
        'search'=>$search
        ));
        
    }
     else
         throw new AccessDeniedException(); 
    }
    /**
     * Creates a new OrdenEgreso entity.
     *
     */
    public function createAction(Request $request)
    {
        if ( $this->get('security.context')->isGranted('ROLE_ADDARTICULO')) {
        $entity  = new OrdenEgreso();
        $form = $this->createForm(new OrdenEgresoType(), $entity);
        $form->bind($request);
         
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            //$em->flush();
            $this->get('session')->getFlashBag()->add('success' , 'Se ha agregado una nueva orden.');
            return $this->redirect($this->generateUrl('ordenEgreso_edit', array('id' => $entity->getId())));
        }
        
        

        return $this->render('BackendAdminBundle:OrdenEgreso:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
           
        ));
      }
      else
       throw new AccessDeniedException();
    }
    
    /*
     * public function createAction(Request $request)
    {
        if ( $this->get('security.context')->isGranted('ROLE_ADDARTICULO')) {
        $entity  = new OrdenIngreso();
        $form = $this->createForm(new OrdenIngresoType(), $entity);
        $form->bind($request);
         
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success' , 'Se ha agregado una nueva orden.');
            return $this->redirect($this->generateUrl('ordenIngreso_edit', array('id' => $entity->getId())));
        }
        
        

        return $this->render('BackendAdminBundle:OrdenIngreso:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
           
        ));
      }
      else
       throw new AccessDeniedException();
    }
     * 
     */ 

    /**
    * Creates a form to create a OrdenIngreso entity.
    *
    * @param Articulo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(OrdenEgreso $entity)
    {
        $form = $this->createForm(new OrdenEgresoType(), $entity, array(
            'action' => $this->generateUrl('ordenEgreso_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));
        $form->add('saveAndNew', 'submit', array('label' => 'saveAndNew', 'attr'=> array('id'=>'new', 'class'=>'btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new Articulo entity.
     *
     */
     
    public function newAction()
    {
       if ( $this->get('security.context')->isGranted('ROLE_ADDARTICULO')) {
		   
        $entity = new OrdenEgreso();
        $form   = $this->createForm(new OrdenEgresoType(), $entity);

		return $this->render('BackendAdminBundle:OrdenEgreso:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
            
        ));
       }
       else
          throw new AccessDeniedException();
    }
    
 
    /**
     * Displays a form to edit an existing Articulo entity.
     *
     */
    public function editAction($id)
    {
        if ( $this->get('security.context')->isGranted('ROLE_MODARTICULO')) { 
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendAdminBundle:OrdenEgreso')->find($id);

        if (!$entity) {
            
             $this->get('session')->getFlashBag()->add('error' , 'No se ha encontrado la orden .');
             return $this->redirect($this->generateUrl('ordenEgreso'));
        }

        $editForm = $this->createForm(new OrdenEgresoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BackendAdminBundle:OrdenEgreso:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            
        ));
      }
      else
         throw new AccessDeniedException(); 
    }

    /**
    * Creates a form to edit a OrdenIngreso entity.
    *                                       
    * @param Articulo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(OrdenEgreso $entity)
    {
        $form = $this->createForm(new OrdenEgresoType(), $entity, array(
            'action' => $this->generateUrl('ordenEgreso_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Articulo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        if ( $this->get('security.context')->isGranted('ROLE_MODARTICULO')) {  
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BackendAdminBundle:OrdenEgreso')->find($id);

        if (!$entity) {
             $this->get('session')->getFlashBag()->add('error' , 'No se ha encontrado la orden.');
             return $this->redirect($this->generateUrl('ordenEgreso'));
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new OrdenEgresoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add('success' , 'Se han actualizado los datos de la orden .');
            return $this->redirect($this->generateUrl('ordenEgreso_edit', array('id' => $id)));
        }

        return $this->render('BackendAdminBundle:OrdenEgreso:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            
        ));
      }
      else
         throw new AccessDeniedException();  
    }
    /**
     * Deletes a Articulo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        if ( $this->get('security.context')->isGranted('ROLE_DELARTICULO')) { 
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BackendAdminBundle:OrdenEgreso')->find($id);

            if (!$entity) {
                $this->get('session')->getFlashBag()->add('error' , 'No se ha encontrado la orden.');
             
            }
           else{
            
          
            $entity->setIsDelete(true); //baja lógica
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success' , 'Se han borrado los datos de la orden.');
            
            }
        }

        return $this->redirect($this->generateUrl('ordenEgreso'));
      }
      else
       throw new AccessDeniedException(); 
    }

    /**
     * Creates a form to delete a Articulo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    /* Ajax */

  
    public function toProcesadoOrdenAction(Request $request){
			
			/*
						
			$clienteId 		= $request->request->get('cliente');
			$operadorId		= $request->request->get('operador');
			$documento 		= $request->request->get('documento');
			$observaciones 	= $request->request->get('observaciones');

			
			$em = $this->getDoctrine()->getManager();	
									
			$orden = new OrdenIngreso();
			
			$tipo = $em->getRepository('BackendAdminBundle:TipoOrdenIngreso')->findOneById(1);
			
			$orden->setTipo($tipo);
								
			$cliente = $em->getRepository('BackendAdminBundle:Cliente')->findOneById($clienteId);
			
			$operador = $em->getRepository('BackendAdminBundle:OperadorLogistico')->findOneById($operadorId);
						
			$orden->setCliente($cliente);
			$orden->setOperador($operador);
			$orden->setDocumento($documento);
			$orden->setObservaciones($observaciones);
							
			$em->persist($orden);
			
			$em->flush();

			$ordenId = $orden->getId();
						
			
			$data["id"] = $ordenId;
			
			*/
			
			$response = new Response(json_encode($data));
			$response->headers->set('Content-Type', 'application/json');
			
			return $response;
	}
    
    
    public function toProcesadoEgresosAction(Request $request){
		
		/*	
						
			$ordenId 		= $request->request->get('orden');
			$cantidad		= $request->request->get('cantidad');
			$marcaId 		= $request->request->get('marca');
			$modeloId 		= $request->request->get('modelo');
						
			$em = $this->getDoctrine()->getManager();
												
			$marca = $em->getRepository('BackendAdminBundle:Marca')->findOneById($marcaId);
			
			$modelo = $em->getRepository('BackendAdminBundle:Modelo')->findOneById($modeloId);
			
			$orden =  $em->getRepository('BackendAdminBundle:OrdenIngreso')->findOneById($ordenId);
			
			$ingreso = new Ingreso();
						
			$ingreso->setCantidad($cantidad);
			$ingreso->setMarca($marca);
			$ingreso->SetModelo($modelo);	
			$ingreso->setOrden($orden);
							
			$em->persist($ingreso);
			$em->flush();
								
			$data["orden"] = $ordenId;
		*/	
			
			$data["resultado"] = true;
									
			$response = new Response(json_encode($data));
			$response->headers->set('Content-Type', 'application/json');
			
			return $response;
	}
    
    
    public function toGenerateComboAction(Request $request){
		
		    $items = array();
		
			$marcaId = $request->request->get('marca');
			
			$em = $this->getDoctrine()->getManager();
		
	        $modelos = $em->getRepository('BackendAdminBundle:Modelo')->findBy(array('marca' => $marcaId));
												
			foreach($modelos as $modelo)
			{
				$id = $modelo->getId();
				$nombre = $modelo->getNameManufacture()." ".$modelo->getVariante(); 
				$model = array('id'=>$id,'nombre'=>$nombre);
				$items[] = $model;
			}			
		
			$data['items'] = $items;
			$response = new Response(json_encode($data));
			$response->headers->set('Content-Type', 'application/json');
			
			return $response;
		
	}
    
        
    
    /* Generar reportes de Ingresos */
    
    
    
     public function exportarAction(Request $request)
    {
     if ( $this->get('security.context')->isGranted('ROLE_VIEWARTICULO')) {
         
         $em = $this->getDoctrine()->getManager();

       
        $search=$this->generateSQL($request->query->get("search-query")); 
           
       
        $query = $em->createQuery($search);
        
        $excelService = $this->get('xls.service_xls5');
                         
                            
        $excelService->excelObj->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Fecha Creación')
                    ->setCellValue('B1', 'Tipo')
                    ->setCellValue('C1', 'Cliente')
                    ->setCellValue('D1', 'Observaciones')                    
                    ;
                    
        $resultados=$query->getResult();
        $i=2;
        foreach($resultados as $r)
        {
           $excelService->excelObj->setActiveSheetIndex(0)
                         ->setCellValue("A$i",$r->getCreatedAt()->format("d-m-Y"))
                         ->setCellValue("B$i",$r->getTipo()->getName())
                         ->setCellValue("C$i",$r->getDisponible())
                         ->setCellValue("D$i",$r->getDescripcion())
                         ->setCellValue("E$i",$r->getObservacion())
                         ;
          $i++;
        }
                            
        $excelService->excelObj->getActiveSheet()->setTitle('Listado de Ordenes');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $excelService->excelObj->setActiveSheetIndex(0);
        $excelService->excelObj->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $excelService->excelObj->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $excelService->excelObj->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $excelService->excelObj->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $excelService->excelObj->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        
        
        $fileName="ordenes_".date("Ymd").".xls";
        //create the response
        $response = $excelService->getResponse();
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        //$response->headers->set('Content-Disposition', 'filename='.$fileName);
        echo header("Content-Disposition: attachment; filename=$fileName");
        // If you are using a https connection, you have to set those two headers and use sendHeaders() for compatibility with IE <9
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->sendHeaders();
        return $response; 
        
        
        }
        else{
           throw new AccessDeniedException(); 
        }
    }
    
    
}
