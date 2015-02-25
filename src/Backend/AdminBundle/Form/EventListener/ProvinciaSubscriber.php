<?php
 
namespace Backend\AdminBundle\Form\EventListener;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;

use Backend\AdminBundle\Entity\Pais;
 
class ProvinciaSubscriber implements EventSubscriberInterface
{
    private $factory;
 
    public function __construct(FormFactoryInterface $factory)
    {
        $this->factory = $factory;
    }
 
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_BIND     => 'preBind'
        );
    }
 
    private function addProvinciaForm($form, $pais)
    {
        $form->add($this->factory->createNamed('provincia','entity', null, array(
            'class'         => 'BackendAdminBundle:Provincia',
            'empty_value'   => 'Seleccione Provincia',
            'auto_initialize' => false,
            "property"=>"name",
            "required"=>true,
            'query_builder' => function (EntityRepository $repository) use ($pais) {
                $qb = $repository->createQueryBuilder('provincia')
                       ->innerJoin('provincia.pais', 'pais');
                       
                if ($pais instanceof Pais) {
                    $qb->where('provincia.pais = :pais_id')
                    ->setParameter('pais_id', $pais);
                } elseif (is_numeric($pais)) {
                    $qb->where('pais.id = :pais_id')
                    ->setParameter('pais_id', $pais);
                } else {
                    $qb->where('pais.name = :pais_id')
                    ->setParameter('pais_id', null);
                }  
                     
                $qb->orderBy('provincia.name');
                return $qb;
            }
        )));
    }
 
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        
        $pais = ($data->provincia) ? $data->provincia->getPais() : null ;
        $this->addProvinciaForm($form, $pais);
    }
 
    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
       
        $pais = array_key_exists('pais', $data) ? $data['pais'] : null;
        $this->addProvinciaForm($form, $pais);
    }
}
