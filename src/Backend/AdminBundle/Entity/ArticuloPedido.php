<?php

namespace Backend\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="articuloPedido")
 * @ORM\Entity()
 */

class ArticuloPedido
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
     * @ORM\Column(name="cantidad", type="integer" )
     */
     
    private $cantidad;  
               
    /**
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    
    private $observaciones;
        
	/**
     * @ORM\ManyToOne(targetEntity="Pedido", inversedBy="articulosPedidos")
     * @ORM\JoinColumn(name="pedido_id", referencedColumnName="id")
     */

    protected $pedido;    
	
	/**
     * @ORM\ManyToOne(targetEntity="Articulo", inversedBy="articulosPedidos")
     * @ORM\JoinColumn(name="articulo_id", referencedColumnName="id")
     */

    protected $articulo;    
		
		         
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
     * @return ArticuloPedido
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
     * @return ArticuloPedido
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
     * @return ArticuloPedido
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
     * Set cantidad
     *
     * @param integer $cantidad
     * @return ArticuloPedido
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    
        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return ArticuloPedido
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
     * Set pedido
     *
     * @param \Backend\AdminBundle\Entity\Pedido $pedido
     * @return ArticuloPedido
     */
    public function setPedido(\Backend\AdminBundle\Entity\Pedido $pedido = null)
    {
        $this->pedido = $pedido;
    
        return $this;
    }

    /**
     * Get pedido
     *
     * @return \Backend\AdminBundle\Entity\Pedido 
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * Set articulo
     *
     * @param \Backend\AdminBundle\Entity\Articulo $articulo
     * @return ArticuloPedido
     */
    public function setArticulo(\Backend\AdminBundle\Entity\Articulo $articulo = null)
    {
        $this->articulo = $articulo;
    
        return $this;
    }

    /**
     * Get articulo
     *
     * @return \Backend\AdminBundle\Entity\Articulo 
     */
    public function getArticulo()
    {
        return $this->articulo;
    }
}