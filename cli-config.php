<?php
require_once 'bootstrap.php';

use Symfony\Component\Console\Helper\HelperSet as HelperSet;
use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper as ConnectionHelper;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper as EntityManagerHelper;

$helperSet = new HelperSet(array(
    'db' => new ConnectionHelper($entityManager->getConnection()),
    'em' => new EntityManagerHelper($entityManager)
));
return $helperSet;