# kentorii.com 
**THIS REPO IS PUBLIC FOR EMPLOYERS TO SEE. DO NOT PUT SENSITIVE INFORMATION IN HERE**

## Updating production
1. If the user is not set to have permission into godaddy cpanel for kentorii.com, then set that up by importing the user's private key on godaddy.com
2. ssh into the production server on godaddy: `ssh -l <username-for-godaddy-account> kentorii.com -p <port-number>`
3. navigate to the main REPO folder
4. git fetch and pull the newly created release branch
5. Run the mover.sh script from where it is
6. Change the database config file
7. make sure everything works on the live site. all developers need to go on the site and make sure THEIR added features are working. QA does not test this.
8. Hotfixes will be applied if needed onto the release branch.
9. once everything is confirmed to be working on production, push the cards related to this release into the corresponding release list on trello.
10. Merge the dev branch into the master branch too on the remote repo
11. Also merge the release branch into develop
