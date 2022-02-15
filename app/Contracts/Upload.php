<?php


namespace App\Contracts;


use Symfony\Component\HttpFoundation\File\UploadedFile;

interface Upload
{
    public function start(UploadedFile $file): string;
}
