<?php

namespace Backend\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="pedido")
 * @ORM\Entity()
 */

class Pedido
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    
    private $id;
 
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(name="modified_at", type="datetime", nullable=true)
     */
    private $modifiedAt;    
    
     /**
     * @ORM\Column(name="is_delete", type="boolean" )
     */
    private $isDelete;    
    
    
   /**
     * @ORM\ManyToOne(targetEntity="Estado", inversedBy="pedidos")
     * @ORM\JoinColumn(name="estado_id", referencedColumnName="id")
     */

    protected $estado;    
     
               
    /**
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    
    private $observaciones;
    
    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="pedidos")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */    
    
    protected $cliente;

	/**
     * @ORM\OneToMany(targetEntity="ArticuloPedido", mappedBy="pedido")
     **/

    protected $articulosPedidos;
	
	
		         
    /**
     * Constructor
     */

    public function __construct()
    {
         $this->isDelete=false;
         $this->isDisponible=true;
         $this->createdAt = new \DateTime('now');
          
    }
   


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Pedido
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set modifiedAt
     *
     * @param \DateTime $modifiedAt
     * @return Pedido
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;
    
        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime 
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * Set isDelete
     *
     * @param boolean $isDelete
     * @return Pedido
     */
    public function setIsDelete($isDelete)
    {
        $this->isDelete = $isDelete;
    
        return $this;
    }

    /**
     * Get isDelete
     *
     * @return boolean 
     */
    public function getIsDelete()
    {
        return $this->isDelete;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Pedido
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    
        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set estado
     *
     * @param \Backend\AdminBundle\Entity\Estado $estado
     * @return Pedido
     */
    public function setEstado(\Backend\AdminBundle\Entity\Estado $estado = null)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return \Backend\AdminBundle\Entity\Estado 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Add articulosPedidos
     *
     * @param \Backend\AdminBundle\Entity\ArticuloPedido $articulosPedidos
     * @return Pedido
     */
    public function addArticulosPedido(\Backend\AdminBundle\Entity\ArticuloPedido $articulosPedidos)
    {
        $this->articulosPedidos[] = $articulosPedidos;
    
        return $this;
    }

    /**
     * Remove articulosPedidos
     *
     * @param \Backend\AdminBundle\Entity\ArticuloPedido $articulosPedidos
     */
    public function removeArticulosPedido(\Backend\AdminBundle\Entity\ArticuloPedido $articulosPedidos)
    {
        $this->articulosPedidos->removeElement($articulosPedidos);
    }

    /**
     * Get articulosPedidos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticulosPedidos()
    {
        return $this->articulosPedidos;
    }

    /**
     * Set cliente
     *
     * @param \Backend\AdminBundle\Entity\Cliente $cliente
     * @return Pedido
     */
    public function setCliente(\Backend\AdminBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;
    
        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Backend\AdminBundle\Entity\Cliente 
     */
    public function getCliente()
    {
        return $this->cliente;
    }
}