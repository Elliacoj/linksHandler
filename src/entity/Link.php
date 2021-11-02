<?php


namespace Amaur\App\entity;

class Link {
    private ?int $id;
    private ?string $href;
    private ?string $title;
    private ?string $target;
    private ?string $name;
    private ?User $userFk;
    private ?string $img;

    /**
     * Link constructor.
     * @param int|null $id
     * @param string|null $href
     * @param string|null $title
     * @param string|null $target
     * @param string|null $name
     * @param string|null $img
     */
    public function __construct(int $id = null, string $href = null, string $title = null, string $target = null, string $name = null, User $userFk = null, string $img = null)
    {
        $this->id = $id;
        $this->href = $href;
        $this->title = $title;
        $this->target = $target;
        $this->name = $name;
        $this->userFk = $userFk;
        $this->img = $img;
    }

    /**
     * Return the id of Link
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Return the href of Link
     * @return string|null
     */
    public function getHref(): ?string
    {
        return $this->href;
    }

    /**
     * Set the href of Link
     * @param string|null $href
     * @return Link
     */
    public function setHref(?string $href): Link
    {
        $this->href = $href;
        return $this;
    }

    /**
     * Return the title of Link
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the title of Link
     * @param string|null $title
     * @return Link
     */
    public function setTitle(?string $title): Link
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Return the target of Link
     * @return string|null
     */
    public function getTarget(): ?string
    {
        return $this->target;
    }

    /**
     * Set the target of Link
     * @param string|null $target
     * @return Link
     */
    public function setTarget(?string $target): Link
    {
        $this->target = $target;
        return $this;
    }

    /**
     * Return the name of Link
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the name of Link
     * @param string|null $name
     * @return Link
     */
    public function setName(?string $name): Link
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Return the user fk of Link
     * @return User|null
     */
    public function getUserFk(): ?User
    {
        return $this->userFk;
    }

    /**
     * Set the user fk of Link
     * @param User|null $userFk
     * @return Link
     */
    public function setUserFk(?User $userFk): Link
    {
        $this->userFk = $userFk;
        return $this;
    }

    /**
     * Return the img of Link
     * @return string|null
     */
    public function getImg(): ?string
    {
        return $this->img;
    }

    /**
     * Set the img of Link
     * @param string|null $img
     */
    public function setImg(?string $img): Link
    {
        $this->img = $img;
        return $this;
    }
}