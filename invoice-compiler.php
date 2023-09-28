<?php

if(!defined('INV_SRC')) {
    define('INV_SRC', __DIR__ . "/src");
    define('INV_VIEW', __DIR__ . "/view");
    define('INV_ASSETS', __DIR__ . "/assets");
};

require_once INV_SRC . "/InvoiceHeader.php";
require_once INV_SRC . "/InvoiceClient.php";
require_once INV_SRC . "/InvoiceTable.php";
require_once INV_SRC . "/InvoiceNote.php";
require_once INV_SRC . "/UcsInvoice.php";
