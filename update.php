#!/usr/bin/php
<?php

    /**
     * update.php
     * 
     * @author Oliver Nassar <onassar@gmail.com>
     * @see    https://github.com/onassar/PHP-EC2-Elastic-IP
     */

    /**
     * Customizable
     * 
     */

    // credentials
    $key = '0FHND85KDRD4VMYMTRR2';
    $secret = 'aRHxnzvbbxFuGo4IGTopnUZaPcbPH46tsiUQgcF6';

    // SDK path
    $path = '/home/ubuntu/scripts/aws-sdk-for-php/sdk.class.php';
    require_once $path;

    /**
     * Logic
     * 
     */

    // check out parameters
    $private = isset($GLOBALS['argv'][1]) ? $GLOBALS['argv'][1] : false;
    $elastic = isset($GLOBALS['argv'][2]) ? $GLOBALS['argv'][2] : false;

    // bail if either is false
    if ($private === false || $elastic === false) {
        exit('1');
    }

    // retrieve the instance corresponding to the private ip
    $ec2 = (new AmazonEC2(array(
        'key' => $key,
        'secret' => $secret
    )));
    $repsonse = $ec2->describe_instances();
    $found = false;

    // if legit response found
    if (
        isset($repsonse->body->reservationSet->item)
        && count($repsonse->body->reservationSet->item) > 0
    ) {

        // loop through instances, looking for matching by private IP
        $instances = $repsonse->body->reservationSet->item;
        foreach ($instances as $instance) {
            if ($instance->instancesSet->item->privateIpAddress == $private) {
                $found = $instance->instancesSet->item->instanceId;
            }
        }

        // if one found
        if ($found !== false) {

            // associate public IP
            $ec2->associate_address($found, $elastic);
            exit('0');
        }
    }

    // default failure
    exit('1');

