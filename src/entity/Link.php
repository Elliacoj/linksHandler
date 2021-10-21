<?php


namespace Amaur\App\Entity;


class Link {
    private ?int $id;
    private ?string $href;
    private ?string $title;
    private ?string $target;
    private ?string $name;

    /**
     * Link constructor.
     * @param int|null $id
     * @param string|null $href
     * @param string|null $title
     * @param string|null $target
     * @param string|null $name
     */
    public function __construct(int $id = null, string $href = null, string $title = null, string $target = null, string $name = null)
    {
        $this->id = $id;
        $this->href = $href;
        $this->title = $title;
        $this->target = $target;
        $this->name = $name;
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
}