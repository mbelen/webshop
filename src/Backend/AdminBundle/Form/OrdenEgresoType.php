<?php

namespace Backend\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Backend\AdminBundle\Entity\OrdenEgreso;

class OrdenEgresoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('observaciones')
            ->add('documento')
            ->add('destino')
            ->add('cliente','entity',array(
                'class'=>'BackendAdminBundle:Cliente',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                        ->where('u.isDelete = :delete')                        
                        ->setParameter('delete',false)
                        ->orderBy('u.name', 'ASC');                         
            },
                'property'=>'name',
                'multiple'=>false //un solo deposito por operario
            ))
            ->add('propietario','entity',array(
                'class'=>'BackendAdminBundle:Cliente',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                        ->where('u.isDelete = :delete')                        
                        ->setParameter('delete',false)
                        ->orderBy('u.name', 'ASC');                         
            },
                'property'=>'name',
                'multiple'=>false //un solo deposito por operario
            ))
            ->add('operador','entity',array(
                'class'=>'BackendAdminBundle:OperadorLogistico',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                        ->where('u.isDelete = :delete')                        
                        ->setParameter('delete',false)
                        ->orderBy('u.name', 'ASC');                         
            },
                'property'=>'name',
                'multiple'=>false //un solo deposito por operario
            ))                        

			->add('cantidad', 'text',
				  array('mapped'=>false)
			)		
			->add('marca','entity',array(
                'class'=>'BackendAdminBundle:Marca',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                        ->where('u.isDelete = :delete')                        
                        ->setParameter('delete',false)
                        ->orderBy('u.name', 'ASC');                         
            },
                'property'=>'name',
                'multiple'=>false, //un solo deposito por operario
                'mapped' => false
            ))
            ->add('modelo','entity',array(
                'class'=>'BackendAdminBundle:Modelo',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                        ->where('u.isDelete = :delete')                        
                        ->setParameter('delete',false)
                        ->orderBy('u.name', 'ASC');                         
            },
                'property'=>'name',
                'multiple'=>false, //un solo deposito por operario
                'mapped' => false
            ));  			
			/*
			->add('ingresos','entity',array(
                'class'=>'BackendAdminBundle:Ingreso',
                'property'=>'name',
                'multiple'=>true,
                'expanded'=>true,
                'attr'   =>  array(
                             'class'   => 'c4'),
            ));
            */
			
			
			
       }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Backend\AdminBundle\Entity\OrdenEgreso'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'backend_adminbundle_ordenEgreso';
    }
}
