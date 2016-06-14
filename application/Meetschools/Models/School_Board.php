<?php

namespace Meetschools\Models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Meetschools\Models\School_Board
 *
 * @Table(name="schools_boards")
 * @Entity(repositoryClass="Meetschools\Repositories\School_Board_Repository")
 */
class School_Board extends \Meetschools\Models\Base {

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
     * @var Meetschools\Models\School $school
     *
     * @ManyToOne(targetEntity="Meetschools\Models\School", cascade={"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="school_id", referencedColumnName="id")
     * })
     */
    private $school;

    /**
     * @var Meetschools\Models\Board $board
     *
     * @ManyToOne(targetEntity="Meetschools\Models\Board", cascade={"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="board_id", referencedColumnName="id")
     * })
     */
    private $board;

    /**
     * @var datetime $created_at
     *
     * @Column(name="created_at", type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @var datetime $last_updated_at
     *
     * @Column(name="last_updated_at", type="datetime", nullable=true)
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
     * Set school
     *
     * @param Meetschools\Models\School $school
     */
    public function set_school(\Meetschools\Models\School $school) {
        $this->school = $school;
    }

    /**
     * Get school
     *
     * @return Meetschools\Models\School
     */
    public function school() {
        return $this->school;
    }

    /**
     * Set board
     *
     * @param Meetschools\Models\Board $board
     */
    public function set_board(\Meetschools\Models\Board $board) {
        $this->board = $board;
    }

    /**
     * Get board
     *
     * @return Meetschools\Models\Board
     */
    public function board() {
        return $this->board;
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

/* End of file School_Board.php */
/* Location: ./application/models/Meetschools/Models/School_Board.php */