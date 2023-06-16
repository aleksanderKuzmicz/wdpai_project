<?php


class Review{

    private $title;
    private $description;
    private $image;
    private $likesNumber;
    private $dislikesNumber;

    /**
     * @return int
     */
    public function getDislikesNumber(): int
    {
        return $this->dislikesNumber;
    }

    /**
     * @param int $dislikesNumber
     */
    public function setDislikesNumber(int $dislikesNumber)
    {
        $this->dislikesNumber = $dislikesNumber;
    }
    private $creationDate;

    public function __construct(string $title, string $description, string $image, int $likesNumber = 0, int $dislikesNumber = 0)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->likesNumber = $likesNumber;
        $this->dislikesNumber = $dislikesNumber;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public function getLikesNumber()
    {
        return $this->likesNumber;
    }

    public function setLikesNumber($likesNumber)
    {
        $this->likesNumber = $likesNumber;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

}