<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

use Havoc\Engine\Entity\Boundary\BoundaryRules\BoundaryRule;
use Havoc\Engine\Entity\Boundary\BoundarySupervisor\BoundarySupervisorInterface;
use Havoc\Engine\Core\EngineException;

/**
 * Havoc Engine entity boundary exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class BoundaryException extends EngineException
{
    public const BOUNDARY_SUPERVISOR_BAD_CLASS = 0x1;
    public const BOUNDARY_RULE_INVALID = 0x2;
    public const CONFIG_X_GRID_OVER_MAX = 0x3;
    public const CONFIG_X_GRID_UNDER_MIN = 0x4;
    public const CONFIG_Y_GRID_OVER_MAX = 0x5;
    public const CONFIG_Y_GRID_UNDER_MIN = 0x6;
    
    /**
     * @param string $given_class
     * @return BoundaryException
     */
    public static function boundarySupervisorBadClass(string $given_class): self
    {
        $required_class = BoundarySupervisorInterface::class;
    
        return new self (
            sprintf("Cannot create a boundary supervisor using %s, as it must implement %s.", $given_class, $required_class),
            self::BOUNDARY_SUPERVISOR_BAD_CLASS
        );
    }
    
    /**
     * @param int $id
     * @return BoundaryException
     */
    public static function boundaryRuleInvalid(int $id): self
    {
        $valid_rules = implode(", ", BoundaryRule::getAllNames());
        
        return new self (
            sprintf("The boundary rule %s isn't associated with a valid rule. The valid rules are %s.", $id, $valid_rules),
            self::BOUNDARY_RULE_INVALID
        );
    }
    
    /**
     * @param int $value
     * @return BoundaryException
     */
    public static function xGridOverMax(int $value): self
    {
        $max = Boundary::X_BOUNDARY_MAX;
        
        return new self (
            sprintf("Cannot set the X boundary to %s, as the maximum is %s.", $value, $max),
            self::CONFIG_X_GRID_OVER_MAX
        );
    }
    
    /**
     * @param int $value
     * @return BoundaryException
     */
    public static function yGridOverMax(int $value): self
    {
        $max = Boundary::Y_BOUNDARY_MAX;
        
        return new self (
            sprintf("Cannot set the Y boundary to %s, as the maximum is %s.", $value, $max),
            self::CONFIG_Y_GRID_OVER_MAX
        );
    }
}
