<?php

namespace Backend\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class MovimientoParteType extends AbstractType
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
            ->add('depositoOrigen','entity',array(
                'class'=>'BackendAdminBundle:AreaTrabajo',
                'property'=>'nombre',
            ))	
			->add('depositoDestino','entity',array(
                'class'=>'BackendAdminBundle:AreaTrabajo',
                'property'=>'nombre',
            ))
            /*
            ->add('articulos','entity',array(
                'class'=>'BackendAdminBundle:Articulo',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                        ->where('u.isDelete = :delete')
                        ->andWhere('u.isDisponible = true')                                              
                        ->setParameter('delete',false)
                        ->orderBy('u.imei', 'ASC');                         
            },
                'property'=>'imei' //,
                //'multiple'=>true //un solo deposito por operario
            ))
            */ ;
           
            }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Backend\AdminBundle\Entity\MovimientoParte'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'backend_adminbundle_movimiento_parte';
    }
}
