<?php

namespace Zorbus\AppBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Zorbus\PageBundle\Model\Page as BasePage;

/**
 * @Entity(repositoryClass="Zorbus\PageBundle\Model\PageRepository")
 */
class Page extends BasePage
{

}