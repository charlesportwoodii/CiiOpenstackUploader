# CiiRackspaceUploader Class

This class enables CiiMS to upload files to Rackspace Cloud Files, or any OpenStack file store

## Installation

This class should be installed with composer. After installing/uploading CiiMS, run this class

```
# composer require ciims-plugins/awsuploader dev-master # DEV
composer require ciims-plugins/rackspaceuploader 1.0.0 # Versioned
```

## How to Use

To use this class, you need to make a configuration change to your ```protected/config/params.php``` file.

```
<?php return array(

	[...]
	'ciims_plugins' => array(
		'upload' => array(
			'class' => 'CiiOpenstackUploader',
			'options' => array(
				'useOpenstack' => false, 	// Set to true to use a generic opensatck container
				'container' => '', 			// The container name
				'username' => '',     		// Your Openstack username
				'API_KEY' => '', 			// Your Openstack API key
				'region' => '', 	 	 	// The upload region
				'identity' => '', 			// Only applies when using a non Rackspace container
			)
		)
	)
	[...]
);
```

# Options

The following options are available for this class:

__useOpenstack__ (optional)

By default this plugin will attempt to connect to Racksapce Cloud files. If you want to use a generic openstack container, set this value to true

__container__ (required)

The container name

__username__ (required)

The username to access the container

__API_KEY__ (required)

Your container API key

__region__ (required)

The region you want to connect to

__identity__ (optional)

If __useOpenstack__ is set to true, you must specify the identity URL. Al;ternatively if you're connecting to a non US Rackspace Cloud files endpoint, you can specify your identity provider here
