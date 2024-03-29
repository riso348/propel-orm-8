<?php

/**
 * This file is part of the Propel package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license MIT License
 */

namespace Propel\Runtime\Connection;

use Propel\Runtime\Exception\InvalidArgumentException;
use Propel\Runtime\DataFetcher\PDODataFetcher;

/**
 * PDO extension that implements ConnectionInterface and builds \PDOStatement statements.
 */
class PdoConnection extends \PDO implements ConnectionInterface
{
    use TransactionTrait;

    /**
     * @var string The datasource name associated to this connection
     */
    protected $name;

    /**
     * @param string $name The datasource name associated to this connection
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string The datasource name associated to this connection
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Creates a PDO instance representing a connection to a database.
     */
    public function __construct($dsn, $user = null, $password = null, array $options = null)
    {

        // Convert option keys from a string to a \PDO:: constant
        $pdoOptions = [];
        if (is_array($options)) {
            foreach ($options as $key => $option) {
                $index = (is_numeric($key)) ? $key : constant('self::' . $key);
                $pdoOptions[$index] = $option;
            }
        }

        parent::__construct($dsn, $user, $password, $pdoOptions);

        $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Sets a connection attribute.
     *
     * This is overridden here to allow names corresponding to PDO constant names.
     *
     * @param integer $attribute The attribute to set (e.g. 'PDO::ATTR_CASE', or more simply 'ATTR_CASE').
     * @param mixed $value The attribute value.
     *
     * @return bool
     * @throws InvalidArgumentException
     */
    public function setAttribute(int $attribute, mixed $value):bool
    {
        if (is_string($attribute) && false === strpos($attribute, '::')) {
            $attribute = '\PDO::' . $attribute;
            if (!defined($attribute)) {
                throw new InvalidArgumentException(sprintf('Invalid PDO option/attribute name specified: "%s"', $attribute));
            }
            $attribute = constant($attribute);
        }

        return parent::setAttribute($attribute, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getDataFetcher($data)
    {
        return new PDODataFetcher($data);
    }

    /**
     * {@inheritDoc}
     */
    public function getSingleDataFetcher($data)
    {
        return $this->getDataFetcher($data);
    }

    /**
     * {@inheritDoc}
     */
    public function query(string $statement, ?int $mode = \PDO::ATTR_DEFAULT_FETCH_MODE, ...$fetch_mode_args):\PDOStatement|false
    {
        return parent::query($statement);
    }

    /**
     * {@inheritDoc}
     */
    public function exec(string $statement): int|false
    {
        return parent::exec($statement);
    }

    /**
     * Overwrite. Fixes HHVM strict issue.
     *
     * @return bool|void
     */
    public function inTransaction():bool
    {
        return parent::inTransaction();
    }

    /**
     * Overwrite. Fixes HHVM strict issue.
     *
     * @param null $name
     * @return string|void
     */
    public function lastInsertId(?string $name = null): string|false
    {
        return parent::lastInsertId($name);
    }

    /**
     * Overwrite. Fixes HHVM strict issue.
     *
     * @param string $statement
     * @param array $driver_options
     * @return bool|\PDOStatement|void
     */
    public function prepare(string $query, array $options = []):\PDOStatement|false
    {
        return parent::prepare($query, $options ?: []);
    }

    /**
     * Overwrite. Fixes HHVM strict issue.
     *
     * @param string $string
     * @param int $parameter_type
     * @return string
     */
    public function quote(string $string, int $parameter_type = \PDO::PARAM_STR):string|false
    {
        return parent::quote($string, $parameter_type);
    }


}
