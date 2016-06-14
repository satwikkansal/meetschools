<?php

namespace Meetschools\Models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Meetschools\Models\Student
 *
 * @Table(name="students")
 * @Entity(repositoryClass="Meetschools\Repositories\Student_Repository")
 */
class Student extends \Meetschools\Models\Base {

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
     * @var Meetschools\Models\User $user
     *
     * @ManyToOne(targetEntity="Meetschools\Models\User", cascade={"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var string $first_name
     *
     * @Column(name="first_name", type="string", length=256, nullable=false)
     */
    private $first_name;

    /**
     * @var string $last_name
     *
     * @Column(name="last_name", type="string", length=256, nullable=false)
     */
    private $last_name;

    /**
     * @var enum $salutation
     *
     * @Column(name="salutation", type="enum", nullable=true)
     */
    private $salutation = NULL;

    /**
     * @var string $unique_key
     *
     * @Column(name="unique_key", type="string", length=36, nullable=true)
     */
    private $unique_key;

    /**
     * @var string $phone_primary
     *
     * @Column(name="phone_primary", type="string", length=10, nullable=true)
     */
    private $phone_primary;

    /**
     * @var string $country_code
     *
     * @Column(name="country_code", type="string", length=4, nullable=false)
     */
    private $country_code;

    /**
     * @var string $utm_source
     *
     * @Column(name="utm_source", type="string", nullable=true)
     */
    private $utm_source;

    /**
     * @var string $utm_medium
     *
     * @Column(name="utm_medium", type="string", nullable=true)
     */
    private $utm_medium;

    /**
     * @var string $utm_campaign
     *
     * @Column(name="utm_campaign", type="string", nullable=true)
     */
    private $utm_campaign;

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
     * Set user
     *
     * @param Meetschools\Models\User $user
     */
    public function set_user(\Meetschools\Models\User $user) {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Meetschools\Models\User
     */
    public function user() {
        return $this->user;
    }

    /**
     * Set first_name
     *
     * @param string $first_name
     */
    public function set_first_name($first_name) {
        $this->first_name = ucwords($first_name);
    }

    /**
     * Get first_name
     *
     * @return string
     */
    public function first_name() {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $last_name
     */
    public function set_last_name($last_name) {
        $this->last_name = ucwords($last_name);
    }

    /**
     * Get last_name
     *
     * @return string
     */
    public function last_name() {
        return $this->last_name;
    }

    /**
     * Set salutation
     *
     * @param enum $salutation
     */
    public function set_salutation($salutation) {
        $this->salutation = $salutation;
    }

    /**
     * Get salutation
     *
     * @return enum
     */
    public function salutation() {
        return $this->salutation;
    }

    /**
     * Set unique_key
     *
     * @param string $unique_key
     */
    public function set_unique_key($unique_key) {
        $this->unique_key = $unique_key;
    }

    /**
     * Get unique_key
     *
     * @return string
     */
    public function unique_key() {
        return $this->unique_key;
    }

    /**
     * Set phone_primary
     *
     * @param string $phone_primary
     */
    public function set_phone_primary($phone_primary) {
        $this->phone_primary = $phone_primary;
    }

    /**
     * Get phone_primary
     *
     * @return string
     */
    public function phone_primary() {
        return $this->phone_primary;
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
     * Set utm_source
     *
     * @param string $utm_source
     */
    public function set_utm_source($utm_source) {
        $utm_source = mb_strimwidth($utm_source, 0, 256);
        $this->utm_source = $utm_source;
    }

    /**
     * Get utm_source
     *
     * @return string
     */
    public function utm_source() {
        return $this->utm_source;
    }

    /**
     * Set utm_medium
     *
     * @param string $utm_medium
     */
    public function set_utm_medium($utm_medium) {
        $utm_medium = mb_strimwidth($utm_medium, 0, 256);
        $this->utm_medium = $utm_medium;
    }

    /**
     * Get utm_medium
     *
     * @return string
     */
    public function utm_medium() {
        return $this->utm_medium;
    }

    /**
     * Set utm_campaign
     *
     * @param string $utm_campaign
     */
    public function set_utm_campaign($utm_campaign) {
        $utm_campaign = mb_strimwidth($utm_campaign, 0, 256);
        $this->utm_campaign = $utm_campaign;
    }

    /**
     * Get utm_campaign
     *
     * @return string
     */
    public function utm_campaign() {
        return $this->utm_campaign;
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

/* End of file Student.php */
/* Location: ./application/models/Meetschools/Models/Student.php */