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
Copy check_salt-minion to your plugin folder for nrpe on your salt-master server and ping_salt-minion to /etc/cron.hourly on your salt-master server. 

If you want another scheduler instead of every hour, please execute the script via cron

Make sure execute bit are set on both scripts (chmod +x <path to script>)

Copy check_minions.php to your pnp template folder on the monitoring server and make necessary configuration depending of your setup. For more information see:
- http://docs.pnp4nagios.org/pnp-0.6/tpl_custom
- https://kb.op5.com/display/HOWTOs/Add+new+templates+to+op5+Monitor+performance+graphs

# Exclude salt-minion
If you want to exclude salt-minions from the test please create "/var/cache/check_salt-minion/exclude-salt-minion.txt" on the same host running ping_salt-minion and and one salt-minion id per row
```
minion1
minion2
minion3
```
