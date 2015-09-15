<?php

/**
 * Residential Address.
 */
class AddressResidence extends Address
{
	/**
	 * defining abstract method as it has been defined in parent/Address class.
	 */
	protected function _init()
	{
		$this->_setAddressTypeId(Address::ADDRESS_TYPE_RESIDENCE);
	}
}