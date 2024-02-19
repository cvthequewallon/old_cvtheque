<?php
class controlleurInfoStage
{
    public function afficher()
    {
        require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
        require_once __DIR__ . '/../view/templates/InfoStage.html.php';
        require_once __DIR__ . '/../view/templates/FinHtml.html.php';
    }
}
