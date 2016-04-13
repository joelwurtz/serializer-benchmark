<?php

namespace Benchmark\Normalizer;

use Joli\Jane\Reference\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class FooNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Benchmark\\Model\\Foo') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Benchmark\Model\Foo) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (empty($data)) {
            return null;
        }
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Benchmark\Model\Foo();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'propA')) {
            $object->setPropA($data->{'propA'});
        }
        if (property_exists($data, 'propB')) {
            $object->setPropB($data->{'propB'});
        }
        if (property_exists($data, 'propC')) {
            $object->setPropC($data->{'propC'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getPropA()) {
            $data->{'propA'} = $object->getPropA();
        }
        if (null !== $object->getPropB()) {
            $data->{'propB'} = $object->getPropB();
        }
        if (null !== $object->getPropC()) {
            $data->{'propC'} = $object->getPropC();
        }
        return $data;
    }
}