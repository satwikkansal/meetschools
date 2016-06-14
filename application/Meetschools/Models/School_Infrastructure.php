<?php

namespace Meetschools\Models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Meetschools\Models\School_Infrastructure
 *
 * @Table(name="school_infrastructure")
 * @Entity(repositoryClass="Meetschools\Repositories\School_Infrastructure_Repository")
 */
class School_Infrastructure extends \Meetschools\Models\Base {

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
     * @var boolean $swimming_pool
     *
     * @Column(name="swimming_pool", type="boolean", nullable=true)
     */
    private $swimming_pool;

    /**
     * @var boolean $dance_room
     *
     * @Column(name="dance_room", type="boolean", nullable=true)
     */
    private $dance_room;

    /**
     * @var boolean $gym
     *
     * @Column(name="gym", type="boolean", nullable=true)
     */
    private $gym;

    /**
     * @var boolean $music_room
     *
     * @Column(name="music_room", type="boolean", nullable=true)
     */
    private $music_room;

    /**
     * @var boolean $hostel
     *
     * @Column(name="hostel", type="boolean", nullable=true)
     */
    private $hostel;

    /**
     * @var boolean $medical_facility
     *
     * @Column(name="medical_facility", type="boolean", nullable=true)
     */
    private $medical_facility;

    /**
     * @var boolean $indoor_games
     *
     * @Column(name="indoor_games", type="boolean", nullable=true)
     */
    private $indoor_games;

    /**
     * @var boolean $computer_aided_learning
     *
     * @Column(name="computer_aided_learning", type="boolean", nullable=true)
     */
    private $computer_aided_learning;

    /**
     * @var boolean $library
     *
     * @Column(name="library", type="boolean", nullable=true)
     */
    private $library;

    /**
     * @var boolean $playground
     *
     * @Column(name="playground", type="boolean", nullable=true)
     */
    private $playground;

    /**
     * @var boolean $ramps
     *
     * @Column(name="ramps", type="boolean", nullable=true)
     */
    private $ramps;

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
     * Set swimming_pool
     *
     * @param boolean $swimming_pool
     */
    public function set_swimming_pool($swimming_pool) {
        $this->swimming_pool = $swimming_pool;
    }

    /**
     * Get swimming_pool
     *
     * @return boolean
     */
    public function swimming_pool() {
        return $this->swimming_pool;
    }

    /**
     * Set dance_room
     *
     * @param boolean $dance_room
     */
    public function set_dance_room($dance_room) {
        $this->dance_room = $dance_room;
    }

    /**
     * Get dance_room
     *
     * @return boolean
     */
    public function dance_room() {
        return $this->dance_room;
    }

    /**
     * Set gym
     *
     * @param boolean $gym
     */
    public function set_gym($gym) {
        $this->gym = $gym;
    }

    /**
     * Get gym
     *
     * @return boolean
     */
    public function gym() {
        return $this->gym;
    }

    /**
     * Set music_room
     *
     * @param boolean $music_room
     */
    public function set_music_room($music_room) {
        $this->music_room = $music_room;
    }

    /**
     * Get music_room
     *
     * @return boolean
     */
    public function music_room() {
        return $this->music_room;
    }

    /**
     * Set hostel
     *
     * @param boolean $hostel
     */
    public function set_hostel($hostel) {
        $this->hostel = $hostel;
    }

    /**
     * Get hostel
     *
     * @return boolean
     */
    public function hostel() {
        return $this->hostel;
    }

    /**
     * Set medical_facility
     *
     * @param boolean $medical_facility
     */
    public function set_medical_facility($medical_facility) {
        $this->medical_facility = $medical_facility;
    }

    /**
     * Get medical_facility
     *
     * @return boolean
     */
    public function medical_facility() {
        return $this->medical_facility;
    }

    /**
     * Set indoor_games
     *
     * @param boolean $indoor_games
     */
    public function set_indoor_games($indoor_games) {
        $this->indoor_games = $indoor_games;
    }

    /**
     * Get indoor_games
     *
     * @return boolean
     */
    public function indoor_games() {
        return $this->indoor_games;
    }

    /**
     * Set computer_aided_learning
     *
     * @param boolean $computer_aided_learning
     */
    public function set_computer_aided_learning($computer_aided_learning) {
        $this->computer_aided_learning = $computer_aided_learning;
    }

    /**
     * Get computer_aided_learning
     *
     * @return boolean
     */
    public function computer_aided_learning() {
        return $this->computer_aided_learning;
    }

    /**
     * Set library
     *
     * @param boolean $library
     */
    public function set_library($library) {
        $this->library = $library;
    }

    /**
     * Get library
     *
     * @return boolean
     */
    public function library() {
        return $this->library;
    }

    /**
     * Set playground
     *
     * @param boolean $playground
     */
    public function set_playground($playground) {
        $this->playground = $playground;
    }

    /**
     * Get playground
     *
     * @return boolean
     */
    public function playground() {
        return $this->playground;
    }

    /**
     * Set ramps
     *
     * @param boolean $ramps
     */
    public function set_ramps($ramps) {
        $this->ramps = $ramps;
    }

    /**
     * Get ramps
     *
     * @return boolean
     */
    public function ramps() {
        return $this->ramps;
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

/* End of file School_Infrastructure.php */
/* Location: ./application/models/Meetschools/Models/School_Infrastructure.php */