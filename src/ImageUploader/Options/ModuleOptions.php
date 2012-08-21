<?php

namespace ImageUploader\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    protected $defaultFileExtension = 'jpg';
    protected $convertToDefault = 'true';

    protected $maxWidth = 1024;
    protected $maxHeight = 1024;
    protected $useMax = true;

    protected $minWidth = 128;
    protected $minHeight = 128;
    protected $useMin = true;

    protected $resizeOversized = false;

    protected $destination = '/tmp';
    protected $overwrite = false;

 /**
  * Get defaultFileExtension.
  *
  * @return defaultFileExtension.
  */
 function getDefaultFileExtension()
 {
     return $this->defaultFileExtension;
 }

 /**
  * Set defaultFileExtension.
  *
  * @param defaultFileExtension the value to set.
  */
 function setDefaultFileExtension($defaultFileExtension)
 {
     $this->defaultFileExtension = $defaultFileExtension;
 }

 /**
  * Get convertToDefault.
  *
  * @return convertToDefault.
  */
 function getConvertToDefault()
 {
     return $this->convertToDefault;
 }

 /**
  * Set convertToDefault.
  *
  * @param convertToDefault the value to set.
  */
 function setConvertToDefault($convertToDefault)
 {
     $this->convertToDefault = $convertToDefault;
 }

 /**
  * Get maxWidth.
  *
  * @return maxWidth.
  */
 function getMaxWidth()
 {
     return $this->maxWidth;
 }

 /**
  * Set maxWidth.
  *
  * @param maxWidth the value to set.
  */
 function setMaxWidth($maxWidth)
 {
     $this->maxWidth = $maxWidth;
 }

 /**
  * Get maxHeight.
  *
  * @return maxHeight.
  */
 function getMaxHeight()
 {
     return $this->maxHeight;
 }

 /**
  * Set maxHeight.
  *
  * @param maxHeight the value to set.
  */
 function setMaxHeight($maxHeight)
 {
     $this->maxHeight = $maxHeight;
 }

 /**
  * Get useMax.
  *
  * @return useMax.
  */
 function getUseMax()
 {
     return $this->useMax;
 }

 /**
  * Set useMax.
  *
  * @param useMax the value to set.
  */
 function setUseMax($useMax)
 {
     $this->useMax = $useMax;
 }

 /**
  * Get minWidth.
  *
  * @return minWidth.
  */
 function getMinWidth()
 {
     return $this->minWidth;
 }

 /**
  * Set minWidth.
  *
  * @param minWidth the value to set.
  */
 function setMinWidth($minWidth)
 {
     $this->minWidth = $minWidth;
 }

 /**
  * Get minHeight.
  *
  * @return minHeight.
  */
 function getMinHeight()
 {
     return $this->minHeight;
 }

 /**
  * Set minHeight.
  *
  * @param minHeight the value to set.
  */
 function setMinHeight($minHeight)
 {
     $this->minHeight = $minHeight;
 }

 /**
  * Get useMin.
  *
  * @return useMin.
  */
 function getUseMin()
 {
     return $this->useMin;
 }

 /**
  * Set useMin.
  *
  * @param useMin the value to set.
  */
 function setUseMin($useMin)
 {
     $this->useMin = $useMin;
 }


 /**
  * Get resizeOversized.
  *
  * @return resizeOversized.
  */
 function getResizeOversized()
 {
     return $this->resizeOversized;
 }

 /**
  * Set resizeOversized.
  *
  * @param resizeOversized the value to set.
  */
 function setResizeOversized($resizeOversized)
 {
     $this->resizeOversized = $resizeOversized;
 }

 /**
  * Get destination.
  *
  * @return destination.
  */
 function getDestination()
 {
     return $this->destination;
 }

 /**
  * Set destination.
  *
  * @param destination the value to set.
  */
 function setDestination($destination)
 {
     $this->destination = $destination;
 }


 /**
  * Get overwrite.
  *
  * @return overwrite.
  */
 function getOverwrite()
 {
     return $this->overwrite;
 }

 /**
  * Set overwrite.
  *
  * @param overwrite the value to set.
  */
 function setOverwrite($overwrite)
 {
     $this->overwrite = $overwrite;
 }
}
