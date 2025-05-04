<?php

namespace App\Events;

use Illuminate\Contracts\Redis\Factory;

class CacheOrderInformation
{
    /**
     * Redis 工厂实现。
     */
    protected $redis;

    /**
     * 创建一个新的事件处理器实例。
     *
     * @param Factory $redis
     * @return void
     */
    public function __construct(Factory $redis)
    {
        $this->redis = $redis;
    }

    /**
     * 处理事件。
     *
     * @param OrderWasPlaced $event
     * @return void
     */
    public function handle(OrderWasPlaced $event)
    {
        //
    }
}
