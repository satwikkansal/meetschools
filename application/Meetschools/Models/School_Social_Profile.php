<?php

namespace Meetschools\Models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Meetschools\Models\School_Social_Profile
 *
 * @Table(name="school_social_profiles")
 * @Entity(repositoryClass="Meetschools\Repositories\School_Social_Profile_Repository")
 */
class School_Social_Profile extends \Meetschools\Models\Base {

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
     * @var Meetschools\Models\Social_Profile $social_profile
     *
     * @ManyToOne(targetEntity="Meetschools\Models\Social_Profile", cascade={"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="social_profile_id", referencedColumnName="id")
     * })
     */
    private $social_profile;

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
     * Set social_profile
     *
     * @param Meetschools\Models\Social_Profile $social_profile
     */
    public function set_social_profile(\Meetschools\Models\Social_Profile $social_profile) {
        $this->social_profile = $social_profile;
    }

    /**
     * Get social_profile
     *
     * @return Meetschools\Models\Social_Profile
     */
    public function social_profile() {
        return $this->social_profile;
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

/* End of file School_Social_Profile.php */
/* Location: ./application/models/Meetschools/Models/School_Social_Profile.php */