<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

use Havoc\Engine\Exceptions\HavocEngineException;

/**
 * Havoc Engine entity boundary exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class BoundaryException extends HavocEngineException
{
    public const BOUNDARY_SUPERVISOR_BAD_CLASS = 0x1;
    public const BOUNDARY_RULE_INVALID = 0x2;
    
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
}
