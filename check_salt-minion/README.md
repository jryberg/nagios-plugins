# About check_salt-minion
check_salt-minion is a plugin for Naemon / op5 / Nagios and other Nagios compatible monitoring software to
end-to-end test salt-minion daemons.

This plugin contains 3 different files
#### check_salt-minion
The actual check command that are used by nrpe

#### ping_salt-minion
Script that test salt-minion by issuing test.ping command for all accepted salt-minions and stores the result that are used by check_salt-minion. This script contains hard coded path's for binaries since it most likely will be executed by root user.
Tested on Redhat 6.6, CentOS 6.6 and Ubuntu 14.04. Please make sure all path's is correct for your system.

#### check_minions.php
pnp template to be used with pnp4nagios (http://pnp4nagios.org).

# Installation
### check_salt-minion
Copy check_salt-minion to your nrpe plugin folder on your salt-master host
Make sure check_salt-minion can be executed (chmod +x path_to_check_salt-minion)

### ping_salt-minion
Copy ping_salt-minion to /etc/cron.hourly on your salt-master host. 
Make sure ping_salt-minion can be executed (chmod +x path_to_ping_salt-minion)

By placing ping_salt-minion in /etc/cron.hourly the script will be executed once every hour. If you have many thousands of salt-minions you might want to move the script to cron.daily instead since it will take some time to test all salt-minions.

If you want to use a custom scheduler instead, please execute the script via cron

### check_minions.php (pnp4nagios template)
Copy check_minions.php to your pnp template folder on the monitoring host and make necessary configuration depending of your setup. For more information see:
- http://docs.pnp4nagios.org/pnp-0.6/tpl_custom
- https://kb.op5.com/display/HOWTOs/Add+new+templates+to+op5+Monitor+performance+graphs

# Exclude salt-minion
If you want to exclude salt-minions from the test please create "/var/cache/check_salt-minion/exclude-salt-minion.txt" on the same host running ping_salt-minion and and one salt-minion id per row
```
minion1
minion2
minion3
```
# Test ping_salt-minion
It's a good idéa to test pign_salt-minion the first time to make sure everything works as expected.

sudo /etc/cron.hourly/ping_salt-minion

By default, the versbose flag in the script is set to true. Once the script has executed sucessfully first time you can disable output by changing the row:
```
# Set VERBOSE to 1 if you would like some output
VERBOSE="1"
```
to
```
# Set VERBOSE to 1 if you would like some output
VERBOSE="0"
```
