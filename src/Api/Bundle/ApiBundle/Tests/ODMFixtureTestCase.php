<?php

namespace Api\Bundle\ApiBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Common\DataFixtures\Loader;

/**
 * Class ODMFixtureTestCase
 *
 */
class ODMFixtureTestCase extends WebTestCase
{
    /**
     * Holds the document manager instance
     *
     * @staticvar Doctrine\ODM\MongoDB\DocumentManager
     */
    public static $dm;


    /**
     * Autoloads the fixtures passed in the static array $fixtures
     *
     * @param boolean $append        Does it append fixtures
     * @param array   $options       The options
     * @param array   $kernelOptions The options to pass to `WebTestCase::createKernel()`
     *
     * TODO: Add support for other Entity/Document managers
     *
     * @return void
     */
    public function loadFixtures($append = false, array $options = array(), array $kernelOptions = array())
    {
        if (null !== static::$kernel) {
            static::$kernel->shutdown();
        }

        static::$kernel = static::createKernel($kernelOptions);
        static::$kernel->boot();

        static::$dm = static::$kernel->getContainer()
            ->get('doctrine.odm.mongodb.document_manager');

        $loader = new Loader();
        foreach ($this->getDataFixturesPaths() as $path) {
            $loader->loadFromDirectory($path);
        }

        $fixtures = $loader->getFixtures();

        $purger = new \Doctrine\Common\DataFixtures\Purger\MongoDBPurger(static::$dm);
        $executor = new \Doctrine\Common\DataFixtures\Executor\MongoDBExecutor(static::$dm, $purger);
        $executor->execute($fixtures, $append);

    }


    /**
     * Gets the path of fixtures data folder
     *
     * @return string
     */
    public function getDataFixturesPaths()
    {
        $paths = array();

        foreach (static::$kernel->getBundles() as $bundle) {
            $godBundles = ['ApiBundle'];
            if (in_array($bundle->getName(), $godBundles)) {
                $paths[] = $bundle->getPath() . '/DataFixtures/MongoDB';
            }
        }

        return $paths;

    }


    /**
     * Purges the db and shuts down the kernel
     *
     * @return void
     */
    protected function tearDown()
    {
        $purger = new \Doctrine\Common\DataFixtures\Purger\MongoDBPurger(static::$dm);
        $purger->purge();
        if (null !== static::$kernel) {
            static::$kernel->shutdown();
        }

    }
}
