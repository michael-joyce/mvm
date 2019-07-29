<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Nines\UtilBundle\Entity\AbstractTerm;

/**
 * PrintSource
 *
 * @ORM\Table(name="print_source")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PrintSourceRepository")
 */
class PrintSource extends AbstractTerm
{

    /**
     * @var Place
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Place", inversedBy="printSources")
     */
    private $place;

    /**
     * @var Collection|Content
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Content", mappedBy="printSource")
     */
    private $contents;

    /**
     * @var Collection|Manuscript
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Manuscript", mappedBy="printSources")
     */
    private $manuscripts;

    public function __construct() {
        parent::__construct();
        $this->contents = new ArrayCollection();
        $this->manuscripts = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Force all entities to provide a stringify function.
     *
     * @return string
     */
    public function __toString() {
        return get_class() . ' #' . $this->id;
    }

    /**
     * Set place.
     *
     * @param \AppBundle\Entity\Place|null $place
     *
     * @return PrintSource
     */
    public function setPlace(\AppBundle\Entity\Place $place = null)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place.
     *
     * @return \AppBundle\Entity\Place|null
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Add content.
     *
     * @param \AppBundle\Entity\Content $content
     *
     * @return PrintSource
     */
    public function addContent(\AppBundle\Entity\Content $content)
    {
        $this->contents[] = $content;

        return $this;
    }

    /**
     * Remove content.
     *
     * @param \AppBundle\Entity\Content $content
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeContent(\AppBundle\Entity\Content $content)
    {
        return $this->contents->removeElement($content);
    }

    /**
     * Get contents.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * Add manuscript.
     *
     * @param \AppBundle\Entity\Manuscript $manuscript
     *
     * @return PrintSource
     */
    public function addManuscript(\AppBundle\Entity\Manuscript $manuscript)
    {
        $this->manuscripts[] = $manuscript;

        return $this;
    }

    /**
     * Remove manuscript.
     *
     * @param \AppBundle\Entity\Manuscript $manuscript
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeManuscript(\AppBundle\Entity\Manuscript $manuscript)
    {
        return $this->manuscripts->removeElement($manuscript);
    }

    /**
     * Get manuscripts.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getManuscripts()
    {
        return $this->manuscripts;
    }
    
}
