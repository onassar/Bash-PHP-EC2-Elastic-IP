Bash-PHP-EC2-Elastic-IP
===
Provides a bash-accessible script which sets the elastic IP address of an
instance, as determined by a passed in Private IP Address.

### Presumptions

 - `update.php` contains your AWS key and secret appropriately
 - The [AWS PHP SDK](http://aws.amazon.com/sdkforphp/) is available at the path
`/home/ubuntu/scripts/aws-sdk-for-php/sdk.class.php`, relative to `update.php`

If the path to the AWS SDK is different, it must then be specified in
`update.php`.

### Sample CLI Call

``` bash

sudo ./update.php 10.0.0.1 107.0.0.1
```

After the above command has been executed, the IP address `107.0.0.1` will have
been assigned to the instance `10.0.0.1`.

If it executes successfully, 0 will be exited by the script, otherwise 1 will
be.
