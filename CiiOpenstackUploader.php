<?php

/**
 * Allows CiiMS to upload files to Openstack files (like Rackspace Cloud Files)
 */
Yii::import('cii.utilities.CiiUploader');
class CiiOpenstackUploader extends CiiUploader
{
	public function upload()
	{
		$check = $this->verifyFile();

        if (isset($check['error']))
            return $check;
        
        $filename = $check['success'];

		try {
			if (isset($this->useOpenstack) && $this->useOpenstack === true)
			    $openCloud = $this->getOpenstackCDN();
			else
				$openCloud = $this->getRackspaceCDN();

			$container = $openCloud->getContainer($this->container);
			return $openCloud->uploadFile($this->file, $filename);
		} catch (Exception $e) {
			return array(
				'error' => $e->getMessage()
			);
		}
	}

	/**
	 * Returns a Rackspace specific Openstack CDN Instances
	 * @return CiiOpenCloud
	 */
	private function getRackspaceCDN()
	{
		return new CiiOpenCloud($this->username, $this->API_KEY, true, NULL, $this->region);
	}

	/**
	 * Returns an Openstack CDN instances
	 * @return CiiOpenCloud
	 */
	private function getOpenstackCDN()
	{
		return new CiiOpenCloud($this->username, $this->API_KEY, false, $this->identity, $this->region);
	}
}