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
     * @ORM\Column(name="codigo", type="string", length=15, nullable=true)
     */
     
    private $codigo;
    
     /**
     * @ORM\Column(name="serial", type="string", length=100, nullable=true)
     */ 
     
    private $descripcion;
               
     /**
     * @ORM\Column(name="observacion", type="text", nullable=true)
     */
    
    private $observacion;
       
    /**
	 * @ORM\ManyToMany(targetEntity="Modelo", inversedBy="compatibilidades")
     * @ORM\JoinTable(name="modelo_parte")
	 */	               
         
    public $modelos;

		         
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
}