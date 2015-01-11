<?php

/**
 * Description of RecoverPassword
 *
 * @author Fernando
 */

/**
 * @Entity
 * * */
class RecoverPassword {

    /**
     * @Id
     * @GeneratedValue
     * @Column(type="bigint")
     * * */
    private $id;

    /**
     * @ManyToOne(targetEntity="Runner", fetch="EXTRA_LAZY")
     * * */
    private $runner;

    /**
     * @Column(type="string", unique=true)
     * * */
    private $code;

    /**
     * @Column(type="boolean")
     * * */
    private $used = false;

    /**
     * @Column(type="datetime")
     * * */
    private $expiration;

    public function getId() {
        return $this->id;
    }

    public function getRunner() {
        return $this->runner;
    }

    public function getCode() {
        return $this->code;
    }

    public function getUsed() {
        return $this->used;
    }

    public function getExpiration() {
        return $this->expiration;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setRunner($runner) {
        $this->runner = $runner;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setUsed($used) {
        $this->used = $used;
    }

    public function setExpiration($expiration) {
        $this->expiration = $expiration;
    }


}
