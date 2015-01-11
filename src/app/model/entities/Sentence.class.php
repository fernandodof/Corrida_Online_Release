<?php

/**
 * Description of Sentence
 *
 * @author Fernando
 */

/**
 * @Entity
 * **/
class Sentence {
    
    /**
     * @Id
     * @Column(type="bigint")
     * @GeneratedValue
     * **/
    private $id;
    
    /**
     * @Column(type="text", unique=false, nullable=false)
     * **/
    private $sentence;
   
    /**
     * @Column(type="string", unique=false, nullable=false)
     * **/
    private $author;
    
    public function getId() {
        return $this->id;
    }

    public function getSentence() {
        return $this->sentence;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setSentence($sentence) {
        $this->sentence = $sentence;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }


}
