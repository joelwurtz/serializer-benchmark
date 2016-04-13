<?php

namespace Benchmark\Model;

class Foo
{
    /**
     * @var string
     */
    protected $propA;
    /**
     * @var int
     */
    protected $propB;
    /**
     * @var float
     */
    protected $propC;
    /**
     * @return string
     */
    public function getPropA()
    {
        return $this->propA;
    }
    /**
     * @param string $propA
     *
     * @return self
     */
    public function setPropA($propA = null)
    {
        $this->propA = $propA;
        return $this;
    }
    /**
     * @return int
     */
    public function getPropB()
    {
        return $this->propB;
    }
    /**
     * @param int $propB
     *
     * @return self
     */
    public function setPropB($propB = null)
    {
        $this->propB = $propB;
        return $this;
    }
    /**
     * @return float
     */
    public function getPropC()
    {
        return $this->propC;
    }
    /**
     * @param float $propC
     *
     * @return self
     */
    public function setPropC($propC = null)
    {
        $this->propC = $propC;
        return $this;
    }
}