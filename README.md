PHP-EC2-Elastic-IP
===
Provides a bash-accessible script which sets the elastic IP address of an
instance, as determined by a passed in Private IP Address.

### Presumptions

 - `update.php` contains your AWS key and passphrase appropriately
 - The [AWS PHP SDK](http://aws.amazon.com/sdkforphp/) is available at the path
`../sdk-1.5.2/sdk-1.5.2/sdk.class.php`

If the path to the AWS SDK is different, it must then be specified in
`update.php`.

### Sample CLI Call

``` bash

sudo ./update.php 10.249.173.14 107.20.212.157
```

After the above command has been executed, the IP address `107.20.212.157` will
have been assigned to the instance `10.249.173.14`.

If it executes successfully, 0 will be exited by the script, otherwise 1 will
be.
