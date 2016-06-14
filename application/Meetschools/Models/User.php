<?php

namespace Meetschools\Models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Meetschools\Models\User
 *
 * @Table(name="users")
 * @Entity(repositoryClass="Meetschools\Repositories\User_Repository")
 */
class User extends \Meetschools\Models\Base {

    public function __construct() {
        $this->subscriber = new ArrayCollection();
        $this->student = new ArrayCollection();
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
     * @var Doctrine\Common\Collections\ArrayCollection $subscriber
     *
     * @OneToMany(targetEntity="Meetschools\Models\Subscriber", cascade={"persist"}, mappedBy="user")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id")
     * })
     * @OrderBy({"id" = "ASC"})
     */
    private $subscriber;

    /**
     * @var Doctrine\Common\Collections\ArrayCollection $student
     *
     * @OneToMany(targetEntity="Meetschools\Models\Student", cascade={"persist"}, mappedBy="user")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id")
     * })
     * @OrderBy({"id" = "ASC"})
     */
    private $student;

    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=256, nullable=false)
     */
    private $email;

    /**
     * @var string $password
     *
     * @Column(name="password", type="string", length=1024, nullable=false)
     */
    private $password;

    /**
     * @var enum $type
     *
     * @Column(name="type", type="enum", nullable=false)
     */
    private $type = 'user';

    /**
     * @var enum $status
     *
     * @Column(name="status", type="enum", nullable=false)
     */
    private $status = 'unregistered';

    /**
     * @var string $unique_key
     *
     * @Column(name="unique_key", type="string", length=36, nullable=true)
     */
    private $unique_key;

    /**
     * @var datetime $last_seen_at
     *
     * @Column(name="last_seen_at", type="datetime", nullable=true)
     */
    private $last_seen_at;

    /**
     * @var datetime $last_login_at
     *
     * @Column(name="last_login_at", type="datetime", nullable=true)
     */
    private $last_login_at;

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
     * Adds a new subscriber
     *
     * @param Meetschools\Models\Subscriber $subscriber
     */
    public function add_subscriber($subscriber) {
        $this->subscriber->add($subscriber);
    }

    /**
     * Get array collection of subscriber
     *
     * @return Doctrine\Common\Collections\ArrayCollection
     */
    public function subscriber() {
        return $this->subscriber;
    }

    /**
     * Adds a new student
     *
     * @param Meetschools\Models\Student $student
     */
    public function add_student($student) {
        $this->student->add($student);
    }

    /**
     * Get array collection of student
     *
     * @return Doctrine\Common\Collections\ArrayCollection
     */
    public function student() {
        return $this->student;
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
     * Set password
     *
     * @param string $password
     */
    public function set_password($password) {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function password() {
        return $this->password;
    }

    /**
     * Set type
     *
     * @param enum $type
     */
    public function set_type($type) {
        if (!$type) {
            $type = 'user';
        }
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return enum
     */
    public function type() {
        return $this->type;
    }

    /**
     * Set status
     *
     * @param enum $status
     */
    public function set_status($status) {
        if (!$status) {
            $status = 'unregistered';
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
     * Set last_seen_at
     *
     * @param datetime $last_seen_at
     */
    public function set_last_seen_at($last_seen_at) {
        $this->last_seen_at = $last_seen_at;
    }

    /**
     * Get last_seen_at
     *
     * @return datetime
     */
    public function last_seen_at() {
        return $this->last_seen_at;
    }

    /**
     * Set last_login_at
     *
     * @param datetime $last_login_at
     */
    public function set_last_login_at($last_login_at) {
        $this->last_login_at = $last_login_at;
    }

    /**
     * Get last_login_at
     *
     * @return datetime
     */
    public function last_login_at() {
        return $this->last_login_at;
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

/* End of file User.php */
/* Location: ./application/models/Meetschools/Models/User.php */
