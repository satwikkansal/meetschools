<?php

namespace Meetschools\Models;

/**
 * Meetschools\Models\Admin
 *
 * @Table(name="admins")
 * @Entity(repositoryClass="Meetschools\Repositories\Admin_Repository")
 */
class Admin extends \Meetschools\Models\Base {

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
     * @var string $country_code
     *
     * @Column(name="country_code", type="string", length=5, nullable=true)
     */
    private $country_code;

    /**
     * @var string $phone_primary
     *
     * @Column(name="phone_primary", type="string", length=12, nullable=true)
     */
    private $phone_primary;

    /**
     * @var string $unique_key
     *
     * @Column(name="unique_key", type="string", length=36, nullable=true)
     */
    private $unique_key;

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

    public function full_name() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function phone() {
        return $this->country_code . ' ' . $this->phone_primary;
    }

}

/* End of file Admin.php */
/* Location: ./application/models/Meetschools/Models/Admin.php */