<?php

/**
 * Park Address.
 */
class AddressPark extends Address
{

	public function display()
	{
		$output = '<div style="background-color:PaleGreen;">';
		$output .= parent::display();
		$output .= '</div>';
		return $output;
	}

	/**
	 * defining abstract method as it has been defined in parent/Address class.
	 */
	protected function _init()
	{
		$this->_setAddressTypeId(Address::ADDRESS_TYPE_PARK);
	}
}