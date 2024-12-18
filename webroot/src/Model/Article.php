<?php
namespace src\Model;

class Article {

    private int $id;
    private string $title;
    private string $content;

    private string $image;

    private string $timestamp;

    /**
     * Constructor
     *
     * @param int $id
     * @param string $title
     * @param string $content
     * @param string $timestamp
     * @param string|null $image
     */
    public function __construct(int $id, string $title, string $content, string $timestamp, string $image = null) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->timestamp = $timestamp;
        $this->image = $image;
    }

    /**
     * Returns ID of the Article object.
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Returns title of the Article object.
     *
     * @return string
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns title of the Article object.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Returns title of the Article object.
     *
     * @return string
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Returns content of the Article object.
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Returns content of the Article object.
     *
     * @return string
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * Returns image of the Article object.
     *
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Returns image of the Article object.
     *
     * @return string
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * Returns timestamp of the Article object.
     *
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    /**
     * Returns timestamp of the Article object.
     *
     * @return string
     */
    public function setTimestamp(string $timestamp): void
    {
        $this->timestamp = $timestamp;
    }
    
}