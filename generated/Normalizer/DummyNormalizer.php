<?php

namespace Benchmark\Normalizer;

use Joli\Jane\Reference\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class DummyNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Benchmark\\Model\\Dummy') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Benchmark\Model\Dummy) {
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
        $object = new \Benchmark\Model\Dummy();
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
        if (property_exists($data, 'propD')) {
            $values = array();
            foreach ($data->{'propD'} as $value) {
                $values[] = $value;
            }
            $object->setPropD($values);
        }
        if (property_exists($data, 'propE')) {
            $object->setPropE($this->serializer->deserialize($data->{'propE'}, 'Benchmark\\Model\\Foo', 'raw', $context));
        }
        if (property_exists($data, 'propF')) {
            $values_1 = array();
            foreach ($data->{'propF'} as $value_1) {
                $values_1[] = $this->serializer->deserialize($value_1, 'Benchmark\\Model\\Foo', 'raw', $context);
            }
            $object->setPropF($values_1);
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
        if (null !== $object->getPropD()) {
            $values = array();
            foreach ($object->getPropD() as $value) {
                $values[] = $value;
            }
            $data->{'propD'} = $values;
        }
        if (null !== $object->getPropE()) {
            $data->{'propE'} = $this->serializer->serialize($object->getPropE(), 'raw', $context);
        }
        if (null !== $object->getPropF()) {
            $values_1 = array();
            foreach ($object->getPropF() as $value_1) {
                $values_1[] = $this->serializer->serialize($value_1, 'raw', $context);
            }
            $data->{'propF'} = $values_1;
        }
        return $data;
    }
}