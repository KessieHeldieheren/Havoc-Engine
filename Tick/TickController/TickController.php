<?php
declare(strict_types=1);

namespace Havoc\Engine\Tick\TickController;

use Havoc\Engine\Tick\TickFactory;
use Havoc\Engine\Tick\TickInterface;

/**
 * Havoc Engine tick controller.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class TickController implements TickControllerInterface
{
    /**
     * Tick.
     *
     * @var TickInterface
     */
    private $tick;
    
    /**
     * TickController constructor method.
     */
    public function __construct()
    {
        $this->setTick(TickFactory::new());
    }
    
    /**
     * Returns current.
     *
     * @return int
     */
    public function getCurrentTick(): int
    {
        return $this->getTick()->getTick();
    }
    
    /**
     * Increment the current tick.
     */
    public function incrementCurrentTick(): void
    {
        $this->getTick()->setTick($this->getTick()->getTick() + 1);
    }
    
    /**
     * Returns tick.
     *
     * @return TickInterface
     */
    public function getTick(): TickInterface
    {
        return $this->tick;
    }
    
    /**
     * Sets tick.
     *
     * @param TickInterface $tick
     */
    public function setTick(TickInterface $tick): void
    {
        $this->tick = $tick;
    }
}
