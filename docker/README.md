# kentoriiWebsite docker

## Setting up local environment for web development

1. Install docker **_and_** docker-compose
https://docs.docker.com/docker-for-mac/
https://docs.docker.com/docker-for-windows/

2. Navigate into the /docker folder.

3. Create a new file called '.env' with the same contents as .template-env

4. Edit the .env file's HOST_APP_IP and replace the value with YOUR IPV4 address
The local host environment needs to know your address so that you can access your 
docker's connection to your local mysql database

5. Navigate to your etc hosts file. 
For mac: it should be in /etc folder. If it's not there, create the hosts file there.
for windows: C:\Windows\System32\drivers\etc\hosts . Or it's in another drive if you messed with partitions.

Add the following onto a new line:
```
127.0.0.1	kentorii.local
```

6. Make sure you're in the docker/ folder and run `docker-compose build`.
If you get errors, read the error and try to figure out how to solve it.

7. When done, run `docker-compose up -d`.

8. Your environment should be ready to test on the website code on.

9. To verify your connection to your local database is working, go into your sequel pro software and connect to your local docker mysql database with the following credentials:
* Host: 127.0.0.1
* Username: root
* Password: root

Connected? Good.

10. To verify your local environment is setup properly, go to your browser and enter `localhost` or `127.0.0.1` or `kentorii.local` into the url and press enter. If the local site successfully loads, then your local site is ready for testing

11. When you're done working, turn off your docker containers with:
```
docker-compose down
```
If you don't do this, your computer will probably have its fan going on because docker uses up alot of the cpu% after a while. Also if you forget to `docker-compose down` before you put your computer to sleep, stuff may stop working, forcing you to quit the docker application and restart it.
