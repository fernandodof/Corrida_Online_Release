<?php

/**
 * Description of Corrida
 *
 * @author Fernando
 */

/**
 * @Entity
 * * */
class Run {

    /**
     * @Id
     * @GeneratedValue
     * @Column(type="bigint")
     * * */
    private $id;

    /**
     * @Column(type="date")
     * * */
    private $date;

    /**
     * @Column(type="string")
     * * */
    private $fullDate;

    /**
     * @Column(type="float")
     * * */
    private $distance;

    /**
     * @Column(type="bigint")
     * * */
    private $duration;

    /**
     * @Column(type="string")
     * * */
    private $fullTime;

    /**
     * @Column(type="text", nullable=true)
     * * */
    private $notes;

    /**
     * @Column(type="float")
     * * */
    private $avgSpeed;

    /**
     * @Column(type="float")
     * * */
    private $pace;

    /**
     * @ManyToOne(targetEntity="Runner", inversedBy="runs")
     * @JoinColumn(name="runner_id", referencedColumnName="id")
     * */
    private $runner;
    
    public function getId() {
        return $this->id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getFullDate() {
        return $this->fullDate;
    }

    public function getDistance() {
        return $this->distance;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getFullTime() {
        return $this->fullTime;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function getAvgSpeed() {
        return $this->avgSpeed;
    }

    public function getPace() {
        return $this->pace;
    }

    public function getRunner() {
        return $this->runner;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setFullDate($fullDate) {
        $this->fullDate = $fullDate;
    }

    public function setDistance($distance) {
        $this->distance = $distance;
    }

    public function setDuration($duration) {
        $this->duration = $duration;
    }

    public function setFullTime($fullTime) {
        $this->fullTime = $fullTime;
    }

    public function setNotes($notes) {
        $this->notes = $notes;
    }

    public function setAvgSpeed($avgSpeed) {
        $this->avgSpeed = $avgSpeed;
    }

    public function setPace($pace) {
        $this->pace = $pace;
    }

    public function setRunner($runner) {
        $this->runner = $runner;
    }



}
