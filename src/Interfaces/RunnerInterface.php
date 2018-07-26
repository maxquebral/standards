<?php
declare(strict_types=1);

namespace NatePage\Standards\Interfaces;

interface RunnerInterface
{
    /**
     * Check if currently running.
     *
     * @return bool
     */
    public function isRunning(): bool;

    /**
     * Run given instance.
     *
     * @return self
     */
    public function run(): self;
}
