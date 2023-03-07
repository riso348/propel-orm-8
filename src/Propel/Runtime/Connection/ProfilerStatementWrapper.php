<?php

/**
 * This file is part of the Propel package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license MIT License
 */

namespace Propel\Runtime\Connection;

/**
 * Statement class with profiling abilities.
 */
class ProfilerStatementWrapper extends StatementWrapper
{
    /**
     * Binds a PHP variable to a corresponding named or question mark placeholder in the SQL statement
     * that was use to prepare the statement. Unlike PDOStatement::bindValue(), the variable is bound
     * as a reference and will only be evaluated at the time that PDOStatement::execute() is called.
     * Returns a boolean value indicating success.
     *
     * @param integer $pos            Parameter identifier (for determining what to replace in the query).
     * @param mixed   $value          The value to bind to the parameter.
     * @param integer $type           Explicit data type for the parameter using the PDO::PARAM_* constants. Defaults to PDO::PARAM_STR.
     * @param integer $length         Length of the data type. To indicate that a parameter is an OUT parameter from a stored procedure, you must explicitly set the length.
     * @param mixed   $driver_options
     *
     * @return boolean
     */
    public function bindParam(string|int $pos, mixed &$value, int $type = PDO::PARAM_STR, int $length = 0, mixed $driver_options = null): bool
    {
        $this->connection->getProfiler()->start();

        return parent::bindParam($pos, $value, $type, $length, $driver_options);
    }

    /**
     * Binds a value to a corresponding named or question mark placeholder in the SQL statement
     * that was use to prepare the statement. Returns a boolean value indicating success.
     *
     * @param integer $pos   Parameter identifier (for determining what to replace in the query).
     * @param mixed   $value The value to bind to the parameter.
     * @param integer $type  Explicit data type for the parameter using the PDO::PARAM_* constants. Defaults to PDO::PARAM_STR.
     *
     * @return boolean
     */
    public function bindValue(string|int $pos, mixed $value, int $type = \PDO::PARAM_STR):bool
    {
        $this->connection->getProfiler()->start();

        return parent::bindValue($pos, $value, $type);
    }

    /**
     * Executes a prepared statement.  Returns a boolean value indicating success.
     * Overridden for query counting and logging.
     *
     * @param  string  $parameters
     * @return boolean
     */
    public function execute(?array $parameters = null):bool
    {
        $this->connection->getProfiler()->start();

        return parent::execute($parameters);
    }
}
