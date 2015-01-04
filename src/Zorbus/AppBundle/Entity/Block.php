<?php

namespace Zorbus\AppBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Zorbus\BlockBundle\Entity\Block as BaseBlock;

/**
 * @Entity(repositoryClass="Zorbus\BlockBundle\Entity\BlockRepository")
 */
class Block extends BaseBlock
{

}