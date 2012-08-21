<?php

namespace ImageUploader\Model;

class Image
{
    protected $fileName;
    protected $size;
    protected $type;
    protected $tempName;
    protected $width;
    protected $height;

    public function __construct($file)
    {
        $this->setFileName($file['name']);
        $this->setType($file['type']);
        $this->setSize($file['size']);
        $this->setTempName($file['tmp_name']);

        $dimensions = getImageSize($this->getTempName());
        $this->setWidth($dimensions[0]);
        $this->setHeight($dimensions[1]);
    }


    function getFileName()
    {
        return $this->fileName;
    }

    function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    function getSize()
    {
        return $this->size;
    }

    function setSize($size)
    {
        $this->size = $size;
    }

    function getType()
    {
        return $this->type;
    }

    function setType($type)
    {
        $this->type = $type;
    }

    function getTempName()
    {
        return $this->tempName;
    }

    function setTempName($tempName)
    {
        $this->tempName = $tempName;
    }

    function getWidth()
    {
        return $this->width;
    }

    function setWidth($width)
    {
        $this->width = $width;
    }

    function getHeight()
    {
        return $this->height;
    }

    function setHeight($height)
    {
        $this->height = $height;
    }
}
