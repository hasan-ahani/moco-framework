<?php
namespace MocoFramework\Helper;

/**
 * @package     moco-framework
 * @author      Hasan Ahani
 * @copyright   https://wpdv.ir
 * @license     GPL v3 or later
 * @version     1.0.0
 */
defined( 'ABSPATH' ) or exit();

class Section
{
	
	/**
	 * @var string
	 */
	private $name;
	
	/**
	 * @var string
	 */
	private $type = 'tab';
	
	/**
	 * @var string
	 */
	private $link;
	
	/**
	 * @var array
	 */
	private $fields;
	
	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}
	
	/**
	 * @return string
	 */
	public function getLink()
	{
		return $this->link;
	}
	
	/**
	 * @return array
	 */
	public function getFields()
	{
		return $this->fields;
	}
	
	/**
	 * @param string $name
	 *
	 * @return Section
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}
	
	/**
	 * @param string $link
	 *
	 * @return Section
	 */
	public function setLink($link)
	{
		$this->link = $link;
		return $this;
	}
	
	/**
	 * @param string $type
	 *
	 * @return Section
	 */
	public function setType($type)
	{
		$this->type = $type;
		return $this;
	}
	
	/**
	 * @param Field $field
	 *
	 * @return Section
	 */
	public function addField( Field $field)
	{
		$this->fields[] = $field;
		return $this;
	}
}
