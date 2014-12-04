<?php
 
namespace Backend\AdminBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;

 
class PaisSubscriber implements EventSubscriberInterface
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
 
    private function addPaisForm($form, $pais)
    {
        $form->add($this->factory->createNamed('pais', 'entity', $pais, array(
            'class'         => 'BackendAdminBundle:Pais',
            'auto_initialize' => false,
            'empty_value'   => 'Seleccione país',
            'query_builder' => function (EntityRepository $repository) {
                $qb = $repository->createQueryBuilder('pais')
                                  ->orderBy('pais.name');
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
 
        $pais = ($data->provincia) ? $data->getProvincia()->getPais() : null ;
        $this->addPaisForm($form, $pais);
    }
 
    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $pais = array_key_exists('pais', $data) ? $data['pais'] : null;
        $this->addPaisForm($form, $pais);
    }
}
