<?php

declare(strict_types=1);

namespace App\Services;


use App\Contracts\Upload;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadService implements Upload
{

    /**
     * @param UploadedFile $file
     * @return string
     * @throws \Exception
     */
    public function start(UploadedFile $file): string
    {
        $fileName = $file->hashName();
        $completedFile = $file->storeAs('news', $fileName, 'public');
        if (!$completedFile) {
            throw new \Exception("file wasn't uploaded");
        }

        return $completedFile;
    }
}
