<?php

namespace Zorbus\AppBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Zorbus\PageBundle\Model\PageBlock as BasePageBlock;

/**
 * @Entity(repositoryClass="Zorbus\PageBundle\Model\PageBlockRepository")
 */
class PageBlock extends BasePageBlock
{
}
