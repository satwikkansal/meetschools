<?php

use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Configuration,
    Doctrine\ORM\EntityManager,
    Doctrine\Common\Cache\ArrayCache,
    Doctrine\DBAL\Logging\EchoSQLLogger,
    Doctrine\Common\Annotations\AnnotationRegistry,
    Doctrine\Common\Annotations\AnnotationReader,
    Doctrine\ORM\Mapping\Driver\AnnotationDriver,
    Doctrine\Common\Annotations\IndexedReader,
    Meetschools\Helpers\Utils;

class Doctrine {

    public $em = NULL;

    public function __construct() {
        // load database configuration from CodeIgniter
        require_once APPPATH . 'config/database.php';

        // Set up class loading. You could use different autoloaders, provided by your favorite framework,
        // if you want to.

        require_once APPPATH . 'libraries/Doctrine/Common/ClassLoader.php';

        $doctrineClassLoader = new ClassLoader('Doctrine', APPPATH . 'libraries');
        $doctrineClassLoader->register();

        $basePath = rtrim(APPPATH, '/');

        $modelsClassLoader = new ClassLoader('Meetschools\\Models', $basePath);
        $modelsClassLoader->register();

        $proxiesClassLoader = new ClassLoader('Meetschools\\Proxies', $basePath);
        $proxiesClassLoader->register();

        $repositoriesClassLoader = new ClassLoader('Meetschools\\Repositories', $basePath);
        $repositoriesClassLoader->register();

        $helpersClassLoader = new ClassLoader('Meetschools\\Helpers', $basePath);
        $helpersClassLoader->register();

        $securityClassLoader = new ClassLoader('Meetschools\\Security', $basePath);
        $securityClassLoader->register();

        $exceptionsClassLoader = new ClassLoader('Meetschools\\Exceptions', $basePath);
        $exceptionsClassLoader->register();

        // Set up caches
        $config = new Configuration;
        $cache = new ArrayCache;
        $config->setMetadataCacheImpl($cache);

        //Set up annotations.
        // Register the ORM Annotations in the AnnotationRegistry
        AnnotationRegistry::registerFile(APPPATH . '/libraries/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');

        $reader = new AnnotationReader();
        $reader->setDefaultAnnotationNamespace('Doctrine\ORM\Mapping\\');
        $reader->setIgnoreNotImportedAnnotations(true);
        $reader->setEnableParsePhpImports(false);
        $reader = Utils::cached_annotations_reader(new IndexedReader($reader));


        $driverImpl = new AnnotationDriver($reader, array($basePath . '/Meetschools/Models'));
        $config->setMetadataDriverImpl($driverImpl);
        $config->setQueryCacheImpl($cache);

        // Proxy configuration
        $config->setProxyDir($basePath . '/Meetschools/Proxies');
        $config->setProxyNamespace('Meetschools\\Proxies');
        $config->addCustomNumericFunction("rand", "Doctrine\Custom_Functions\Rand");

        //Set up logger
        //$logger = new EchoSQLLogger;
        //$config->setSQLLogger($logger);

        $config->setAutoGenerateProxyClasses(FALSE);

        // Database connection information
        $connectionOptions = array(
            'driver' => 'pdo_mysql',
            'user' => $db['default']['username'],
            'password' => $db['default']['password'],
            'host' => $db['default']['hostname'],
            'dbname' => $db['default']['database']
        );

        // Create EntityManager
        $this->em = EntityManager::create($connectionOptions, $config);
        $platform = $this->em->getConnection()->getDatabasePlatform();
        $platform->registerDoctrineTypeMapping('enum', 'string');
        //$this->generate_classes();
    }

    function generate_classes() {

        $this->em->getConfiguration()
                ->setMetadataDriverImpl(
                        new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
                        $this->em->getConnection()->getSchemaManager()
                        )
        );



        $platform = $this->em->getConnection()->getDatabasePlatform();
        $platform->registerDoctrineTypeMapping('enum', 'string');

        $cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory();
        $cmf->setEntityManager($this->em);
        $metadata = $cmf->getAllMetadata();
        $generator = new \Doctrine\ORM\Tools\EntityGenerator();

        $generator->setUpdateEntityIfExists(true);
        $generator->setGenerateStubMethods(true);
        $generator->setGenerateAnnotations(true);
        $generator->generate($metadata, APPPATH . "Meetschools/Models/Entities");
    }

}
