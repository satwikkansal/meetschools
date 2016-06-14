<?php

use Doctrine\DBAL\Types\Type;
use Meetschools\Doctrine_Extension\Logger;
use Meetschools\Doctrine_Extension\Timestamp_Updater;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Events;

class Doctrine_Extension {

    public function init(EntityManager $em, $init_logging = TRUE) {
        $this->load_custom_db_types($em);
        if($init_logging) {
            $this->setup_logger($em);
        }
    }
    
    private function load_custom_db_types(EntityManager $em) {
        $connection = $em->getConnection();

        require_once('doctrine_extension/types/enum.php');
        require_once('doctrine_extension/types/blob.php');
        require_once('doctrine_extension/types/longblob.php');

        Type::addType('enum', 'Meetschools\Doctrine_Extension\Types\EnumType');
        $connection->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'enum');

        Type::addType('blob', 'Meetschools\Doctrine_Extension\Types\BlobType');
        $connection->getDatabasePlatform()->registerDoctrineTypeMapping('blob', 'blob');
        
        Type::addType('longblob', 'Meetschools\Doctrine_Extension\Types\LongblobType');
        $connection->getDatabasePlatform()->registerDoctrineTypeMapping('longblob', 'longblob');
    }

    private function setup_logger($em) {
        require_once('doctrine_extension/logger.php');
        $em->getConfiguration()->setSQLLogger(new Logger());
    }
}


/* End of file Doctrine_extension.php */
/* Location: ./application/libraries/Doctrine_extension.php */