<?php 
namespace Backend\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="marca")
 * @ORM\Entity()
 */
class Marca
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    protected $id;


    /**
     * @ORM\Column(name="name", type="string", length=100)
     */

    protected $name;

    
        /**
     * @ORM\Column(name="is_delete", type="boolean" )
     */
    private $isDelete;
    
    /**
     * @ORM\OneToMany(targetEntity="Modelo", mappedBy="marca")
     */
    protected $modelos;
    
    /**
     * @ORM\OneToMany(targetEntity="Articulo", mappedBy="marca")
     */
     
    protected $articulos;
    
    /**
     * @ORM\ManyToMany(targetEntity="Parte", mappedBy="marcas")
     */    
	
    protected $partes;

    
    /**
     * @ORM\OneToMany(targetEntity="Ingreso", mappedBy="marca")
     */
    protected $ingresos;
      
    
     
     
    
    public function __construct()
    {
        $this->isDelete=false;
        $this->modelos =  new ArrayCollection();
        $this->articulos = new ArrayCollection();
        $this->ingresos = new ArrayCollection();
       
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
     * Set name
     *
     * @param string $name
     * @return Marca
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
     * Set isDelete
     *
     * @param boolean $isDelete
     * @return Marca
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
     * Add modelos
     *
     * @param \Backend\AdminBundle\Entity\Modelo $modelos
     * @return Marca
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
     * Add articulos
     *
     * @param \Backend\AdminBundle\Entity\Articulo $articulos
     * @return Marca
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
     * Add ingresos
     *
     * @param \Backend\AdminBundle\Entity\Ingreso $ingresos
     * @return Marca
     */
    public function addIngreso(\Backend\AdminBundle\Entity\Ingreso $ingresos)
    {
        $this->ingresos[] = $ingresos;
    
        return $this;
    }

    /**
     * Remove ingresos
     *
     * @param \Backend\AdminBundle\Entity\Ingreso $ingresos
     */
    public function removeIngreso(\Backend\AdminBundle\Entity\Ingreso $ingresos)
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

    /**
     * Add partes
     *
     * @param \Backend\AdminBundle\Entity\Parte $partes
     * @return Marca
     */
    public function addParte(\Backend\AdminBundle\Entity\Parte $partes)
    {
        $this->partes[] = $partes;
    
        return $this;
    }

    /**
     * Remove partes
     *
     * @param \Backend\AdminBundle\Entity\Parte $partes
     */
    public function removeParte(\Backend\AdminBundle\Entity\Parte $partes)
    {
        $this->partes->removeElement($partes);
    }

    /**
     * Get partes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPartes()
    {
        return $this->partes;
    }
}