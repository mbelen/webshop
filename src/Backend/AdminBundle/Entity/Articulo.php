<?php

namespace Backend\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="articulo")
 * @ORM\Entity()
 */

class Articulo
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
     * @ORM\Column(name="updated_at", type="datetime",nullable=true)
     */
    private $updatedAt;
    
     /**
     * @ORM\Column(name="price", type="float", scale=2, nullable=true)
     */
     
    private $price;
    
     /**
     * @ORM\Column(name="is_delete", type="boolean" )
     */
    private $isDelete;
    
    /**
     * @ORM\Column(name="is_disponible", type="boolean" )
     */
    private $isDisponible;
    
   /**
     * @ORM\ManyToOne(targetEntity="TipoArticulo", inversedBy="articulos")
     * @ORM\JoinColumn(name="tipo_id", referencedColumnName="id")
     */

    protected $tipo;    

     /**
     * @ORM\Column(name="codigo", type="string", nullable=true, unique = true)
     */
     
    private $codigo;
    
    /**
     * @ORM\Column(name="name", type="string", nullable=true)
     */
     
    private $name;    
    
    /**
     * @ORM\Column(name="nameManufacture", type="string", nullable=true, unique = true)
     */
     
    private $nameManufacture;  
    
    /**
     * @ORM\Column(name="imagen", type="string", nullable=true)
     */
     
    private $imagen;   
     
    /**
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */    
     
    private $descripcion;
             
	/**
	 * @ORM\ManyToMany(targetEntity="Modelo", inversedBy="articulos")
     * @ORM\JoinTable(name="modelo_articulo")
	 */	               
         
    protected $modelos;
    	
	/**
     * @ORM\Column(name="stock", type="integer", nullable=true)
     */
     
    private $stock;

	/**
     * @ORM\OneToMany(targetEntity="ArticuloPedido", mappedBy="articulo")
     **/
	
    protected $articulosPedidos;
		         
    /**
     * Constructor
     */

    public function __construct()
    {
         $this->isDelete=false;
         $this->isDisponible=true;
         $this->isValido=true;
         $this->garantia=false;
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
     * @return Articulo
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
     * Set isDelete
     *
     * @param boolean $isDelete
     * @return Articulo
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
     * Set isDisponible
     *
     * @param boolean $isDisponible
     * @return Articulo
     */
    public function setIsDisponible($isDisponible)
    {
        $this->isDisponible = $isDisponible;
    
        return $this;
    }

    /**
     * Get isDisponible
     *
     * @return boolean 
     */
    public function getIsDisponible()
    {
        return $this->isDisponible;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Articulo
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return Articulo
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    
        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set tipo
     *
     * @param \Backend\AdminBundle\Entity\TipoArticulo $tipo
     * @return Articulo
     */
    public function setTipo(\Backend\AdminBundle\Entity\TipoArticulo $tipo = null)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return \Backend\AdminBundle\Entity\TipoArticulo 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Add modelos
     *
     * @param \Backend\AdminBundle\Entity\Modelo $modelos
     * @return Articulo
     */
    public function addModelo(\Backend\AdminBundle\Entity\Modelo $modelos)
    {
        $this->modelos[] = $modelos;
    
        return $this;
    }

    /**
     * Remove modelos
     *
     * @param \Backend\AdminBundle\Entity\Modelo $modelos
     */
    public function removeModelo(\Backend\AdminBundle\Entity\Modelo $modelos)
    {
        $this->modelos->removeElement($modelos);
    }

    /**
     * Get modelos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModelos()
    {
        return $this->modelos;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Articulo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    
        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Articulo
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add articulosPedidos
     *
     * @param \Backend\AdminBundle\Entity\ArticuloPedido $articulosPedidos
     * @return Articulo
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
     * Set stock
     *
     * @param integer $stock
     * @return Articulo
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    
        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Articulo
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Articulo
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set nameManufacture
     *
     * @param string $nameManufacture
     * @return Articulo
     */
    public function setNameManufacture($nameManufacture)
    {
        $this->nameManufacture = $nameManufacture;
    
        return $this;
    }

    /**
     * Get nameManufacture
     *
     * @return string 
     */
    public function getNameManufacture()
    {
        return $this->nameManufacture;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     * @return Articulo
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    
        return $this;
    }

    /**
     * Get imagen
     *
     * @return string 
     */
    public function getImagen()
    {
        return $this->imagen;
    }
}