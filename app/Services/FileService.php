<?php

namespace App\Services;

class FileService
{
    /**
     * Upload a file from the request.
     *
     * This method handles the file upload process. It checks if a valid file is provided,
     * stores the file in the specified directory with a timestamped filename, and returns
     * an array containing the file's details or false if the upload fails.
     *
     * @param string|null $fieldName The name of the file input field in the request. Defaults to null.
     * @return bool|array Returns false if the upload fails, or an associative array with file details if successful:
     *                    - 'file_name': The original file name with a timestamp prefix.
     *                    - 'file_path': The storage path of the file.
     *                    - 'file_size': The size of the uploaded file in bytes.
     *                    - 'file_mime_type': The MIME type of the uploaded file.
     *                    - 'file_extension': The original file extension.
     */
    public function upload(string $fieldName = null): bool|array
    {
        if ($fieldName === null || !request()->hasFile($fieldName) || !request()->file($fieldName)->isValid()) {
            return false;
        }

        $file = request()->file($fieldName);
        $fileName = time() . '_' . $file->getClientOriginalName();

        $yearMonth = date('Y/m');
        $path = $file->storeAs($yearMonth, $fileName, 'uploads');

        return [
            'file_name' => $fileName,
            'file_path' => 'uploads/' . $path,
            'file_size' => $file->getSize(),
            'file_mime_type' => $file->getMimeType(),
            'file_extension' => $file->getClientOriginalExtension(),
        ];
    }

    /**
     * Delete a file from the storage.
     *
     * This method deletes a file from the specified file path if it exists.
     * It returns true if the file is successfully deleted or false if the file does not exist.
     *
     * @param string $filePath The path to the file that needs to be deleted.
     * @return bool Returns true if the file is deleted successfully, false otherwise.
     */
    public function delete(string $filePath): bool
    {
        if (file_exists($filePath)) {
            unlink($filePath);

            return true;
        }

        return false;
    }
}
