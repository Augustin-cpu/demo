<?php

class Image{
    private $files = [];

    public function __construct($files){
        $this->files = $files;
    }

    // S'assurer que le dossier 'uploads' existe et est accessible en écriture
    private function verifyFolder($target_dir){
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        return $target_dir;
    }

    public function validateFile(){
         $target_dir = $this->verifyFolder("uploads/");
        
                // Le tableau $_FILES contient les informations du fichier
                // $file_info = $this->files["image_file"]["tmp_name"];

                // Chemin du fichier temporaire sur le serveur
                $tmp_file = $this->files["tmp_name"];

                // -----------------------------------------------------------
                // 2. Mesures de SÉCURITÉ et de VALIDATION
                // -----------------------------------------------------------

                // A. Vérifier les erreurs de téléchargement
                if ($this->files["error"] !== UPLOAD_ERR_OK) {
                    $message = "Erreur lors du téléchargement. Code : " . $this->files["error"];
                }

                // B. Vérifier la taille du fichier (ex: max 5 Mo)
                if ($this->files["size"] > 5000000) {
                    $message = "Désolé, votre fichier est trop volumineux (max 5 Mo).";
                }

                // C. Vérifier le type de fichier (mime type)
                $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
                $file_type = mime_content_type($tmp_file); // Méthode plus fiable que $file_info["type"]

                if (!in_array($file_type, $allowed_types)) {
                    $message = "Seuls les fichiers JPG, PNG et GIF sont autorisés.";
                }

                // -----------------------------------------------------------
                // 3. Déplacement du Fichier et Enregistrement
                // -----------------------------------------------------------

                if (!isset($message)) {
                    // Générer un nom de fichier unique et sécurisé pour éviter les collisions
                    $file_extension = pathinfo($this->files["name"], PATHINFO_EXTENSION);
                    $new_filename = uniqid('img_', true) . '.' . $file_extension;
                    $target_file = $target_dir . $new_filename;

                    // Déplacer le fichier du répertoire temporaire vers le répertoire permanent
                    if (move_uploaded_file($tmp_file, $target_file)) {
                        $message = "Le fichier " . htmlspecialchars($this->files["name"]) . " a été téléchargé avec succès.";
                    }
                }
                return $new_filename;
    }
}