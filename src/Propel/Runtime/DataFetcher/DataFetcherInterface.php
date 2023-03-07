<?php

namespace Propel\Runtime\DataFetcher;

/**
 * Interface class for DataFetcher.
 */
interface DataFetcherInterface extends \Iterator, \Countable
{
    /**
     * Sets the dataObject.
     *
     * @param mixed $dataObject
     */
    public function setDataObject($dataObject);

    /**
     * Returns the current data object that holds or references to actual data.
     *
     * @return mixed
     */
    public function getDataObject();

    /**
     * Return the current element
     *
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current():mixed;

    /**
     * Move forward to next element
     *
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next():void;

    /**
     * Return the key of the current element
     *
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key():mixed;

    /**
     * Checks if current position is valid
     *
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     *                 Returns true on success or false on failure.
     */
    public function valid():bool;

    /**
     * Rewind the Iterator to the first element
     *
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind():void;

    /**
     * Returns the data of the first column of the next row,
     * based on this->fetch();
     *
     * @param int $index
     *
     * @return mixed|null
     */
    public function fetchColumn(?int $index = null);

    /**
     * Returns the data of the next row,
     * based on this->next() && this->current();
     *
     * @return array|null
     */
    public function fetch();

    /**
     * Frees the resultSet.
     */
    public function close():void;

    /**
     * Returns the count of items in the resultSet.
     *
     * @return int
     */
    public function count():int;

    /**
     * Returns the TableMap::TYPE_*
     * depends on your resultSet. We need this information
     * to be able to populate objects based on your array of fetch().
     *
     * @return string one of TableMap::TYPE_*
     */
    public function getIndexType();
}
