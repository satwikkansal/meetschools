<?php

namespace Meetschools\Models;

/**
 * Meetschools\Models\Subscriber
 *
 * @Table(name="subscribers")
 * @Entity(repositoryClass="Meetschools\Repositories\Subscriber_Repository")
 */
class Subscriber extends \Meetschools\Models\Base {

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
     * @ManyToOne(targetEntity="Meetschools\Models\User")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=256, nullable=false)
     */
    private $name;

    /**
     * @var enum $status
     *
     * @Column(name="status", type="enum", nullable=false)
     */
    private $status = 'unconfirmed';

    /**
     * @var string $unique_key
     *
     * @Column(name="unique_key", type="string", length=36, nullable=true)
     */
    private $unique_key;

    /**
     * @var string $utm_source
     *
     * @Column(name="utm_source", type="string", nullable=true)
     */
    private $utm_source;

    /**
     * @var string $utm_medium
     *
     * @Column(name="utm_medium", type="string", length=512, nullable=true)
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
     * Set user
     *
     * @param Meetschools\Models\User $user
     */
    public function set_user(\Internshala\Models\User $user) {
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
     * Set name
     *
     * @param string $name
     */
    public function set_name($name) {
        $this->name = ucwords($name);
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
     * Set status
     *
     * @param enum $status
     */
    public function set_status($status) {
        if (!$status) {
            $status = 'unconfirmed';
        }
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return enum
     */
    public function status() {
        return $this->status;
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
        $utm_medium = mb_strimwidth($utm_medium, 0, 512);
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

/* End of file Subscriber.php */
/* Location: ./application/models/Meetschools/Models/Subscriber.php */
