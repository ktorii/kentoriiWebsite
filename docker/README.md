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
for windows: C:\Windows\System32\drivers\etc\hosts . Or in another drive is you messed with partitions.

Add the following onto a new line:
```
127.0.0.1	kentorii.local
```
Make sure you're NOT commenting this out with a '#' at the beginning of the line

6. Make sure you're in the docker/ folder and run `docker-compose build`.
If you get errors, read the error and try to figure out how to solve it.

7. When done, run `docker-compose up -d`.

8. Your environment should be ready to test on the website code on.

9. To verify your connection to your local database is working, go into your sequel pro software and connect to your local docker mysql database with the following credentials:
* Host: 127.0.0.1
* Username: root
* Password: root

Connected? Good.

10. To verify your local environment is setup properly, go to your browser and enter `localhost` or `127.0.0.1` or `kentorii.local` into the url and press enter. If you get no error then your local site is ready for testing.
