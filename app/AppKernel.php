<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel {

    public function registerBundles() {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            
            
            new IPMotors\HomeBundle\IPMotorsHomeBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new IPMotors\UserBundle\IPMotorsUserBundle(),
            new IPMotors\WebServiceBundle\IPMotorsWebServiceBundle(),
            new IPMotors\CustomerBundle\IPMotorsCustomerBundle(),
            new IPMotors\FormEditBundle\IPMotorsFormEditBundle(),
            new IPMotors\StrenghsBundle\IPMotorsStrenghsBundle(),
            new IPMotors\MailBundle\IPMotorsMailBundle(),
            new IPMotors\MarketingBundle\IPMotorsMarketingBundle(),
            
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new IPMotors\ChoicesBundle\IPMotorsChoicesBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader) {
        $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
    }

}
