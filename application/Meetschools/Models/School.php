<?php

namespace Meetschools\Models;

/**
 * School
 *
 * @Table(name="schools")
 * @Entity(repositoryClass="Meetschools\Repositories\School_Repository")
 */
class School extends \Meetschools\Models\Base {

    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var integer $code
     *
     * @Column(name="code", type="integer", nullable=false)
     */
    private $code;

    /**
     * @var string $url
     *
     * @Column(name="url", type="string", length=250, nullable=false)
     */
    private $url;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=250, nullable=false)
     */
    private $name;

    /**
     * @var string $views
     *
     * @Column(name="views", type="integer", nullable=false)
     */
    private $views = 0;

    /**
     * @var Meetschools\Models\Zone $zone
     *
     * @ManyToOne(targetEntity="Meetschools\Models\Zone", cascade={"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="zone_id", referencedColumnName="id")
     * })
     */
    private $zone;

    /**
     * @var Meetschools\Models\City $city
     *
     * @ManyToOne(targetEntity="Meetschools\Models\City", cascade={"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="city_id", referencedColumnName="id")
     * })
     */
    private $city;

    /**
     * @var Meetschools\Models\District $district
     *
     * @ManyToOne(targetEntity="Meetschools\Models\District", cascade={"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="district_id", referencedColumnName="id")
     * })
     */
    private $district;

    /**
     * @var Meetschools\Models\State $state
     *
     * @ManyToOne(targetEntity="Meetschools\Models\State", cascade={"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="state_id", referencedColumnName="id")
     * })
     */
    private $state;

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
     * Set code
     *
     * @param integer $code
     */
    public function set_code($code)
    {
        $this->code = $code;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function code()
    {
        return $this->code;
    }

     /**
     * Set url
     *
     * @param string $url
     */
    public function set_url($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function url()
    {
        return $this->url;
    }

     /**
     * Set name
     *
     * @param string $name
     */
    public function set_name($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function name()
    {
        return $this->name;
    }

     /**
     * Set views
     *
     * @param integer $views
     */
    public function set_views($views)
    {
        $this->views = $views;
    }

    /**
     * Get views
     *
     * @return integer 
     */
    public function views()
    {
        return $this->views;
    }

    /**
     * Set zone
     *
     * @param Meetschools\Models\Zone $zone
     */
    public function set_zone(\Meetschools\Models\Zone $zone) {
        $this->zone = $zone;
    }

    /**
     * Get zone
     *
     * @return Meetschools\Models\Zone
     */
    public function zone() {
        return $this->zone;
    }

    /**
     * Set city
     *
     * @param Meetschools\Models\City $city
     */
    public function set_city(\Meetschools\Models\User $city) {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return Meetschools\Models\City
     */
    public function city() {
        return $this->city;
    }

    /**
     * Set district
     *
     * @param Meetschools\Models\District $district
     */
    public function set_district(\Meetschools\Models\User $district) {
        $this->district = $district;
    }

    /**
     * Get district
     *
     * @return Meetschools\Models\District
     */
    public function district() {
        return $this->district;
    }

    /**
     * Set state
     *
     * @param Meetschools\Models\State $state
     */
    public function set_state(\Meetschools\Models\State $state) {
        $this->state = $state;
    }

    /**
     * Get state
     *
     * @return Meetschools\Models\State
     */
    public function state() {
        return $this->state;
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
