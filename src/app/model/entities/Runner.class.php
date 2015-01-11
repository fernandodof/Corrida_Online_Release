<?php

/**
 * Description of Corredor
 *
 * @author Fernando
 */

/**
 * @Entity
 * * */
class Runner {

    /**
     * @Id
     * @Column(type="bigint")
     * @GeneratedValue
     * * */
    private $id;

    /**
     * @Column(type="string")
     * * */
    private $email;

    /**
     * @Column(type="string")
     * * */
    private $login;
    
    /**
     * @Column(type="string")
     * * */
    private $password;

    /**
     * @Column(type="string")
     * * */
    private $name;

    /**
     * @Column(type="bigint")
     * * */
    private $activities = 0;

    /**
     * @Column(type="float")
     * * */
    private $totalDistance = 0;

    /**
     * @Column(type="time", nullable=true)
     * * */
    private $totalTime = null;

    /**
     * @OneToMany(targetEntity="Run", mappedBy="Runner", fetch="EXTRA_LAZY")
     * */
    private $runs;

    public function __construct() {
        $this->runs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getLogin() {
        return $this->login;
    }
    
    public function getPassword(){
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function getActivities() {
        return $this->activities;
    }

    public function getTotalDistance() {
        return $this->totalDistance;
    }

    public function getTotalTime() {
        return $this->totalTime;
    }

    public function getRuns() {
        return $this->runs;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setLogin($login) {
        $this->login = $login;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setActivities($activities) {
        $this->activities = $activities;
    }

    public function setTotalDistance($totalDistance) {
        $this->totalDistance = $totalDistance;
    }

    public function setTotalTime($totalTime) {
        $this->totalTime = $totalTime;
    }

    public function setRuns($runs) {
        $this->runs = $runs;
    }

    public function addRun(Run $run) {
        $this->runs->add($run);
    }

}
