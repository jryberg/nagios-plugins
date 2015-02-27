# About check_salt-minion
check_salt-minion is a plugin for Naemon / op5 / Nagios and other Nagios compatible monitoring software to
end to end test salt-minion daemons.

This plugin contains 3 different files
### check_salt-minion
The actual check command that are used by nrpe

### ping_salt-minion
Script that test salt-minion by issuing test.ping command and stores the result that are used by check_salt-minion

### check_minions.php
pnp template to be used with pnp4nagios (http://pnp4nagios.org).
