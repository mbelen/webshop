<?php

namespace Backend\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="estado_movimiento")
 * @ORM\Entity()
 */

class EstadoMovimiento
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    
    private $id;
 
    /**
     * @ORM\Column(name="name", type="string", length=100)
     */

    protected $name;    

         
     /**
     * @ORM\Column(name="is_delete", type="boolean" )
     */
    private $isDelete;
    
    /**
     * @ORM\OneToMany(targetEntity="OrdenIngreso", mappedBy="estado")
     */

    protected $ordenes;
    
    /**
     * @ORM\OneToMany(targetEntity="OrdenIngresoParte", mappedBy="estado")
     */

    protected $ordenesParte;
    
    /**
     * @ORM\OneToMany(targetEntity="Movimiento", mappedBy="estado")
     */

    protected $movimientos;
    
    /**
     * @ORM\OneToMany(targetEntity="MovimientoParte", mappedBy="estado")
     */

    protected $movimientosParte;
    
    /**
     * Constructor
     */
     
    public function __construct()
    {
        $this->isDelete=false;
        $this->createdAt = new \DateTime('now');
        $this->articulos = new ArrayCollection();
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
     * @return Estado
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
     * @return Estado
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
     * Add articulos
     *
     * @param \Backend\AdminBundle\Entity\Articulo $articulos
     * @return Estado
     */
    public function addArticulo(\Backend\AdminBundle\Entity\Articulo $articulos)
    {
        $this->articulos[] = $articulos;
    
        return $this;
    }

    /**
     * Remove articulos
     *
     * @param \Backend\AdminBundle\Entity\Articulo $articulos
     */
    public function removeArticulo(\Backend\AdminBundle\Entity\Articulo $articulos)
    {
        $this->articulos->removeElement($articulos);
    }

    /**
     * Get articulos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticulos()
    {
        return $this->articulos;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Estado
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
     * Add ordenes
     *
     * @param \Backend\AdminBundle\Entity\OrdenIngreso $ordenes
     * @return EstadoMovimiento
     */
    public function addOrdene(\Backend\AdminBundle\Entity\OrdenIngreso $ordenes)
    {
        $this->ordenes[] = $ordenes;
    
        return $this;
    }

    /**
     * Remove ordenes
     *
     * @param \Backend\AdminBundle\Entity\OrdenIngreso $ordenes
     */
    public function removeOrdene(\Backend\AdminBundle\Entity\OrdenIngreso $ordenes)
    {
        $this->ordenes->removeElement($ordenes);
    }

    /**
     * Get ordenes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrdenes()
    {
        return $this->ordenes;
    }

    /**
     * Add ordenesParte
     *
     * @param \Backend\AdminBundle\Entity\OrdenIngresoParte $ordenesParte
     * @return EstadoMovimiento
     */
    public function addOrdenesParte(\Backend\AdminBundle\Entity\OrdenIngresoParte $ordenesParte)
    {
        $this->ordenesParte[] = $ordenesParte;
    
        return $this;
    }

    /**
     * Remove ordenesParte
     *
     * @param \Backend\AdminBundle\Entity\OrdenIngresoParte $ordenesParte
     */
    public function removeOrdenesParte(\Backend\AdminBundle\Entity\OrdenIngresoParte $ordenesParte)
    {
        $this->ordenesParte->removeElement($ordenesParte);
    }

    /**
     * Get ordenesParte
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrdenesParte()
    {
        return $this->ordenesParte;
    }

    /**
     * Add movimientos
     *
     * @param \Backend\AdminBundle\Entity\Movimiento $movimientos
     * @return EstadoMovimiento
     */
    public function addMovimiento(\Backend\AdminBundle\Entity\Movimiento $movimientos)
    {
        $this->movimientos[] = $movimientos;
    
        return $this;
    }

    /**
     * Remove movimientos
     *
     * @param \Backend\AdminBundle\Entity\Movimiento $movimientos
     */
    public function removeMovimiento(\Backend\AdminBundle\Entity\Movimiento $movimientos)
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
     * Add movimientosParte
     *
     * @param \Backend\AdminBundle\Entity\MovimientoParte $movimientosParte
     * @return EstadoMovimiento
     */
    public function addMovimientosParte(\Backend\AdminBundle\Entity\MovimientoParte $movimientosParte)
    {
        $this->movimientosParte[] = $movimientosParte;
    
        return $this;
    }

    /**
     * Remove movimientosParte
     *
     * @param \Backend\AdminBundle\Entity\MovimientoParte $movimientosParte
     */
    public function removeMovimientosParte(\Backend\AdminBundle\Entity\MovimientoParte $movimientosParte)
    {
        $this->movimientosParte->removeElement($movimientosParte);
    }

    /**
     * Get movimientosParte
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovimientosParte()
    {
        return $this->movimientosParte;
    }
}