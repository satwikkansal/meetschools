<?php

namespace Meetschools\Models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Meetschools\Models\Board
 *
 * @Table(name="boards")
 * @Entity(repositoryClass="Meetschools\Repositories\Board_Repository")
 */
class Board extends \Meetschools\Models\Base {

    public function __construct() {
        
    }

    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=256, nullable=true)
     */
    private $name;

    /**
     * @var datetime $created_at
     *
     * @Column(name="created_at", type="datetime", nullable=false)
     */
    private $created_at;

    /**
     * @var datetime $last_updated_at
     *
     * @Column(name="last_updated_at", type="datetime", nullable=false)
     */
    private $last_updated_at;

    /**
     * Get id
     *
     * @return integer
     */
    public function id() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function set_name($name) {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function name() {
        return $this->name;
    }

    /**
     * Set created_at
     *
     * @param datetime $created_at
     */
    public function set_created_at($created_at) {
        $this->created_at = $created_at;
    }

    /**
     * Get created_at
     *
     * @return datetime
     */
    public function created_at() {
        return $this->created_at;
    }

    /**
     * Set last_updated_at
     *
     * @param datetime $last_updated_at
     */
    public function set_last_updated_at($last_updated_at) {
        $this->last_updated_at = $last_updated_at;
    }

    /**
     * Get last_updated_at
     *
     * @return datetime
     */
    public function last_updated_at() {
        return $this->last_updated_at;
    }

}

/* End of file Board.php */
/* Location: ./application/models/Meetschools/Models/Board.php */