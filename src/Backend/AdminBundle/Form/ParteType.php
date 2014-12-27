<?php

namespace Backend\AdminBundle\Form;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Backend\AdminBundle\Form\EventListener\MarcaSubscriber;
use Backend\AdminBundle\Form\EventListener\ModeloSubscriber;


class ParteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipo', 'entity',array(
            'class'=>'BackendAdminBundle:TipoArticulo',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder("u")
                         ->select("u")
                         ->where('u.parent != :null') // Partes, no deberia mostrar equipos
                         ->setParameter('null',false)                        
                         ->orderBy('u.name', 'ASC');
                      
            }))
		/*		
            ->add('modelo', 'entity',array(
            'multiple' => true,
            'class'=>'BackendAdminBundle:Modelo',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder("u")
                         ->select("u")
                         ->orderBy('u.name', 'ASC');                 
                      
            }))
            
          */  
            
            /*
            ->add('marca', 'entity',array(
            'mapped' => false,
            'class'=>'BackendAdminBundle:Marca',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder("u")
                         ->select("u")
                         ->orderBy('u.name', 'ASC');                 
                      
            }))
            */
                        
            ->add('codigo')
            ->add('nombre_fabricante')
            ->add('nombre_interno')
            ->add('observacion');
            
                        
            
            $marcaSubscriber = new MarcaSubscriber($builder->getFormFactory());
            $builder->addEventSubscriber($marcaSubscriber);
			
			
			$modeloSubscriber = new ModeloSubscriber($builder->getFormFactory());
			$builder->addEventSubscriber($modeloSubscriber);
			
			
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Backend\AdminBundle\Entity\Parte'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'backend_adminbundle_parte';
    }
}
