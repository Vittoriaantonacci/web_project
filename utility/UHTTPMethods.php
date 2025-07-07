<?php

/**
 * UHTTPMethods - Utility class for managing superglobal array  $_FILE, $_GET, $_POST, etc.
 */
class UHTTPMethods {
    /**
     * To access to $_POST superglobal array.
     */
    public static function post($param) {
        return $_POST[$param];
    }

    /**
     * To access to $_GET superglobal array.
     */
    public static function get($param) {
        return $_GET[$param];
    }

    /**
     * To access to $_FILES superglobal array.
     */
    public static function files(...$params) {
        if (count($params) === 0) return $_FILES;
        elseif (count($params) === 1) return $_FILES[$params[0]];
        else {
            $result = [];
            foreach ($params as $param) {
                $result[$param] = $_FILES[$param];
            }
            return $result;
        }
    }

    public static function saveUploadedFile(string $inputName, string $dest): ?array {
        // Check if the file was uploaded without errors
        if (!isset($_FILES[$inputName]) || $_FILES[$inputName]['error'] !== UPLOAD_ERR_OK) {
            return ['error' => $_FILES[$inputName]['error'] ?? 'No file uploaded or upload error.'];
        }

        // Retrieve file information
        $tmpPath = $_FILES[$inputName]['tmp_name'];
        $originalName = $_FILES[$inputName]['name'];
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $size = $_FILES[$inputName]['size'];

        // Create a safe file name
        $safeName = uniqid('img_', true) . '.' . strtolower($extension);
        // Define the destination directory and path
        $destinationDir = __DIR__ . '/../public/uploads/' . $dest;
        $destinationPath = $destinationDir . '/' . $safeName;

        // Ensure the destination directory exists
        if (!is_dir($destinationDir)) {
            mkdir($destinationDir, 0777, true);
        }

        // Move the uploaded file to the destination directory
        // and return the file information if successful
        
        if (move_uploaded_file($tmpPath, $destinationPath)) {
            return [
                'path' => $safeName,
                'name' => $originalName,
                'ext' => strtolower($extension),
                'size' => $size
            ];
        }

        return ['error' => is_uploaded_file($tmpPath) ? 'File is in tmp, move issue' : 'Invalid file upload.'];
  
    }
}