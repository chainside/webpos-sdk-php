<?php

namespace Chainside\SDK\WebPos\Cache;


use Illuminate\Cache\Repository;
use Psr\SimpleCache\CacheInterface;

class IlluminateCacheWrapper implements CacheInterface
{

    protected $repository;

    public function __construct(Repository $repository)
    {

        $this->repository = $repository;

    }

    public function getRepository()
    {
        return $this->repository;
    }

    public function get($key, $default = null)
    {
        return $this->repository->get($key, $default);
    }

    public function set($key, $value, $ttl = 0)
    {

        if(!$ttl) $this->repository->forever($key, $value);
        else $this->repository->put($key, $value, $ttl);

        return true;
    }

    public function delete($key)
    {
        return $this->repository->forget($key);
    }

    public function clear()
    {
        $this->repository->getStore()->flush();
    }

    public function getMultiple($keys, $default = null)
    {
        return $this->repository->many($keys);
    }

    public function setMultiple($values, $ttl = 0)
    {
        $this->repository->putMany($values, $ttl);
    }

    public function deleteMultiple($keys)
    {
        $res = true;
        foreach($keys as $key)
        {
            $res = $res & $this->repository->forget($key);
        }

        return $res;
    }

    public function has($key)
    {
        return $this->repository->has($key);
    }
}