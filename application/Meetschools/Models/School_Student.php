<?php

namespace Meetschools\Models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Meetschools\Models\School_Student
 *
 * @Table(name="schools_students")
 * @Entity(repositoryClass="Meetschools\Repositories\School_Student_Repository")
 */
class School_Student extends \Meetschools\Models\Base {

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
     * @var Meetschools\Models\Student $student
     *
     * @ManyToOne(targetEntity="Meetschools\Models\Student", cascade={"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="student_id", referencedColumnName="id")
     * })
     */
    private $student;

    /**
     * @var integer $start_year
     *
     * @Column(name="start_year", type="integer", nullable=true)
     */
    private $start_year;

    /**
     * @var integer $end_year
     *
     * @Column(name="end_year", type="integer", nullable=true)
     */
    private $end_year;

    /**
     * @var boolean $on_going
     *
     * @Column(name="on_going", type="boolean", nullable=true)
     */
    private $on_going;

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
     * Set student
     *
     * @param Meetschools\Models\Student $student
     */
    public function set_student(\Meetschools\Models\Student $student) {
        $this->student = $student;
    }

    /**
     * Get student
     *
     * @return Meetschools\Models\Student
     */
    public function student() {
        return $this->student;
    }

    /**
     * Set start_year
     *
     * @param integer $start_year
     */
    public function set_start_year($start_year) {
        $this->start_year = $start_year;
    }

    /**
     * Get start_year
     *
     * @return integer
     */
    public function start_year() {
        return $this->start_year;
    }

    /**
     * Set end_year
     *
     * @param integer $end_year
     */
    public function set_end_year($end_year) {
        $this->end_year = $end_year;
    }

    /**
     * Get end_year
     *
     * @return integer
     */
    public function end_year() {
        return $this->end_year;
    }

    /**
     * Set on_going
     *
     * @param boolean $on_going
     */
    public function set_on_going($on_going) {
        $this->on_going = $on_going;
    }

    /**
     * Get on_going
     *
     * @return boolean
     */
    public function on_going() {
        return $this->on_going;
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

/* End of file School_Student.php */
/* Location: ./application/models/Meetschools/Models/School_Student.php */