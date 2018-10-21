<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryCode;

use Havoc\Engine\Exceptions\HavocEngineException;

/**
 * Havoc Engine entity boundary codes exception.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class BoundaryCodeException extends HavocEngineException
{
    public const BOUNDARY_CODE_INVALID = 0x1;
    
    /**
     * @param int $code
     * @return BoundaryCodeException
     */
    public static function boundaryCodeInvalid(int $code): self
    {
        $valid_codes = implode(", ", BoundaryCode::getAllNames());
        
        return new self (
            sprintf(
                "The boundary code %s is not valid. Codes must be constants of BoundaryCode. Valid codes include %s.",
                $code,
                $valid_codes
            ),
            self::BOUNDARY_CODE_INVALID
        );
    }
}
