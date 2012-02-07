PHP-EC2-Elastic-IP
===
Provides a bash-accessible script which sets the elastic IP address of an
instance, as determined by a passed in Private IP Address.

### Presumptions
You have made changes to the PHP file, editing your key and passphrase before
having used the script.

### Sample CLI Call

``` bash

sudo ./update.php 10.249.173.14 107.20.212.157
```

After the above command has been executed, the IP address `107.20.212.157` will
have been assigned to the instance `10.249.173.14`.

If it executes successfully, 0 will be exited by the script, otherwise 1 will
be.
