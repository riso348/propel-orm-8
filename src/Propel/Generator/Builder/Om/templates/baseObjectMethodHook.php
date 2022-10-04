
<?php if ($preSave):?>
    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        $refObj = new \ReflectionObject($this);
        if ($refObj->getParentClass() && $refObj->getParentClass()->getName() !== self::class) {
            if ($refObj->getParentClass()->hasMethod('preSave')) {
                $method = $refObj->getParentClass()->getMethod('preSave');
                if ($method->class !== self::class) {
                    return $method->invoke($this, $con);
                }
            }
        }
        return true;
    }

<?php endif?>
<?php if ($postSave):?>
    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        $refObj = new \ReflectionObject($this);
        if ($refObj->getParentClass() && $refObj->getParentClass()->getName() !== self::class) {
            if ($refObj->getParentClass()->hasMethod('postSave')) {
                $method = $refObj->getParentClass()->getMethod('postSave');
                if ($method->class !== self::class) {
                    return $method->invoke($this, $con);
                }
            }
        }
    }

<?php endif?>
<?php if ($preInsert):?>
    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        $refObj = new \ReflectionObject($this);
        if ($refObj->getParentClass() && $refObj->getParentClass()->getName() !== self::class) {
            if ($refObj->getParentClass()->hasMethod('preInsert')) {
                $method = $refObj->getParentClass()->getMethod('preInsert');
                if ($method->class !== self::class) {
                    return $method->invoke($this, $con);
                }
            }
        }
        return true;
    }

<?php endif?>
<?php if ($postInsert):?>
    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        $refObj = new \ReflectionObject($this);
        if ($refObj->getParentClass() && $refObj->getParentClass()->getName() !== self::class) {
            if ($refObj->getParentClass()->hasMethod('postInsert')) {
                $method = $refObj->getParentClass()->getMethod('postInsert');
                if ($method->class !== self::class) {
                    return $method->invoke($this, $con);
                }
            }
        }
    }

<?php endif?>
<?php if ($preUpdate):?>
    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        $refObj = new \ReflectionObject($this);
        if ($refObj->getParentClass() && $refObj->getParentClass()->getName() !== self::class) {
            if ($refObj->getParentClass()->hasMethod('preUpdate')) {
                $method = $refObj->getParentClass()->getMethod('preUpdate');
                if ($method->class !== self::class) {
                    return $method->invoke($this, $con);
                }
            }
        }
        return true;
    }

<?php endif?>
<?php if ($postUpdate):?>
    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        $refObj = new \ReflectionObject($this);
        if ($refObj->getParentClass() && $refObj->getParentClass()->getName() !== self::class) {
            if ($refObj->getParentClass()->hasMethod('postUpdate')) {
                $method = $refObj->getParentClass()->getMethod('postUpdate');
                if ($method->class !== self::class) {
                    return $method->invoke($this, $con);
                }
            }
        }
    }

<?php endif?>
<?php if ($preDelete):?>
    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        $refObj = new \ReflectionObject($this);
        if ($refObj->getParentClass() && $refObj->getParentClass()->getName() !== self::class) {
            if ($refObj->getParentClass()->hasMethod('preDelete')) {
                $method = $refObj->getParentClass()->getMethod('preDelete');
                if ($method->class !== self::class) {
                    return $method->invoke($this, $con);
                }
            }
        }
        return true;
    }

<?php endif?>
<?php if ($postDelete):?>
    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        $refObj = new \ReflectionObject($this);
        if ($refObj->getParentClass() && $refObj->getParentClass()->getName() !== self::class) {
            if ($refObj->getParentClass()->hasMethod('postDelete')) {
                $method = $refObj->getParentClass()->getMethod('postDelete');
                if ($method->class !== self::class) {
                    return $method->invoke($this, $con);
                }
            }
        }
    }

<?php endif?>