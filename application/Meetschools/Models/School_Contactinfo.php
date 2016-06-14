<?php

namespace Meetschools\Models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Meetschools\Models\School_Contactinfo
 *
 * @Table(name="school_contactinfo")
 * @Entity(repositoryClass="Meetschools\Repositories\School_Contactinfo_Repository")
 */
class School_Contactinfo extends \Meetschools\Models\Base {

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
     * @var string $address
     *
     * @Column(name="address", type="string", length=5000, nullable=true)
     */
    private $address;

    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=256, nullable=true)
     */
    private $email;

    /**
     * @var string $email_2
     *
     * @Column(name="email_2", type="string", length=256, nullable=true)
     */
    private $email_2;

    /**
     * @var string $country_code
     *
     * @Column(name="country_code", type="string", length=5, nullable=true)
     */
    private $country_code;

    /**
     * @var string $phone
     *
     * @Column(name="phone", type="string", length=15, nullable=true)
     */
    private $phone;

    /**
     * @var string $country_code
     *
     * @Column(name="country_code", type="string", length=5, nullable=true)
     */
    private $country_code_2;

    /**
     * @var string $phone_2
     *
     * @Column(name="phone_2", type="string", length=15, nullable=true)
     */
    private $phone_2;

    /**
     * @var string $website
     *
     * @Column(name="website", type="string", length=256, nullable=true)
     */
    private $website;

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
     * Set address
     *
     * @param string $address
     */
    public function set_address($address) {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function address() {
        return $this->address;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function set_email($email) {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function email() {
        return $this->email;
    }

    /**
     * Set email_2
     *
     * @param string $email_2
     */
    public function set_email_2($email_2) {
        $this->email_2 = $email_2;
    }

    /**
     * Get email_2
     *
     * @return string
     */
    public function email_2() {
        return $this->email_2;
    }

    /**
     * Set country_code
     *
     * @param string $country_code
     */
    public function set_country_code($country_code) {
        $this->country_code = $country_code;
    }

    /**
     * Get country_code
     *
     * @return string
     */
    public function country_code() {
        return $this->country_code;
    }

    /**
     * Set phone
     *
     * @param string $phone
     */
    public function set_phone($phone) {
        $this->phone = $phone;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function phone() {
        return $this->phone;
    }

    /**
     * Set country_code_2
     *
     * @param string $country_code_2
     */
    public function set_country_code_2($country_code_2) {
        $this->country_code_2 = $country_code_2;
    }

    /**
     * Get country_code_2
     *
     * @return string
     */
    public function country_code_2() {
        return $this->country_code_2;
    }

    /**
     * Set phone_2
     *
     * @param string $phone_2
     */
    public function set_phone_2($phone_2) {
        $this->phone_2 = $phone_2;
    }

    /**
     * Get phone_2
     *
     * @return string
     */
    public function phone_2() {
        return $this->phone_2;
    }

    /**
     * Set website
     *
     * @param string $website
     */
    public function set_website($website) {
        $this->website = $website;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function website() {
        return $this->website;
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

/* End of file School_Contactinfo.php */
/* Location: ./application/models/Meetschools/Models/School_Contactinfo.php */