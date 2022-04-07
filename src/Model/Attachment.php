<?php

/*
 * This file is part of the nizerin/alipay-global.
 *
 * (c) nizerin <i@nizer.in>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace NiZerin\Model;

class Attachment
{
    public $attachmentType;
    public $file;
    public $attachmentName;

    /**
     * @return mixed
     */
    public function getAttachmentType()
    {
        return $this->attachmentType;
    }

    /**
     * @param mixed $attachmentType
     */
    public function setAttachmentType($attachmentType)
    {
        $this->attachmentType = $attachmentType;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getAttachmentName()
    {
        return $this->attachmentName;
    }

    /**
     * @param mixed $attachmentName
     */
    public function setAttachmentName($attachmentName)
    {
        $this->attachmentName = $attachmentName;
    }
}
