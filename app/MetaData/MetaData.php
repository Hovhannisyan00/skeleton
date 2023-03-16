<?php

namespace App\MetaData;

class MetaData
{
    private string $title = '';
    private string $description = '';
    private string $og_image = 'img/logo.jpg';
    private string $og_url = '/';
    private string $og_type = 'website';
    private string $keywords = '';

    /**
     * Function to get Title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Function to set Title
     */
    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Function to get Description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Function to set Description
     */
    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Function to get Og image
     */
    public function getOgImage(): string
    {
        return url($this->og_image);
    }

    /**
     * Function to set Og image
     */
    public function setOgImage(string $ogImage): static
    {
        $this->og_image = $ogImage;

        return $this;
    }

    /**
     * Function to get Og Url
     */
    public function getOgUrl(): string
    {
        return urlWithLng($this->og_url);
    }

    /**
     * Function to set Og Url
     */
    public function setOgUrl(string $ogUrl): static
    {
        $this->og_url = $ogUrl;

        return $this;
    }

    /**
     * Function to get Og Type
     */
    public function getOgType(): string
    {
        return $this->og_type;
    }

    /**
     * Function to set Og Type
     */
    public function setOgType(string $ogType): static
    {
        $this->og_type = $ogType;

        return $this;
    }

    /**
     * Function to get default data
     */
    public function getDefaultData(): static
    {
        $this->setTitle(config('app.name') ?? trans('meta.home.title'));
        $this->setDescription(trans('meta.home.description'));

        return $this;
    }

    /**
     * Function to get keywords
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }

    /**
     * Function to set keywords
     */
    public function setKeywords(string $keywords): static
    {
        $this->keywords = $keywords;

        return $this;
    }
}
