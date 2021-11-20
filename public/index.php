<?php

    require_once "../app/bootstrap.php";

    $libraries = LibFactory::getInstance();

    // Init Core Library $ Set Attributes
    $init = $libraries->getLibrary("Core");
    $init->setAttributes();