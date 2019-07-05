<?php

namespace Chainside\SDK\WebPos;


use Chainside\SDK\WebPos\Cache\IlluminateCacheWrapper;
use Illuminate\Cache\FileStore;
use Illuminate\Cache\Repository;
use Illuminate\Filesystem\Filesystem;
use Psr\SimpleCache\CacheInterface;
use SDK\Boilerplate\Context;

class ApiContext extends Context
{

    protected $hostnames = [
        'live' => 'https://api.webpos.chainside.net',
        'sandbox' => 'https://api.sandbox.webpos.chainside.net',
    ];

    protected $defaultConfig = [
        'mode' => 'live',
        'client_id' => null,
        'secret' => null,
        'cache_directory' => '/tmp/chainside_sdk_cache'
    ];

    protected $cache;

    public function __construct(array $config, CacheInterface $cache = null)
    {

        $config = $config + $this->defaultConfig;
        $hostname = $this->hostnames[$config['mode']];
        $this->cache = $cache;
        parent::__construct($hostname, $config);

    }

    protected function buildCache()
    {
        if(is_null($this->cache)) {
            $store = new FileStore(new Filesystem(), $this->getConfig()->get('cache_directory'));
            $repository = new Repository($store);
            return new IlluminateCacheWrapper($repository);
        } else return $this->cache;
    }

}
