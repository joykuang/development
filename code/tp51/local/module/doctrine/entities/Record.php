<?php

namespace YRS\Entity;

//use YRS\Entity;

/**
 * @Entity
 * @Table(name="records")
 */
class Record //extends Entity
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /** @Column(type="string") */
    protected $content;

    /** @Column(type="string") */
    protected $userAgent;

    /** @Column(type="string") */
    protected $created;

    public function getId()
    {
        return $this->id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function setUserAgent($ua)
    {
        $this->userAgent = $ua;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($time)
    {
        $this->created = $time;
    }
}
