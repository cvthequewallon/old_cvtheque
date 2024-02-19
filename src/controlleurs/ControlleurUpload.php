<?php
class controlleurUpload
{
    public function afficher()
    {
        if (isset($_FILES['photo'])) {
            move_uploaded_file($_FILES['photo']['tmp_name'], __DIR__ . '/../public/photos/test.jpg');
        }
    }
}
