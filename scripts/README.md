#Checking if Cron Job was successfully added

1. Log in to your GoDaddy account.
2. Click Web Hosting.
3. Next to the hosting account you want to use, click Manage.
4. In the Tools section of the Hosting Control Panel, click the Cron Job Manager icon. This action displays the Cron Job
    Manager screen.

#If Cron Job failed to be added it can be manually added 

1. Follow the steps 1-4 form the previous list
2. Click Create Cron Job.
3. Select and enter the options you want to use, or click Custom if you want more granular settings.
    Time Setting: 0 0 * * 0
    Command: /usr/local/bin/php -q /home/ktorii7/public_html/index.php cronjobs weeklyUpdate getWeekData
4. Click Save