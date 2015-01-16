<?php

namespace Backend\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="parte")
 * @ORM\Entity()
 */

class Parte
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
     * @ORM\Column(name="is_delete", type="boolean" )
     */
    
    private $isDelete;
    
    /**
     * @ORM\ManyToOne(targetEntity="TipoArticulo", inversedBy="partes")
     * @ORM\JoinColumn(name="tipo_id", referencedColumnName="id")
     */

    protected $tipo;
   
     /**
     * @ORM\Column(name="codigo", type="string", length=15, nullable=false)
     */
     
    private $codigo;
    
     /**
     * @ORM\Column(name="nombre_fabricante", type="string", length=100, nullable=false)
     */ 
     
    private $nombre_fabricante;
               
     /**
     * @ORM\Column(name="nombre_interno", type="string", length=100, nullable=false)
     */
    
    private $nombre_interno;
               
     /**
     * @ORM\Column(name="observacion", type="text", nullable=false)
     */
    
    private $observacion;
    
     /**
     * @ORM\Column(name="stock", type="integer")
     */
    
    private $stock;
        
    /**
	 * @ORM\ManyToMany(targetEntity="Marca", inversedBy="partes")
     * @ORM\JoinTable(name="marca_parte")
	 */    
           
    protected $marcas;
           
    /**
	 * @ORM\ManyToMany(targetEntity="Modelo", inversedBy="partes")
     * @ORM\JoinTable(name="modelo_parte")
	 */	               
         
    protected $modelos;
    
    /**
     * @ORM\OneToMany(targetEntity="IngresoParte", mappedBy="parte")
     * 
     **/     
    
    private $ingresos;
    
    /**
	 * @ORM\ManyToMany(targetEntity="MovimientoParte", inversedBy="partes")
     * @ORM\JoinTable(name="parte_movimiento")
	 */	
		
	protected $movimientos;

		         
    /**
     * Constructor
     */
    public function __construct()
    {
         $this->isDelete=false;
         $this->isValido=true;
         $this->createdAt = new \DateTime('now');
         //$this->modelos = new ArrayCollection();   
    }
    
    public function __toString()
    {
      return mb_convert_case($this->name, MB_CASE_TITLE,"UTF-8");
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
     * @return Parte
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
     * @return Parte
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
     * Set codigo
     *
     * @param string $codigo
     * @return Parte
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Parte
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
     * @return Parte
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
     * Add modelos
     *
     * @param \Backend\AdminBundle\Entity\Modelo $modelos
     * @return Parte
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
     * Get modelo
     *
     * @return \Backend\AdminBundle\Entity\Modelo 
     */
    public function getModelo()
    {
        return $this->modelos;
    }

	/**
     * Get marca
     *
     * @return \Backend\AdminBundle\Entity\Marca 
     */
     
    public function getMarca()
    {
        return $this->marcas;
    }


    /**
     * Set nombre_fabricante
     *
     * @param string $nombreFabricante
     * @return Parte
     */
    public function setNombreFabricante($nombreFabricante)
    {
        $this->nombre_fabricante = $nombreFabricante;
    
        return $this;
    }

    /**
     * Get nombre_fabricante
     *
     * @return string 
     */
    public function getNombreFabricante()
    {
        return $this->nombre_fabricante;
    }

    /**
     * Set nombre_interno
     *
     * @param string $nombreInterno
     * @return Parte
     */
    public function setNombreInterno($nombreInterno)
    {
        $this->nombre_interno = $nombreInterno;
    
        return $this;
    }

    /**
     * Get nombre_interno
     *
     * @return string 
     */
    public function getNombreInterno()
    {
        return $this->nombre_interno;
    }

    /**
     * Set tipo
     *
     * @param \Backend\AdminBundle\Entity\TipoArticulo $tipo
     * @return Parte
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
     * Add marcas
     *
     * @param \Backend\AdminBundle\Entity\Marca $marcas
     * @return Parte
     */
    public function addMarca(\Backend\AdminBundle\Entity\Marca $marcas)
    {
        $this->marcas[] = $marcas;
    
        return $this;
    }

    /**
     * Remove marcas
     *
     * @param \Backend\AdminBundle\Entity\Marca $marcas
     */
    public function removeMarca(\Backend\AdminBundle\Entity\Marca $marcas)
    {
        $this->marcas->removeElement($marcas);
    }

    /**
     * Get marcas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMarcas()
    {
        return $this->marcas;
    }

    /**
     * Add movimientos
     *
     * @param \Backend\AdminBundle\Entity\MovimientoParte $movimientos
     * @return Parte
     */
    public function addMovimiento(\Backend\AdminBundle\Entity\MovimientoParte $movimientos)
    {
        $this->movimientos[] = $movimientos;
    
        return $this;
    }

    /**
     * Remove movimientos
     *
     * @param \Backend\AdminBundle\Entity\MovimientoParte $movimientos
     */
    public function removeMovimiento(\Backend\AdminBundle\Entity\MovimientoParte $movimientos)
    {
        $this->movimientos->removeElement($movimientos);
    }

    /**
     * Get movimientos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovimientos()
    {
        return $this->movimientos;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Parte
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
     * Add ingresos
     *
     * @param \Backend\AdminBundle\Entity\IngresoParte $ingresos
     * @return Parte
     */
    public function addIngreso(\Backend\AdminBundle\Entity\IngresoParte $ingresos)
    {
        $this->ingresos[] = $ingresos;
    
        return $this;
    }

    /**
     * Remove ingresos
     *
     * @param \Backend\AdminBundle\Entity\IngresoParte $ingresos
     */
    public function removeIngreso(\Backend\AdminBundle\Entity\IngresoParte $ingresos)
    {
        $this->ingresos->removeElement($ingresos);
    }

    /**
     * Get ingresos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIngresos()
    {
        return $this->ingresos;
    }
}