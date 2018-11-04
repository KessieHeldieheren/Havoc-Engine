<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryRules;

use Havoc\Engine\Entity\Boundary\BoundaryException;

/**
 * Havoc Engine entity boundary rules.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class BoundaryRules implements BoundaryRulesInterface
{
    /**
     * Boundary rule for the X negative axis.
     *
     * @var int
     */
    private $x_negative;
    
    /**
     * Boundary rule for the X positive axis.
     *
     * @var int
     */
    private $x_positive;
    
    /**
     * Boundary rule for the Y negative axis.
     *
     * @var int
     */
    private $y_negative;
    
    /**
     * Boundary rule for the Y positive axis.
     *
     * @var int
     */
    private $y_positive;
    
    /**
     * BoundaryRules constructor method.
     *
     * @param int $x_negative
     * @param int $x_positive
     * @param int $y_negative
     * @param int $y_positive
     */
    public function __construct(int $x_negative, int $x_positive, int $y_negative, int $y_positive)
    {
        $this->setXNegative($x_negative);
        $this->setXPositive($x_positive);
        $this->setYNegative($y_negative);
        $this->setYPositive($y_positive);
    }
    
    /**
     * Set all boundaries.
     *
     * @param int $rule
     */
    public function setAll(int $rule): void
    {
        $this->setXNegative($rule);
        $this->setXPositive($rule);
        $this->setYNegative($rule);
        $this->setYPositive($rule);
    }
    
    /**
     * Returns x_negative.
     *
     * @return int
     */
    public function getXNegative(): int
    {
        return $this->x_negative;
    }
    
    /**
     * Sets x_negative.
     *
     * @param int $x_negative
     */
    public function setXNegative(int $x_negative): void
    {
        $this->validateBoundaryRuleExists($x_negative);
        
        $this->x_negative = $x_negative;
    }
    
    /**
     * Returns x_positive.
     *
     * @return int
     */
    public function getXPositive(): int
    {
        return $this->x_positive;
    }
    
    /**
     * Sets x_positive.
     *
     * @param int $x_positive
     */
    public function setXPositive(int $x_positive): void
    {
        $this->validateBoundaryRuleExists($x_positive);
        
        $this->x_positive = $x_positive;
    }
    
    /**
     * Returns y_negative.
     *
     * @return int
     */
    public function getYNegative(): int
    {
        return $this->y_negative;
    }
    
    /**
     * Sets y_negative.
     *
     * @param int $y_negative
     */
    public function setYNegative(int $y_negative): void
    {
        $this->validateBoundaryRuleExists($y_negative);
        
        $this->y_negative = $y_negative;
    }
    
    /**
     * Returns y_positive.
     *
     * @return int
     */
    public function getYPositive(): int
    {
        return $this->y_positive;
    }
    
    /**
     * Sets y_positive.
     *
     * @param int $y_positive
     */
    public function setYPositive(int $y_positive): void
    {
        $this->validateBoundaryRuleExists($y_positive);
        
        $this->y_positive = $y_positive;
    }
    
    /**
     * Validate that a boundary rule exist.
     *
     * @param int $rule
     */
    private function validateBoundaryRuleExists(int $rule): void
    {
        if (BoundaryRule::validValue($rule) === false) {
            throw BoundaryException::boundaryRuleInvalid($rule);
        }
    }
}
