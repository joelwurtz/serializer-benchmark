<?php

namespace Benchmark\Model;

class Dummy
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
     * @var string[]
     */
    protected $propD;
    /**
     * @var Foo
     */
    protected $propE;
    /**
     * @var Foo[]
     */
    protected $propF;
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
    /**
     * @return string[]
     */
    public function getPropD()
    {
        return $this->propD;
    }
    /**
     * @param string[] $propD
     *
     * @return self
     */
    public function setPropD(array $propD = null)
    {
        $this->propD = $propD;
        return $this;
    }
    /**
     * @return Foo
     */
    public function getPropE()
    {
        return $this->propE;
    }
    /**
     * @param Foo $propE
     *
     * @return self
     */
    public function setPropE(Foo $propE = null)
    {
        $this->propE = $propE;
        return $this;
    }
    /**
     * @return Foo[]
     */
    public function getPropF()
    {
        return $this->propF;
    }
    /**
     * @param Foo[] $propF
     *
     * @return self
     */
    public function setPropF(array $propF = null)
    {
        $this->propF = $propF;
        return $this;
    }
}