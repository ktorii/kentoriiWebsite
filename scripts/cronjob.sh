#!/bin/bash

command="/usr/local/bin/php -q /home/ktorii7/public_html/index.php cronjobs weeklyUpdate getWeekData"
job="0 0 * * 0 $command"
cat <(fgrep -i -v "$command" <(crontab -l)) <(echo "$job") | crontab -