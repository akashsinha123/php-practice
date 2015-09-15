<?php

/**
 * Business Address.
 */
class AddressBusiness extends Address
{
	/**
	 * defining abstract method as it has been defined in parent/Address class.
	 */
	protected function _init()
	{
		$this->_setAddressTypeId(Address::ADDRESS_TYPE_BUSINESS);
	}
}